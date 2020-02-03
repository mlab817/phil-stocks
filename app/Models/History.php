<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'stock_histories';

    public function stock()
    {
      return $this->belongsTo(Stock::class,'symbol','symbol');
    }
}
