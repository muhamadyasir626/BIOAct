<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monitoring_investasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lk')->references('id')->on('lembaga_konservasis');
            $table->integer('jumlah_karyawan_laki');
            $table->integer('jumlah_karyawan_perempuan');
            $table->integer('total_karyawan');
            $table->integer('jumlah_dokter_hewan');
            $table->integer('jumlah_satwa');
            $table->integer('jumlah_satwa_terancam_punah');
            $table->integer('jumlah_lahan_konservasi');
            $table->integer('jumlah_investasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_investasis');
    }
};
