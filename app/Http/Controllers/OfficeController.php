<?php namespace App\Http\Controllers;

use App\Http\Requests\OfficeRequest;
use App\Http\Controllers\Controller;

use App\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$offices = Office::all();
		return view('admin.office.index', compact('offices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$office = new Office();
		$action = route('storeOffice');

		return view('admin.office.form', compact('office', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(OfficeRequest $request)
	{
		Office::create($request->all());

		return redirect()->route('officesIndex');
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
		$office = Office::find($id);
		$action = route('updateOffice', $id);

		return view('admin.office.form', compact('office', 'action'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(OfficeRequest $request, $id)
	{
		$office = Office::find($id);
		$office->fill($request->all());
		$office->save();

		return redirect()->route('officesIndex');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Office::destroy($id);

		return redirect()->back();
	}

}
