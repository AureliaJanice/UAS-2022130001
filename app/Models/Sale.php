<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'penjual_id',
    ];
    public function penjual()
    {
        return $this->belongsTo(Penjual::class);
    }

    public function camera()
    {
        return $this->hasMany(Sale::class);
    }
}
