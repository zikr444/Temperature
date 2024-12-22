<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'ruang'
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruang', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('nama_ruang'); // Nama ruangan
            $table->float('suhu'); // Suhu di dalam ruangan
        });
    }

    /**
     * Membatalkan migrasi dan menghapus tabel 'ruang'
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruang');
    }
}
