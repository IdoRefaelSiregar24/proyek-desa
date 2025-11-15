<?php

namespace App\Models;

use App\Models\Progress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahapan extends Model
{
    use HasFactory;

    protected $table = 'tahapan_proyek';
    protected $primaryKey = 'tahap_id';

    protected $fillable = [
        'proyek_id',
        'nama_tahap',
        'target_persen',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class, 'tahap_id', 'tahap_id');
    }


}
