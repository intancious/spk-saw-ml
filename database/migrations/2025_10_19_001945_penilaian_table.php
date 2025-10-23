<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian');
            $table->unsignedBigInteger('id_periode'); // relasi ke periode
            $table->unsignedBigInteger('id_alternatif');
            $table->unsignedBigInteger('id_kriteria');
            $table->float('nilai')->default(0);
            $table->timestamps();

            // Foreign key ke tabel periode, alternatif dan kriteria
            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periodes')
                ->onDelete('cascade');

            $table->foreign('id_alternatif')
                ->references('id_alternatif')
                ->on('alternatif')
                ->onDelete('cascade');

            $table->foreign('id_kriteria')
                ->references('id_kriteria')
                ->on('kriteria')
                ->onDelete('cascade');

            // Optional: pastikan kombinasi unik alternatif + kriteria
            $table->unique(['id_periode', 'id_alternatif', 'id_kriteria']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
};
