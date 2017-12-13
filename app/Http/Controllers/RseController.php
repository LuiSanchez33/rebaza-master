<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\RseGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class RseController extends Controller {

	private $path_img_galery = 'images/responsabilidad';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = RseGallery::all();
		return view('admin.rse.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$rseGallery = new RseGallery();
		$action = route('rseStore');

		return view('admin.rse.form', compact('rseGallery', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return RedirectResponse
	 */
	public function store(Request $request)
	{
		$params = $request->all();
		$rules = ['image' => 'image|max:1500'];

		$v = Validator::make($params, $rules);

		if ($v->fails()) {
			return redirect()->back()->withInput($params)->withErrors($v->errors());
		}

		$image = $request->file('image');

		$params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_')
			.'.'.$image->getClientOriginalExtension();

		$image->move($this->path_img_galery, $params['image']);

		RseGallery::create($params);

		return redirect()->route('rseIndex');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rseGallery = RseGallery::find($id);
		$action = route('rseUpdate', $id);

		return view('admin.rse.form', compact('rseGallery', 'action'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return RedirectResponse
	 */
	public function edit(Request $request, $id)
	{
		$params = $request->all();
		$rseGallery = RseGallery::find($id);
		$rules = [];
		$image = null;

		if ($request->hasFile('image')) {
			$image = $request->file('image');

			$params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_')
				.'.'.$image->getClientOriginalExtension();
			$params['images'] = $image;
			$rules['images'] = 'image|max:1500';
		}

		$v = Validator::make($params, $rules);

		if ($v->fails()) {
			return redirect()->back()->withInput($params)->withErrors($v->errors());
		}

		if ($image != null) {
			if ($rseGallery->image) {
				File::delete($this->path_img_galery . '/' . $rseGallery->image);
			}

			$image->move($this->path_img_galery, $params['image']);
		}

		$rseGallery->fill($params);
		$rseGallery->save();

		return redirect()->route('rseIndex');
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
		$rseGallery = RseGallery::find($id);
		File::delete($this->path_img_galery . '/' . $rseGallery->image);
		$rseGallery->delete();

		return redirect()->back();
	}

}
