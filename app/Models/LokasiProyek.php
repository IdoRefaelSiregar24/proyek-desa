<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LokasiProyek extends Model
{
    protected $table = 'lokasi_proyek';
    protected $primaryKey = 'lokasi_id';

    protected $fillable = ['proyek_id', 'lat', 'lng', 'geojson'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'ref_id', 'lokasi_id')
            ->where('ref_table', 'media_lokasi_proyek')
            ->orderBy('sort_order', 'asc');
    }

}

