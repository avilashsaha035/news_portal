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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->string('title_eng')->nullable();
            $table->string('title_ban')->nullable();
            $table->longText('description_eng')->nullable();
            $table->longText('description_ban')->nullable();
            $table->string('banner')->nullable();
            $table->string('date')->nullable();
            $table->string('video_link')->nullable();
            $table->string('video_live')->nullable();
            $table->string('latest_news')->nullable();
            $table->dateTime('time_duration')->nullable();

            $table->bigInteger('news_categories')->nullable()->unsigned();
            $table->foreign('news_categories')->references('id')->on('news_categories');

            $table->bigInteger('sub_categories')->nullable()->unsigned();
            $table->foreign('sub_categories')->references('id')->on('sub_categories');

            $table->bigInteger('child_sub_categories')->nullable()->unsigned();
            $table->foreign('child_sub_categories')->references('id')->on('child_sub_categories');



            $table->bigInteger('countries')->nullable()->unsigned();
            $table->foreign('countries')->references('id')->on('countries');

            $table->bigInteger('divisions')->nullable()->unsigned();
            $table->foreign('divisions')->references('id')->on('divisions');

            $table->bigInteger('districts')->nullable()->unsigned();
            $table->foreign('districts')->references('id')->on('districts');

            $table->bigInteger('city_union_villages')->nullable()->unsigned();
            $table->foreign('city_union_villages')->references('id')->on('city_union_villages');

            $table->string('slug')->unique();

            $table->string('status')->nullable();
            $table->string('soft_delete')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
