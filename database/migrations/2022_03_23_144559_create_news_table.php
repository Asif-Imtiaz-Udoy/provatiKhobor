<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('title');
            $table->string('sub_title');
            $table->string('news_image');
            $table->string('image_caption');
            $table->text('news_body');
            $table->integer('lead_news')->default(0);
            $table->integer('news_box')->default(0);
            $table->integer('type')->default(0);
            $table->string('reporter')->nullable();
            $table->string('tag')->nullable();
            $table->string('sub_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
