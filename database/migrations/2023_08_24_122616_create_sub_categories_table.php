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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('cate_title_eng');
            $table->string('cate_title_ban');
            $table->string('status');
            $table->string('soft_delete');

            $table->bigInteger('news_categories')->nullable()->unsigned();
            $table->foreign('news_categories')->references('id')->on('news_categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
