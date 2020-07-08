<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  public static function getGender($active_id){
    switch($active_id){
          case 0    : return "Male";
          case 1    : return "Female";
      }
  }
  public static function getSupplierType($type){
      switch($type){
          case 0    : return "Distributor";
          case 1    : return "Whole Saller";
          case 2    : return "Brochure";
      }
  }

  public static function getPaymentMethod($payment){
      switch($payment){
          case 0    : return "Personal";
          case 1    : return "Bank";
          case 2    : return "Bkash";
          case 3    : return "Rocket";
          case 4    : return "Ecash";
      }
  }
}
