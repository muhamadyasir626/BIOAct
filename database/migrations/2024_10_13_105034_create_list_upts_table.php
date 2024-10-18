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
        Schema::create('list_upts', function (Blueprint $table) {
            $table->id();
            $table->string('bentuk_upt',50);
            $table->string('slug_bentuk_upt',50);
            $table->string('wilayah',50);
            $table->string('slug_wilayah',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
