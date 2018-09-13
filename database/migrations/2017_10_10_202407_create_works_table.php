<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();
            $table->string('large')->nullable();
            $table->string('medium')->nullable();
            $table->string('title_img')->nullable();
            $table->string('title_single', 255)->nullable();
            $table->string('title1', 255)->nullable();
            $table->longText('text1')->nullable();
            $table->string('title2', 255)->nullable();
            $table->longText('text2')->nullable();
            $table->string('title3', 255)->nullable();
            $table->longText('text3')->nullable();
            $table->integer('gallery_id_1')->unsigned()->nullable();
            $table->foreign('gallery_id_1')->references('id')->on('galleries');
            $table->integer('gallery_id_2')->unsigned()->nullable();
            $table->foreign('gallery_id_2')->references('id')->on('galleries');
            $table->integer('gallery_id_3')->unsigned()->nullable();
            $table->foreign('gallery_id_3')->references('id')->on('galleries');
            $table->integer('stack_category_id')->unsigned()->nullable();
            $table->foreign('stack_category_id')->references('id')->on('stack_categories');

            $table->text('title_frontend')->nullable();
            $table->text('text_frontend')->nullable();
            $table->text('title_backend')->nullable();
            $table->text('text_backend')->nullable();
            $table->text('title_mobile')->nullable();
            $table->text('text_mobile')->nullable();
            $table->text('title_tools')->nullable();
            $table->text('text_tools')->nullable();

            $table->integer('position')->unsigned();
            $table->integer('public')->default(1);
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

        Schema::table('works', function(Blueprint $table) {
            $table->dropForeign('works_stack_category_id_foreign');
            $table->dropForeign('works_gallery_id_1_foreign');
            $table->dropForeign('works_gallery_id_2_foreign');
            $table->dropForeign('works_gallery_id_3_foreign');
        });

        Schema::dropIfExists('works');
    }
}
