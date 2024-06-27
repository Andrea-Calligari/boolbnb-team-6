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
        Schema::table('messages', function (Blueprint $table) {
            //vincolo
            $table->unsignedBigInteger('apartment_id')->nullable();

            //colonna
            $table->foreign('apartment_id')->references('id')->on('messages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            //droppo il vincolo
            $table->dropForeign('messages_apartment_id_foreign');
            //droppo la colonna
            $table->dropColumn('apartment_id');
        });
    }
};
