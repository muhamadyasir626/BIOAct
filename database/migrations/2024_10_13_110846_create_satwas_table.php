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
        Schema::create('satwas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lk')->references('id')->on('lembaga_konservasis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jenis_koleksi',50);
            $table->string('kelas_satwa',50);
            $table->string('tipe_spesies',50);
            $table->string('status_perlindungan',50);
            $table->string('nama_lokal',50);
            $table->string('slug_lokal');
            $table->string('nama_ilmiah',50);
            $table->string('slug_nama_ilmiah');
            $table->string('status_satwa',50);
            $table->integer('jumlah_jantan');
            $table->integer('jumlah_betina');
            $table->integer('total_jenis');
            $table->date('tanggal_tagging');
            $table->foreignId('id_tagging')->references('id')->on('taggings');
            $table->text('kode_tagging');
            $table->text('alasan_belum_tagging');
            $table->string('ba_tagging');
            $table->string('no_ba_tagging');
            $table->string('no_ba_titipan');
            $table->string('no_ba_kelahiran');
            $table->string('no_ba_kematian');
            $table->string('nama_panggilan_satwa');
            $table->string('slug_nama_panggilan');
            $table->date('tanggal_validas');
            $table->date('tahun_titipan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satwas');
    }
};
