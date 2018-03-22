<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('public')->nullable();
            $table->integer('position')->unsigned();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();
            $table->string('alt')->nullable();
            $table->string('link_in')->nullable();
            $table->string('link_fb')->nullable();
            $table->integer('clients_section_category_id')->unsigned()->nullable();
            $table->foreign('clients_section_category_id')->references('id')->on('clients_section_categories')->onDelete('cascade');
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
        Schema::table('clients_sections', function(Blueprint $table) {
            $table->dropForeign('clients_sections_clients_section_category_id_foreign');
        });
        Schema::dropIfExists('clients_sections');
    }
}
