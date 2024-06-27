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
        Schema::table('views', function (Blueprint $table) {
            //vincolo
            $table->unsignedBigInteger('apartment_id')->mullable();
            //colonna
            $table->foreign('apartment_id')->references('id')->on('views')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('views', function (Blueprint $table) {
            //vincolo
            $table->dropForeign('views_apartment_id_foreign');
            //colonna
            $table->dropColumn('apartment_id');
        });
    }
};
