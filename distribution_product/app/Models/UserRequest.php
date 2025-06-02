<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRequest extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id', 'product_id','distributor_id', 'quantity', 'status']; // Kolom yang dapat diisi
    protected $table = 'user_requests';  // Jika tabelnya memang bernama 'user_requests'

    public function product()
    {
        return $this->belongsTo(Product::class); // Relasi banyak ke satu dengan Product
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
