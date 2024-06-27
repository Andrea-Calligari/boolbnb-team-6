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
        Schema::table('categories', function (Blueprint $table) {
            //creo lacolonna
            $table->unsignedBigInteger('apartment_id')->nullable();

            //creo il vincolo
            $table->foreign('apartment_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // droppo il vincolo
            $table->dropForeign('categories_apartment_id_foreign');
            
            //droppo la colonna
            $table->dropColumn('apartment_id');
        });
    }
};
