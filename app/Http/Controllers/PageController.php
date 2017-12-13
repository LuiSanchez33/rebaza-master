<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Facades\Validator;
use File;

class PageController extends Controller {

    private $rules = [
        'name_es' => 'required',
        'name_en' => 'required',
        'page_slug' => 'required',
        'type' => 'in:AREAS,ESTUDIO,TRABAJA',
        'text_en' => 'required',
        'text_en' => 'required'
    ];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($type)
	{
	    $pages = Page::where('type', strtoupper($type))->get(['id', 'type', 'name_es', 'image']);
		return view('admin.pages.index', compact('pages', 'type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($type)
	{
	    $page = new Page;
        $action = route('storeArea');

        return view('admin.pages.create', compact('page', 'action', 'type'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $params = $request->all();
        $rules = $this->rules;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_')
                .'.'.$image->getClientOriginalExtension();
            $params['images'] = $image;
        }

        $v = Validator::make($params, $rules);

        if ($v->fails()) {
            return redirect()->back()->withInput($params)->withErrors($v->errors());
        }

        if ($request->hasFile('image')) {
            $request->file('image')->move($this->getPathImagePageByType($params['type']), $params['image']);
        }

		Page::create($params);

        return redirect()->route('pageIndex', strtolower($params['type']));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($type, $id)
	{
        $page = Page::find($id);
        $action = route('areaEdit', $page->id);

        return view('admin.pages.create', compact('page', 'action', 'type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		$page = Page::find($id);
		$params = $request->all();
		$rules = $this->rules;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_')
                .'.'.$image->getClientOriginalExtension();
            $params['images'] = $image;
        }

        $v = Validator::make($params, $rules);

        if ($v->fails()) {
            return redirect()->back()->withInput($params)->withErrors($v->errors());
        }

        if ($request->hasFile('image')) {
            if ($page->image) {
                File::delete($this->getPathImagePageByType($params['type']) . '/' . $page->image);
            }

            $request->file('image')->move($this->getPathImagePageByType($params['type']), $params['image']);
        }

        $page->fill($params);
        $page->save();

        if ($params['type'] === 'TRABAJA') {
			return redirect()->back();
		} else {
			return redirect()->route('pageIndex', strtolower($params['type']));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = Page::find($id);
		$type = $page->type;

        File::delete($this->getPathImagePageByType($type) . '/' . $page->image);

		$page->delete();

        return redirect()->route('pageIndex', $type);
	}

	private function getPathImagePageByType($type) {
	    return 'images/' . strtolower($type);
    }
}
