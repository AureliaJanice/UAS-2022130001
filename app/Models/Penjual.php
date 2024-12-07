<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Penjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'adress',
        'phone_number',
        'email',
    ];

    public function cameras()
    {
        return $this->belongsToMany(camera::class, 'camera_penjual')->with();
    }

}
