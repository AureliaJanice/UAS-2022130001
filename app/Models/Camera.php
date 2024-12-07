<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Camera extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_camera',
        'camera_name',
        'brand',
        'price',
        'quantity' ,
        'status',
        'description',
        'product_image'
    ];

    protected $append = [
        'product_image_url',
    ];

    public function getProductImageUrlAttribute()
    {
        //Console::info();
        if (filter_var($this->product_image, FILTER_VALIDATE_URL)) {
            return $this->product_image;
        }

        return $this->product_image ? Storage::url($this->product_image) : null;


    }
}


