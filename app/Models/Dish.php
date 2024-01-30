<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'photo',
        'description',
        'ingredients',
        'price'
    ];

    protected $appends = [

        'full_photo_img'

    ];

    public function getFullPhotoImgAttribute() {
        if($this->photo) {
            return asset('storage/'. $this->photo);
        } return null;
    }

    public function Restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function Order() {
        return $this->belongsToMany(Order::class, 'order_dish');
    }
}