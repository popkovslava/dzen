<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('img_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned()->nullable();
            $table->integer('stack_category_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();
            $table->string('large')->nullable();
            $table->string('medium')->nullable();
            $table->string('link_to')->nullable();
            $table->string('hight')->nullable();
            $table->string('title_img')->nullable();
            $table->string('mini')->nullable();
            $table->string('position_img')->nullable();
            $table->string('position_img_vertical')->nullable();
            $table->string('alt')->nullable();
            $table->tinyInteger('public')->default(true);
            $table->integer('position')->unsigned();
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->foreign('stack_category_id')->references('id')->on('stack_categories');
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
        Schema::table('img_galleries', function (Blueprint $table) {
            $table->dropForeign('img_galleries_gallery_id_foreign');
            $table->dropForeign('img_galleries_stack_category_id_foreign');
        });

        Schema::dropIfExists('img_galleries');
    }
}
