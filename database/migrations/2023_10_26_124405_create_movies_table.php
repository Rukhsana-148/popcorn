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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('poster')->nullable();
            $table->string('cast')->nullable();
            $table->string('singer')->nullable();
            $table->string('director')->nullable();
            $table->string('description')->nullable();
            $table->string('show_time')->nullable();
            $table->float('price', 8, 2)->nullable();
            $table->string('review')->nullable();
            $table->integer('hall_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
