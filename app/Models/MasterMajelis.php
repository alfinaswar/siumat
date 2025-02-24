<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMajelis extends Model
{
    use HasFactory;
    protected $table = 'master_majelis';
    protected $guarded = ['id'];

    /**
     * Get the user that owns the MasterMajelis
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getRayon()
    {
        return $this->belongsTo(MasterRayon::class, 'kode_rayon', 'id');
    }
}
