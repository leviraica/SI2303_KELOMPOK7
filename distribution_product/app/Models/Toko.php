<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Toko extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_toko',
        'email',
        'alamat',
        'telepon',
        'password',
        'notifikasi_email',
        'notifikasi_sms',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'notifikasi_email' => 'boolean',
        'notifikasi_sms' => 'boolean',
    ];
}