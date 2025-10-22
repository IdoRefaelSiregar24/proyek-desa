<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Warga extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama jamak otomatis)
    protected $table = 'warga';

    // Primary key
    protected $primaryKey = 'warga_id';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'user_id',
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
    ];


    // Relasi: satu warga bisa memiliki banyak media (foto, dokumen, dsb)
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
            ->where('ref_table', 'warga');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
