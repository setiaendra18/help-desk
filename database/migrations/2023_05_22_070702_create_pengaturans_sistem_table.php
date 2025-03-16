<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePengaturansSistemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturans_sistem', function (Blueprint $table) {
          $table->string('nama_sistem');
          $table->string('nama_instansi');
          $table->char('no_telephone', 13);
          $table->string('email',50);
          $table->string('url_domain',50);
          $table->text('alamat');
          $table->string('author');
          $table->string('logo_images');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaturans_sistem');
    }
}
