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
        Schema::create('festius', function (Blueprint $table) {
            $table->id();
            $table->word('nom');
            $table->unsignedBigInteger('curs_id');
            $table->foreign('curs_id')
                ->references('id')
                    ->on('curs')
                        ->onDelete('cascade');
            $table->dateTime('data_inici', 6);
            $table->dateTime('data_final', 6);
            $table->boolean('vacances');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festius');
    }
};
