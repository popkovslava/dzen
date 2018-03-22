<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 400);
            $table->string('slug',150)->unique();
            $table->string('description',800)->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('main_page')->default(false);
            $table->integer('public')->default(1);
            $table->longText('text')->nullable();
            $table->integer('clients_section_id')->unsigned()->nullable();
            $table->integer('clients_section_category_id')->unsigned()->nullable();
            $table->foreign('clients_section_category_id')->references('id')->on('clients_section_categories');
            $table->integer('gallery_id')->unsigned()->nullable();
            $table->foreign('gallery_id')->references('id')->on('galleries');
            $table->integer('video_category_id')->unsigned()->nullable();
            $table->foreign('video_category_id')->references('id')->on('video_categories');
            $table->integer('work_id')->unsigned()->nullable();
            $table->foreign('work_id')->references('id')->on('works');
            $table->integer('banner_bottom_id')->unsigned()->nullable();
            $table->foreign('banner_bottom_id')->references('id')->on('banner_bottoms');
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
        Schema::table('pages', function(Blueprint $table) {
            $table->dropForeign('pages_gallery_id_foreign');
            $table->dropForeign('pages_clients_section_category_id_foreign');
            $table->dropForeign('pages_banner_bottom_id_foreign');
            $table->dropForeign('pages_video_category_id_foreign');
            $table->dropForeign('pages_work_id_foreign');
        });
        Schema::dropIfExists('pages');
    }
}
