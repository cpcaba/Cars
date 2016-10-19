<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  protected $fillable= ['color','modelo_id','kms','price','year'];

  public function modelo()
  {
      return $this->belongsTo('App\Modelo');
  }
  public function feature()
 {
   return $this->belongsToMany('App\Feature','car_feature','car_id','feature_id');
 }
}
