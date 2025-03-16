<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class PengaturanEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturans_email', function (Blueprint $table) {
            $table->enum('mailer',array('SMTP','IMAP','POP3'))->default('SMTP');
            $table->string('mail_host');
            $table->integer('port');
            $table->enum('encryption',array('SSL','TLS'))->default('SSL');
            $table->string('username');
            $table->string('password');
            $table->string('email');
          });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaturans_email');
    }
}
