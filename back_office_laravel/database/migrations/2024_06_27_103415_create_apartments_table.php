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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description')->nullable();
            $table->decimal('price', total: 6, places: 2);
            $table->tinyInteger('rooms_number');
            $table->tinyInteger('beds_number');
            $table->tinyInteger('baths_number');
            $table->Integer('mtq');
            $table->string('address', 255);
            $table->decimal('latitude', total: 11, places: 6)->nullable();
            $table->decimal('longitude', total: 11, places: 6)->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
