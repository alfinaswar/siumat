<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKub extends Model
{
    use HasFactory;

    protected $table = 'master_kubs';
    protected $guarded = ['id'];
}
