<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
  public function employee()
  {
      return $this->belongsTo(Employee::class);
  }
  public static function getAdvanced($main_id){
    switch($main_id) {
            case 0    : return "No";
            case 1    : return "Yes";
        }
  }
  public static function getStatus($active_id){
    switch($active_id) {
            case 0    : return "Unpaid";
            case 1    : return "Paid";
        }
  }
}
