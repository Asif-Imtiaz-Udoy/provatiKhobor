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
            $table->integer('category_id');
            $table->integer('prodesh_id')->nullable();
            $table->string('category_slug');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('slug');
            $table->string('news_image');
            $table->string('image_caption')->nullable();
            $table->text('news_body');
            $table->integer('lead_news')->nullable();
            $table->integer('news_box')->nullable();
            $table->integer('type')->nullable();
            $table->string('reporter');
            $table->integer('view_count')->default(0);
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
