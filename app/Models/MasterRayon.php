<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRayon extends Model
{
    use HasFactory;

    protected $table = 'master_rayons';
    protected $guarded = ['id'];
}
