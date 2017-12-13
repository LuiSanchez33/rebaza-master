<?php namespace App\Http\Controllers;

use App\CustomHelpers;
use File;
use Illuminate\Http\Request;
use App\Lawyer;
use Illuminate\Support\Facades\Validator;

class LawyerController extends Controller {

    private $path_img_lawyer = 'images/abogados';
    private $defaultRules = [
        'name' => 'required',
        'email' => 'required|email',

        'job_es' => 'required',
        'job_en' => 'required',

        'type' => 'required',

        'info_es' => 'required',
        'info_en' => 'required',

        'text_es' => 'required',
        'text_en' => 'required'
    ];

    public function __construct() {
        $this->path_img_lawyer = $this->path_img_lawyer;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($type)
	{
	    $lawyers = Lawyer::withTrashed()->where('type', $type)->paginate(21, ['id', 'email', 'name', 'job_es', 'updated_at', 'image', 'deleted_at']);
		return view('admin.lawyers', compact('lawyers', 'type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($type)
	{
	    $types = $this->getTypes();

        $lawyer = new Lawyer();
        $lawyer->type = $type;

        $action = route('storeLawyer');

		return view('admin.add-lawyer', compact('types', 'lawyer', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        list($v, $params) = $this->customValidate($request);

        if ($v->fails()) {
            return redirect()->back()->withInput($params)->withErrors($v->errors());
        }

        if ($request->hasFile('image')) {
            $request->file('image')->move($this->path_img_lawyer, $params['image']);
        }

        if ($request->hasFile('download_cv_es')) {
            $request->file('download_cv_es')->move('abogados_cv', $params['download_cv_es']);
        }

        if ($request->hasFile('download_cv_en')) {
            $request->file('download_cv_en')->move('abogados_cv', $params['download_cv_en']);
        }

        Lawyer::create($params);

        return redirect()->route('lawyers', $params['type']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $types = $this->getTypes();

		$lawyer = Lawyer::withTrashed()->find($id);

        $action = route('editLawyer', $lawyer->id);

		return view('admin.add-lawyer', compact('types', 'lawyer', 'action'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
        $lawyer = Lawyer::withTrashed()->find($id);
        list($v, $params) = $this->customValidate($request);

        if ($v->fails()) {
            return redirect()->back()->withInput($params)->withErrors($v->errors());
        }

        if ($request->hasFile('image')) {
            if ($lawyer->image) {
                File::delete($this->path_img_lawyer . '/' . $lawyer->image);
            }

            $request->file('image')->move($this->path_img_lawyer, $params['image']);
        }

        if ($request->hasFile('download_cv_es')) {
            if ($lawyer->download_cv_es) {
                File::delete('abogados_cv/' . $lawyer->download_cv_es);
            }

            $request->file('download_cv_es')->move('abogados_cv', $params['download_cv_es']);
        }

        if ($request->hasFile('download_cv_en')) {

            if ($lawyer->download_cv_en) {
                File::delete('abogados_cv/' . $lawyer->download_cv_en);
            }

            $request->file('download_cv_en')->move('abogados_cv', $params['download_cv_en']);
        }

        $lawyer->fill($params);
        $lawyer->save();

        return redirect()->route('lawyers', $params['type']);
	}

	/**
	 * Active the specified Lawyer in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Lawyer::withTrashed()->find($id)->restore();
		return redirect()->back();
	}

	/**
	 * Inactivate specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function inactivate($id)
	{
		$lawyer = Lawyer::find($id);
		$lawyer->delete();

		return redirect()->back();
	}

	/**
	 * Elimina definitivamente el abogado de la bade de datos
	 *
	 * @param $id
	 * @return RedirectResponse
	 */
	public function destroy($id)
	{
		$lawyer = Lawyer::withTrashed()->find($id);
		if ($lawyer->image) {
			File::delete($this->path_img_lawyer . '/' . $lawyer->image);
		}

		$lawyer->forceDelete();

		return redirect()->back();
	}

	public function deleteCv($id, $lang) {

		$lawyer = Lawyer::find($id);

		if ($lang == 'es') {
			File::delete('abogados_cv/' . $lawyer->download_cv_es);
			$lawyer->download_cv_es = null;
		} else {
			File::delete('abogados_cv/' . $lawyer->download_cv_en);
			$lawyer->download_cv_en = null;
		}

		$lawyer->save();

		return redirect()->back();
	}

	private function getTypes() {
	    return [['id' => '', 'name' => 'Seleccione'], ['id' => 1, 'name' => 'Socio'], ['id' => 2, 'name' => 'Asociados'], ['id' => 3, 'name' => 'Consultores']];
	}

	private function customValidate($request) {
	    $params = $request->all();
        $rules = $this->defaultRules;

        $params['list_es'] = CustomHelpers::convertJsonList($request->input('test_es'), $request->input('items_es'), 'es');
        $params['list_en'] = CustomHelpers::convertJsonList($request->input('test_en'), $request->input('items_en'), 'en');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_').'.'.$image->getClientOriginalExtension();
            $params['images'] = $image;
            $rules['images'] = 'image|max:1500';
        }

        if ($request->hasFile('download_cv_es')) {
            $download_es = $request->file('download_cv_es');

            $params['download_cv_es'] = str_slug(substr($download_es->getClientOriginalName(), 0, strlen($download_es->getClientOriginalName()) - 4), '_')
                .'.'.$download_es->getClientOriginalExtension();
            $params['_download_cv_es'] = $download_es;
            $rules['_download_cv_es'] = 'mimes:pdf';
        }

        if ($request->hasFile('download_cv_en')) {
            $download_en = $request->file('download_cv_en');

            $params['download_cv_en'] = str_slug(substr($download_en->getClientOriginalName(), 0, strlen($download_en->getClientOriginalName()) - 4), '_')
                .'.'.$download_en->getClientOriginalExtension();
            $params['_download_cv_en'] = $download_en;
            $rules['_download_cv_en'] = 'mimes:pdf';
        }

        $validator = Validator::make($params, $rules);

        return [$validator, $params];
    }
}
