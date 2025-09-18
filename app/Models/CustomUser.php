<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomUser extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password'];

    protected $hidden = [
        'password', // Jangan lupa menyembunyikan password
    ];

    // Jika nama tabel tidak menggunakan konvensi 'users', tambahkan:
    protected $table = 'custom_users';  // Ganti dengan nama tabel yang kamu pakai
}
