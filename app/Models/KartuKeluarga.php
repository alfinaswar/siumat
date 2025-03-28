<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;
    protected $table = 'kartu_keluargas';
    protected $guarded = ['id'];
    public function getKub()
    {
        return $this->belongsTo(MasterKub::class, 'kub', 'id');
    }
}
