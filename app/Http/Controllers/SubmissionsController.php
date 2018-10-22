<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Illuminate\Support\Facades\Auth;
use Input;

class SubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   public function __construct()
   {
       $this->middleware('auth');
   }
    public function index()
    {
        $currentUser = Auth::user();


        if ($currentUser->user_type == 1) {

            $submissions = Submission::where('user_id', $currentUser->id)->get();

            return view('submissions.index', compact('submissions'));
        }

        $submissions = Submission::all();

        return view('submissions.index', compact('submissions'));
    }


    public function save(Input $inputs){
      $choices = $inputs::get('choices');

      (in_array("calculus", $choices)) ? print_r("success") : exit();

      $submission = new Submission();
      $submission->choices = $choices;
      $submission->save();

      return('Saved Successfully');
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
        $sub->repair_cost = (float)$request->repair_cost;
        $sub->arv = (float)$request->arv;

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
    public function show($submission)
    {

        $submission = json_decode($submission);
        // dd(Submission::find($submission->id)->aggregateDeal());
        return view('submissions.show', compact('submission'));
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
      $submission = Submission::find($id);

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
