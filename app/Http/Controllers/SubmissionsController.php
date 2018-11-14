<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Illuminate\Support\Facades\Auth;
use DB;

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
        $sub->user_id = Auth::user()->id;

        $belowMarketPercentage = $this->findBelowMarketPercentage($request->offer_price, $request->market_value);

        $sub->percent_below_market = $belowMarketPercentage;

        $maximumAllowableOfferArray = $this->aggregateDeal($request->arv, $request->repair_cost, $request->offer_price);

        $sub->risk_status_id = $maximumAllowableOfferArray["risk_level"];
        $sub->mao = $maximumAllowableOfferArray["maximumAllowableOffer"];


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
        $submissionId = json_decode($submission)->id;

        $su = Submission::find($submissionId);
        $bloomRisk = $su->bloom();

        $submission = DB::table('submissions')
            ->join('risk_statuses', 'risk_statuses.id', '=', 'submissions.risk_status_id')
            ->leftJoin('likes', 'submissions.id', 'likes.submission_id')
            ->leftJoin('users', 'users.id', 'likes.user_id')
            ->select('submissions.*', 'risk_statuses.name', 'risk_statuses.id', 'likes.id as like_id')
            ->where('submissions.id', '=', $submissionId)
            ->get()[0];

            dd($submission);



        return view('submissions.show', compact('submission', 'bloomRisk'));
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

    public function storeSubmissionLike(Request $request)
    {
      $submissionId = $request->submission_id;
      $submission = Submission::find($submissionId);

      // dd($submission);

      if(!$submission){
        return redirect()->route('submissions.index')->with(['message' => 'Error']);
      }

      $user = Auth::user();
      $like = $user->likes()->where('submission_id', $submissionId)->first();

      if($like){
        $like->delete();
        return redirect()->route('submissions.index')->with(['message' => 'You unliked this deal']);
      }
        $newLike = new Like();
        $newLike->user_id = $user->id;
        $newLike->submission_id = $submissionId;
        $newLike->save();
        return redirect()->route('submissions.index')->with(['message', array('You liked this deal', $like)]);
    }

    public function findBelowMarketPercentage($offer_price, $market_value){
      $belowMarketPercentage = 100 - ($offer_price / $market_value * 100);
      return $belowMarketPercentage;
    }

    private function aggregateDeal($arv, $repair_cost, $offer_price){
      $closingCost = $arv * .10;

      $maximumAllowableOffer = ((($arv * .70) - $repair_cost) - $closingCost);

      if($maximumAllowableOffer == $offer_price){
        $risk = 2;
      }elseif ($offer_price > $maximumAllowableOffer) {
        $risk = 3;
      }else {
        $risk = 1;
      }

      return ["maximumAllowableOffer" => $maximumAllowableOffer, "risk_level" => $risk];
    }
}
