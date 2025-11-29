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

    public function medias()
    {
        return $this->hasMany(Media::class, 'ref_id')
            ->where('ref_table', 'tahapan')
            ->orderBy('sort_order', 'asc');
    }


    public static $filterableColumns = [
        'nama_tahap',
    ];

    /**
     * Scope Filter dan Search
     */
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();

        if ($request->filled('search_tahapan')) {
            $search = $request->search_tahapan;

            $query->where(function ($q) use ($search) {
                foreach (self::$filterableColumns as $col) {
                    $q->orWhere($col, 'LIKE', "%{$search}%");
                }
            });
        }

        if ($request->tahapan_mulai) {
            $query->where('tgl_mulai', '>=', $request->tahapan_mulai);
        }

        if ($request->tahapan_selesai) {
            $query->where('tgl_selesai', '<=', $request->tahapan_selesai);
        }

        if ($request->search_tahapan) {
            $query->where('nama_tahap', 'like', '%' . $request->search_tahapan . '%');
        }


        return $query;
    }


}
