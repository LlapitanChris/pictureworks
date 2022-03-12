<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
      public function user()
    {
        return $this->belongsTo('App\User');
    }
}
