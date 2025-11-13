<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tahapan_id',
        'deskripsi',
        'persentase',
        'tanggal_update',
    ];

    /**
     * Relasi ke tabel Tahapan
     * Satu progress dimiliki oleh satu tahapan
     */
    public function tahapan()
    {
        return $this->belongsTo(Tahapan::class, 'tahapan_id');
    }
}
