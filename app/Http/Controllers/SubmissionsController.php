<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;

class SubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submissions = Submission::all();

        return view('submissions.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('submissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $sub = new Submission;

        $sub->address = $request->address;
        $sub->city = $request->city;
        $sub->state = $request->state;
        $sub->zip = $request->zip;
        $sub->offer_price = (float)$request->offer_price;
        $sub->market_value = (float)$request->market_value;
        $sub->list_price = (float)$request->list_price;

        $belowMarketPercentage = 100 - ($sub->offer_price / $sub->market_value * 100);
        

        $sub->percent_below_market = $belowMarketPercentage;

        $sub->save();

        $submissions = Submission::all();


        return view('submissions.index', compact('submissions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
