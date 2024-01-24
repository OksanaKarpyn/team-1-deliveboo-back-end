<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'description',
        'photo'
    ];

    protected $appends = [

        'full_photo_img'

    ];

    public function getFullPhotoImgAttribute() {
        if($this->photo) {
            return asset('storage/'. $this->photo);
        } return null;
    }

    //* Relations

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function dish() {
        return $this->hasMany(Dish::class);
    }

}
