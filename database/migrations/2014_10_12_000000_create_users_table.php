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
            $table->boolean('jenis_kelamin');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->string('kode_pos');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->foreignId('role')->nullable()->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_lk')->nullable()->references('id')->on('list_lks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_upt')->nullable()->references('id')->on('list_upts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_spesiliasasi')->nullable()->references('id')->on('list_spesiess')->onDelete('cascade')->onUpdate('cascade');
            $table->string('area')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status_permission')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();
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
