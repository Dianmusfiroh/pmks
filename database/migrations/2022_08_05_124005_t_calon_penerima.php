<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TCalonPenerima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_calon_penerima', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pmks');
            $table->string('nama');
            $table->string('jenis_bantuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_calon_penerima');
    }
}
