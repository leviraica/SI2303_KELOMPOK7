<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserRequest;


class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'distributor_id']; // Kolom yang dapat diisi

    public function distributor()
    {
        return $this->belongsTo(Distributor::class); // Relasi banyak ke satu dengan Distributor
    }

    public function requests()
    {
        return $this->hasMany(Request::class); // Relasi satu ke banyak dengan Request
    }
}
