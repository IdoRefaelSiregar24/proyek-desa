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

    public static $filterableColumns = [
        'nama_tahap',
    ];

    /**
     * Scope Filter Search
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

        if ($request->filled('tgl_mulai')) {
            $query->whereDate('tgl_mulai', $request->tgl_mulai);
        }

        if ($request->filled('tgl_selesai')) {
            $query->whereDate('tgl_selesai', $request->tgl_selesai);
        }

        if ($request->filled('range_mulai') && $request->filled('range_selesai')) {
            $query->whereBetween('tgl_mulai', [
                $request->range_mulai,
                $request->range_selesai
            ]);
        }

        return $query;
    }


}
