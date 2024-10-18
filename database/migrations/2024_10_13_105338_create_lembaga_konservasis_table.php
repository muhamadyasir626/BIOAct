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
        Schema::create('lembaga_konservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Lk')->references('id')->on('list_lks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 255);
            $table->string('slug')->unique();
            $table->string('provinsi',50);
            $table->string('kota_kabupaten',50);
            $table->string('kecamatan',50);
            $table->string('kelurahan_desa',50);
            $table->string('kode_pos',5);
            $table->string('tahun_izin',5);
            $table->string('np_izin_peroleh',255);
            $table->string('link_sk');
            $table->string('legalitas_perizinan',255);
            $table->string('nomor_tanggal_surat',255);
            $table->string('bentuk_lk',50);
            $table->string('pengelola',20);
            $table->string('nama_pimpinan',255);
            $table->string('izin_perolehan');
            $table->string('tahun_akred',5);
            $table->string('nilai_akred',5);
            $table->string('pks_dengan_lk_lainnya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga__konservasis');
    }
};
