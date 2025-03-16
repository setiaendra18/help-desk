<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class JenisLaporan extends Model
{
    use Uuid,HasFactory;
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $guarded = ['id'];
    protected $table = 'jenis_laporan';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function dataPengaduan()
    {
        return $this->hasMany(DataPengaduan::class, 'id');
    }
}
