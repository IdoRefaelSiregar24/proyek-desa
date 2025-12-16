<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiProyek extends Model
{
    use HasFactory;

    protected $table = 'lokasi_proyek';

    protected $primaryKey = 'lokasi_id';

    public $timestamps = true;

    protected $fillable = [
        'proyek_id',
        'lat',
        'lng',
        'geojson',
    ];

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
        'geojson' => 'array',
    ];

    // 🔗 Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
}
