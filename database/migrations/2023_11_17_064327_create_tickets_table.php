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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
             $table->integer('hall_id')->nullable();
             $table->integer('movie_id')->nullable();
             $table->integer('user_id')->nullable();
             $table->float('price', 8, 2)->nullable();
             $table->string('show_time')->nullable();
             $table->string('ticket_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
