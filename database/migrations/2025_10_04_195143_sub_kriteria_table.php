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
        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id('id_sub_kriteria');
            $table->unsignedBigInteger('kriteria_id');
            $table->string('nama', 255);
            $table->float('nilai')->default(0);
            $table->timestamps();

            // Foreign key ke tabel kriteria
            $table->foreign('kriteria_id')
                ->references('id_kriteria')
                ->on('kriteria')
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
        Schema::dropIfExists('sub_kriteria');
    }
};
