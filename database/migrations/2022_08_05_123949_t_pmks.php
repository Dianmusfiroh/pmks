<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TPmks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pmks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pmks');
            $table->string('nama');
            $table->string('no_kk');
            $table->string('nik');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pmks');

    }
}
