<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Modelo extends Model
{
  protected $fillable= ['name','brand_id'];

    public function car()
    {
      return $this->hasMany('App\Car');
    }

    public function brand(){
      return $this->belongsTo('App\Brand');
    }
  }
