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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('jenis_kelamin'); // Pertimbangkan mengubah menjadi enum jika lebih dari dua jenis kelamin
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->string('kode_pos');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade'); // Ganti 'role' dengan 'role_id'
            $table->foreignId('id_lk')->nullable()->constrained('list_lks')->onDelete('cascade');
            $table->foreignId('id_upt')->nullable()->constrained('list_upts')->onDelete('cascade');
            $table->foreignId('id_spesies')->nullable()->constrained('list_spesiess')->onDelete('cascade');
            $table->string('area')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status_permission')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
