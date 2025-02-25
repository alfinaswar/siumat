<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangans';
    protected $guarded = ['id'];
    /**
     * Get the user that owns the Keuangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getKub()
    {
        return $this->belongsTo(MasterKub::class, 'Kub', 'id');
    }
}
