<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polisi extends Model
{
    use HasFactory;

    protected $fillable = ['roblox', 'discord', 'reason', 'status'];
}
