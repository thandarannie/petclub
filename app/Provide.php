<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provide extends Model
{
      protected $fillable=['facility_id','service_id','service_limit','currently_used'];
}
