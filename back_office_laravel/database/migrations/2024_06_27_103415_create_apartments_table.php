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
            $table->decimal('price', 6, 2);
            $table->tinyInteger('rooms_number');
            $table->tinyInteger('beds_number');
            $table->tinyInteger('baths_number');
            $table->integer('mtq');
            $table->string('address', 255);
            $table->decimal('latitude', 11, 6)->nullable();
            $table->decimal('longitude', 11, 6)->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('visible');
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
