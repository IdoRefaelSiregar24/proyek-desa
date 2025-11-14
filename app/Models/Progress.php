<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progres_proyek';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tahap_id',
        'deskripsi',
        'persentase',
        'tanggal_update',
    ];

    /**
     * Relasi ke tabel Tahapan
     * Satu progress dimiliki oleh satu tahapan
     */
    public function tahap()
    {
        return $this->belongsTo(Tahapan::class, 'tahap_id', 'tahap_id');
    }

}
