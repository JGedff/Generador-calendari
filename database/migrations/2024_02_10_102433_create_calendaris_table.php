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
        Schema::create('calendaris', function (Blueprint $table) {
            $table->id();
            $table->string('curs');
            $table->string('cicle_modul');
            $table->integer('dl_days');
            $table->integer('dm_days');
            $table->integer('dc_days');
            $table->integer('dj_days');
            $table->integer('dv_days');
            $table->string('ufName');
            $table->integer('ufDays');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendaris');
    }
};
