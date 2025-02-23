<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPendeta extends Model
{
    use HasFactory;

    protected $table = 'master_pendetas';
    protected $guarded = ['id'];
}
