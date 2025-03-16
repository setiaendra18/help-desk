<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_unik');
            $table->char('id_jenis_laporan', 36);
            $table->char('id_prioritas_laporan', 36);
            $table->string('id_petugas', 36)->nullable();
            $table->string('nama_pelapor');
            $table->char('no_telephone', 13);
            $table->string('email');
            $table->text('uraian_kendala');
            $table->string('file');
            $table->enum('status', array('BARU', 'DITERIMA', 'DALAM PROSES', 'TIDAK VALID', 'SELESAI'));
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
