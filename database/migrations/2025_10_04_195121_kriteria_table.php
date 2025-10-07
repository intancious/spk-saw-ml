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
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id('id_kriteria'); // pakai nama sesuai struktur aslimu
            $table->string('kode_kriteria', 10)->unique();
            $table->string('nama', 50);
            $table->enum('type', ['Benefit', 'Cost']);
            $table->float('bobot');
            $table->boolean('ada_pilihan')->default(false);
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
        Schema::dropIfExists('kriteria');
    }
};
