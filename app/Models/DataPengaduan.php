<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class DataPengaduan extends Model
{
    use Uuid,HasFactory;
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $guarded = ['id'];
    protected $table = 'pengaduans';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function jenisLaporan()
    {
        return $this->belongsTo(JenisLaporan::class, 'id_jenis_laporan');
    }
    public function prioritasLaporan()
    {
        return $this->belongsTo(PrioritasLaporan::class, 'id_prioritas_laporan');
    }
    public function pengguna()
    {
        return $this->belongsTo(User::class,'id_petugas');
    }
}
