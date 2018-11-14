<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = "submissions";

    public function bloom(){
      $risk = $this->risk_status_id;

      switch ($risk){
        case($risk == 1) :
          return "bg-success";
        break;
        case($risk == 2) :
          return "bg-warning";
        break;
        case($risk == 3) :
          return "bg-danger";
        break;
      }
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }


}
