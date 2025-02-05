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
        Schema::create('kaffah', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tahun');
            $table->string('januari');
            $table->string('februari');
            $table->string('maret');
            $table->string('april');
            $table->string('mei');
            $table->string('juni');
            $table->string('juli');
            $table->string('agustus');
            $table->string('september');
            $table->string('oktober');
            $table->string('november');
            $table->string('desember');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaffah');
    }
};
