<?php

namespace App\Helpers;
use DB;

class Helper
{

      public static function getPossibleStatuses(){
          $type = DB::select(DB::raw('SHOW COLUMNS FROM users WHERE Field = "usertype"'))[0]->Type;
          preg_match('/^enum\((.*)\)$/', $type, $matches);
          $values = array();
          foreach(explode(',', $matches[1]) as $value){
              $values[] = trim($value, "'");
          }
          return $values;
      }
      public static function getPossibleColors(){
          $type = DB::select(DB::raw('SHOW COLUMNS FROM cars WHERE Field = "color"'))[0]->Type;
          preg_match('/^enum\((.*)\)$/', $type, $matches);
          $values = array();
          foreach(explode(',', $matches[1]) as $value){
              $values[] = trim($value, "'");
          }
          return $values;
      }
}
