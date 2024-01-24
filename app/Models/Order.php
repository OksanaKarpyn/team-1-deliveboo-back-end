<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'address',
        'status',
        'notes',
        'tot_price'
    ];

    public function Dish() {
        return $this->belongsToMany(Dish::class);
    }
}
