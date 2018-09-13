<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateLinkCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('link_id')->unsigned()->nullable();
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
            $table->integer('img_gallery_id')->unsigned()->nullable();
            $table->foreign('img_gallery_id')->references('id')->on('img_galleries')->onDelete('cascade');
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
        Schema::table('link_counts', function (Blueprint $table) {
            $table->dropForeign('link_counts_link_id_foreign');
            $table->dropForeign('link_counts_img_gallery_id_foreign');
        });

        Schema::dropIfExists('link_counts');
    }
}
