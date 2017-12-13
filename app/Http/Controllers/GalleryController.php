<?php namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller {

	private $path_img_galery = 'images/gallery';
	private $path_img_galery_thumb = '';

	/**
	 * GalleryController constructor.
	 */
	public function __construct()
	{
		$this->path_img_galery_thumb = $this->path_img_galery . '/thumb';
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = Gallery::all();

		return view('admin.gallery.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$gallery = new Gallery;
		$action = route('storeGallery');

		return view('admin.gallery.form', compact('gallery', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$params = $request->all();
		$rules = [
			'name' => 'required',
		];

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

		if ($request->hasFile('image')) {

			$request->file('image')->move($this->path_img_galery, $params['image']);
			File::copy($this->path_img_galery . '/' . $params['image'], $this->path_img_galery_thumb . '/' . $params['image']);

		}

		$params['data'] = json_encode($params['_data']);

		Gallery::create($params);

		return redirect()->route('gaIndex');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = Gallery::find($id);
		$action = route('updateGallery', $id);


		return view('admin.gallery.form', compact('gallery', 'action'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$params = $request->all();
		$gallery = Gallery::find($id);
		$rules = [
			'name' => 'required',
		];

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

		if ($request->hasFile('image')) {
			if ($gallery->image) {
				File::delete($this->path_img_galery . '/' . $gallery->image);
				File::delete($this->path_img_galery_thumb . '/' . $gallery->image);
			}
			$request->file('image')->move($this->path_img_galery, $params['image']);
			File::copy(
				$this->path_img_galery . '/' . $params['image'],
				$this->path_img_galery_thumb . '/' . $params['image']
			);
		}

		$params['data'] = json_encode($params['_data']);

		$gallery->fill($params);
		$gallery->save();

		return redirect()->route('gaIndex');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$gallery = Gallery::find($id);

		File::delete($this->path_img_galery . '/' . $gallery->image);
		File::delete($this->path_img_galery_thumb . '/' . $gallery->image);

		$gallery->delete();

		return redirect()->back();
	}

}
