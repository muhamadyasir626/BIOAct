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
            $table->string('name',255);
            $table->string('username',255)->unique();
            $table->boolean('jenis_kelamin');
            $table->string('nip',20)->unique();
            $table->string('email',255)->unique();
            $table->string('no_telepon',20);
            $table->string('kode_pos',5);
            $table->string('provinsi',50);
            $table->string('kabupaten',50);
            $table->string('kecamatan',50);
            $table->string('kelurahan',50);
            $table->foreignId('role')->nullable()->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_lk')->nullable()->references('id')->on('list_lks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_upt')->nullable()->references('id')->on('list_upts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_spesiess')->nullable()->references('id')->on('list_spesiess')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_bentuk')->nullable()->references('id')->on('list_upts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_wilayah')->nullable()->references('id')->on('list_upts')->onDelete('cascade')->onUpdate('cascade');
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
