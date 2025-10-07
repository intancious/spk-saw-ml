<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->unsignedBigInteger('id_alternatif');
            $table->float('nilai')->default(0);
            $table->timestamps();

            // Relasi ke tabel alternatif
            $table->foreign('id_alternatif')
                ->references('id_alternatif')
                ->on('alternatif')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil');
    }
};
