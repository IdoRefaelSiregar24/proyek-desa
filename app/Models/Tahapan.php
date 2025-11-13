<?php

namespace App\Models;

use App\Models\Progress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahapan extends Model
{
    use HasFactory;

    protected $table = 'tahapan_proyek'; // Nama tabel di database
    protected $primaryKey = 'tahap_id';  // Primary key kustom

    protected $fillable = [
        'proyek_id',
        'nama_tahap',
        'target_persen',
        'tgl_mulai',
        'tgl_selesai',
    ];

    /**
     * Relasi ke model Proyek (Many to One)
     * Setiap tahapan dimiliki oleh satu proyek
     */
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    /**
     * Relasi ke model ProgresProyek (One to Many)
     * Satu tahapan bisa punya banyak progres
     */
    public function progres()
    {
        return $this->hasMany(Progress::class, 'tahap_id', 'tahap_id');
    }
}
