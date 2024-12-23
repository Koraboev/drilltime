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
        Schema::table('shop_products', function (Blueprint $table) {
            $table->string('meta_name_uz')->nullable();
            $table->string('meta_name_ru')->nullable();
            $table->string('meta_name_en')->nullable();
            $table->longText('meta_description_uz')->nullable();
            $table->longText('meta_description_ru')->nullable();
            $table->longText('meta_description_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shop_products', function (Blueprint $table) {
            //
        });
    }
};
