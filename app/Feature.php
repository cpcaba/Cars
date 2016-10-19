<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

  protected $fillable= ['name'];

  public function car()
   {
     return $this->belongsToMany('App\Car','car_feature','car_id','feature_id');
     
   }
}
