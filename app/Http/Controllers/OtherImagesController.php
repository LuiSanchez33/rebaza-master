<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\OtherImages;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OtherImagesController extends Controller {

	private $path_img = 'images';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$others = OtherImages::all();

		$sidebarImages = $others->filter(function($image) {
			return $image['type'] == 1;
		});

		$socialIcons = $others->filter(function($image) {
			return $image['type'] == 2;
		});

		return view('admin.others.index', compact('sidebarImages', 'socialIcons'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
			'image' => 'required|image|max:1500',
		];

		if ($params['type'] == 2) {
			$rules['link'] = 'required|url';
		}

		$v = Validator::make($params, [
			'image' => 'required|image|max:1500'
		]);

		if ($v->fails()) {
			return redirect()->back()->withInput($params)->withErrors($v->errors());
		}

		$image = $request->file('image');
		$params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_')
			.'.'.$image->getClientOriginalExtension();
		$request->file('image')->move($this->path_img, $params['image']);

		OtherImages::create($params);

		return redirect()->back();
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
		//
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
		$otherImage = OtherImages::find($id);

		$rules = [];

		if ($params['type'] == 2) {
			$rules['link'] = 'required|url';

			if ($request->hasFile('image')) {

				$image = $request->file('image');
				$params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_').'.'.$image->getClientOriginalExtension();
				$params['images'] = $image;
				$rules['images'] = 'required|image|max:1500';
			}
		} else {
			$image = $request->file('image');
			$params['image'] = str_slug(substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4), '_').'.'.$image->getClientOriginalExtension();
			$params['images'] = $image;
			$rules['images'] = 'required|image|max:1500';
		}


		$v = Validator::make($params, $rules);

		if ($v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

		if ($request->hasFile('image')) {
			$request->file('image')->move($this->path_img, $params['image']);
			File::delete($this->path_img . '/' . $otherImage->image);
		}

		$otherImage->fill($params);
		$otherImage->save();

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$image = OtherImages::find($id);
		File::delete($this->path_img . '/' . $image->image);
		$image->delete();

		return redirect()->back();
	}

}
