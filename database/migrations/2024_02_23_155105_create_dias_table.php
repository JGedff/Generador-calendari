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
        Schema::create('dias', function (Blueprint $table) {
            $table->id();
            $table->boolean('dilluns');
            $table->boolean('dimarts');
            $table->boolean('dimecres');
            $table->boolean('dijous');
            $table->boolean('divendres');
            $table->unsignedBigInteger('modul_id');
            $table->foreign('modul_id')
                ->references('id')
                    ->on('moduls')
                        ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias');
    }
};
