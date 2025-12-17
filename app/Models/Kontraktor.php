<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontraktor extends Model
{
    use HasFactory;

    protected $table = 'kontraktor';
    protected $primaryKey = 'kontraktor_id';

    protected $fillable = [
        'proyek_id',
        'nama',
        'penanggung_jawab',
        'kontak',
        'alamat',
    ];

    /**
     * Relasi ke Proyek
     * 1 kontraktor dimiliki oleh 1 proyek
     */
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'kontraktor_id')
            ->where('ref_table', 'kontraktor')
            ->orderBy('sort_order');
    }

    // khusus logo
    public function logo()
    {
        return $this->hasOne(Media::class, 'ref_id', 'kontraktor_id')
            ->where('ref_table', 'kontraktor')
            ->where('sort_order', 0);
    }
}
