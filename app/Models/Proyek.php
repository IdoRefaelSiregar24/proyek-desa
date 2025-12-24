<?php
namespace App\Models;

use App\Models\Tahapan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'proyek_id';
    protected $fillable = [
        'kode_proyek',
        'nama_proyek',
        'tahun',
        'lokasi',
        'anggaran',
        'sumber_dana',
        'deskripsi',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'anggaran' => 'decimal:2',
    ];

    public function tahapan()
    {
        return $this->hasMany(Tahapan::class, 'proyek_id', 'proyek_id');
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    public function lokasiProyek()
    {
        return $this->hasOne(LokasiProyek::class, 'proyek_id', 'proyek_id');
    }

    public function kontraktor()
    {
        return $this->hasOne(Kontraktor::class, 'proyek_id', 'proyek_id');
    }

    public function getTotalKontraktor()
    {
        return $this->kontraktor()->count();
    }


    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }


}
