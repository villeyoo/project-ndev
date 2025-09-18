<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scripter extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'roblox', 'discord', 'reason','experience','status','porfofolio'];  // Sesuaikan dengan field tabel
}
