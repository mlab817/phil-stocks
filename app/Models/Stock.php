<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
      'name',
      'symbol'
    ];

    public function histories()
    {
      return $this->hasMany(History::class,'symbol','symbol')->orderBy('date','DESC');
    }

    public function getCountAttribute()
    {
      return $this->histories()->count();
    }
}
