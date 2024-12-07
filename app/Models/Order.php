<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'pembeli_id',
    ];
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function camera()
    {
        return $this->hasMany(Order::class);
    }
}
