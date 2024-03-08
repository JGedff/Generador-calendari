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
            $table->unsignedBigInteger('cur_id');
            $table->foreign('cur_id')
                ->references('id')
                    ->on('curs')
                        ->onDelete('cascade');
            $table->unsignedBigInteger('cicle_id');
            $table->foreign('cicle_id')
                ->references('id')
                    ->on('cicles')
                        ->onDelete('cascade');
            $table->unsignedBigInteger('modul_id');
            $table->foreign('modul_id')
                ->references('id')
                    ->on('moduls')
                        ->onDelete('cascade');
            $table->integer('dl_days');
            $table->integer('dm_days');
            $table->integer('dc_days');
            $table->integer('dj_days');
            $table->integer('dv_days');
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
