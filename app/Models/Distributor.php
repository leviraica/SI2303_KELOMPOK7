<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $table = 'distributors';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
    ];

    // Relasi dengan model Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

