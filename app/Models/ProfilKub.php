<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKub extends Model
{
    use HasFactory;
    protected $table = 'profil_kubs';
    protected $guarded = ['id'];
}
