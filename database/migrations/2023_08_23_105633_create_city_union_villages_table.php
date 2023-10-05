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
        Schema::create('city_union_villages', function (Blueprint $table) {
            $table->id();
            $table->string('city_union_villages_name_eng');
            $table->string('city_union_villages_name_ban');
            $table->string('type')->nullable();
            $table->integer('status')->nullable();
            $table->string('soft_delete');

            $table->bigInteger('districts')->nullable()->unsigned();
            $table->foreign('districts')->references('id')->on('districts');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_union_villages');
    }
};
