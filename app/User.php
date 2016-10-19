<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'usertype', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isSalesman(){
          if ($this->usertype == 'salesman'){
            return true;
          }
        return false;
      }

      public function  isAdmin(){
        if ($this->usertype == 'admin'){
          return true;
        }
        return false;
      }

}
