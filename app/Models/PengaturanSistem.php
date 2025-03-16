<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PengaturanSistem extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $guarded = ['id'];
    protected $table = 'pengaturans_sistem';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];
}
