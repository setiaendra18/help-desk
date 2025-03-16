<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class JenisPelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisPelanggaran = [
            [
                'id' => Uuid::uuid4()->toString(),
                'jenis_pelanggaran' => 'Penyimpangan Tugas Dan Fungsi',
                'deskripsi' => 'Deskripsi dari jenis pelanggaran Penyimpangan Tugas Dan Fungsi',
                'status'=>"AKTIF"
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'jenis_pelanggaran' => 'Benturan Kepentingan',
                'deskripsi' => 'Deskripsi dari jenis pelanggaran Benturan Kepentingan',
                'status'=>"AKTIF"
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'jenis_pelanggaran' => 'Gratifikasi',
                'deskripsi' => 'Deskripsi dari jenis pelanggaran Gratifikasi',
                'status'=>"AKTIF"
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'jenis_pelanggaran' => 'Melanggar Peraturan Perundangan Yang Berlaku',
                'deskripsi' => 'Deskripsi dari jenis pelanggaran Melanggar Peraturan Perundangan Yang Berlaku',
                'status'=>"AKTIF"
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'jenis_pelanggaran' => 'Tidak Pidana Korupsi',
                'deskripsi' => 'Deskripsi dari jenis pelanggaran Tidak Pidana Korupsi',
                'status'=>"AKTIF"
            ],
        ];

        // Insert data ke tabel 'jenis_pelanggaran'
        DB::table('jenis_pelanggarans')->insert($jenisPelanggaran);
    }
}
