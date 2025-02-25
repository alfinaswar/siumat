<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilStasi extends Model
{
    use HasFactory;
    protected $table = 'profil_stasis';
    protected $guarded = ['id'];
}
