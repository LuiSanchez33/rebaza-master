<?php namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Http\Controllers\Controller;
use App\Quotes;
use Illuminate\Http\Request;

class QuoteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$quotes = Quotes::latest()->get();
		return view('admin.quotes.index', compact('quotes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $quote = new Quotes;
	    $action = route('quoteStore');
		return view('admin.quotes.form', compact('quote', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(QuoteRequest $request)
	{
	    Quotes::create($request->all());
		return redirect()->route('quoteIndex');
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
		$quote = Quotes::find($id);
        $action = route('quoteUpdate', $quote->id);

        return view('admin.quotes.form', compact('quote', 'action'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(QuoteRequest $request, $id)
	{
		$quote = Quotes::find($id);
		$quote->fill($request->all());
		$quote->save();

		return redirect()->route('quoteIndex');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$quote = Quotes::find($id);
		$quote->delete();

		return redirect()->back();
	}

}
