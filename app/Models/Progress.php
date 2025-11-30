<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progres_proyek';
    protected $primaryKey = 'progres_id';

    protected $fillable = [
        'proyek_id',
        'tahap_id',
        'persen_real',
        'tanggal',
        'catatan',
    ];

    public function tahap()
    {
        return $this->belongsTo(Tahapan::class, 'tahap_id', 'tahap_id');
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'ref_id', 'progres_id')
            ->where('ref_table', 'progres_proyek')
            ->orderBy('sort_order', 'asc');
    }


    public function scopeFilter($query, $request)
    {
        if ($request->progress_mulai) {
            $query->where('tanggal', '>=', $request->progress_mulai);
        }

        if ($request->progress_selesai) {
            $query->where('tanggal', '<=', $request->progress_selesai);
        }

        if ($request->search_progress) {
            $query->where('catatan', 'like', '%' . $request->search_progress . '%');
        }

        if ($request->persen_min) {
            $query->where('persen_real', '>=', $request->persen_min);
        }

        if ($request->persen_max) {
            $query->where('persen_real', '<=', $request->persen_max);
        }

        return $query;
    }




}
