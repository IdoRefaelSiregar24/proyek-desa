<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $primaryKey = 'media_id';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_url',
        'caption',
        'mime_type',
        'sort_order',
    ];

    // Relasi dinamis berdasarkan ref_table dan ref_id
    // Biasanya digunakan untuk menyimpan file dari berbagai entitas (misal: warga, proyek, laporan)
    public function referensi()
    {
        switch ($this->ref_table) {
            case 'warga':
                return $this->belongsTo(Warga::class, 'ref_id');
            // case 'proyek':
            //     return $this->belongsTo(Proyek::class, 'ref_id');
            default:
                return null;
        }
    }
}
