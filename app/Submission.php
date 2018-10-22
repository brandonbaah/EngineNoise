<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = "submissions";


    public function aggregateDeal(){
      $closingCost = $this->arv * .10;

      $maximumAllowableOffer = ((($this->arv * .70) - $this->repair_cost) - $closingCost);

      if($maximumAllowableOffer == $this->offer_price){
        $risk = 2;
      }elseif ($this->offer_price > $maximumAllowableOffer) {
        $risk = 3;
      }else {
        $risk = 1;
      }

      return ["maximumAllowableOffer" => $maximumAllowableOffer, "risk_level" => $risk];
    }
}
