<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $uuid = Uuid::uuid4()->toString();

        DB::table('users')->insert([
            'id'=>$uuid,
            'name' => "Administrator",
            'username'=>"admin",
            'email' => 'admin@gmail.com',
            'telephone'=>'08134331699',
            'password' => Hash::make('12345'),
        ]);


        DB::table('pengaturans_sistem')->insert([
            'nama_sistem' => "WBS",
            'nama_instansi'=> "BPKHTL Wilayah XI Yogyakarta",
            'no_telephone'=>'(0274) 388923',
            'email' => 'info@bpkh11jogja.ac.id',
            'author'=>'JAKARTA',
            'url_domain' =>'https://wbs.bpkh11jogja.net/.',
            'alamat'=>'Jl. Ngeksigondo No.58, Prenggan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55172',
            'logo_images'=>'logo.png',
        ]);

    }
}
