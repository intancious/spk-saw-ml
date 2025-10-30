<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->unsignedBigInteger('id_alternatif');
            $table->unsignedBigInteger('id_periode'); // 🆕 Tambahan kolom id_periode
            $table->float('nilai')->default(0);
            $table->timestamps();

            // Relasi ke tabel alternatif
            $table->foreign('id_alternatif')
                ->references('id_alternatif')
                ->on('alternatif')
                ->onDelete('cascade');

            // Relasi ke tabel periode
            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periodes')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('hasil');
    }
};
