<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkClientCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_client_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('link_id')->unsigned()->nullable();
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
            $table->integer('clients_section_id')->unsigned()->nullable();
            $table->foreign('clients_section_id')->references('id')->on('clients_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_client_counts', function (Blueprint $table) {
            $table->dropForeign('link_client_counts_link_id_foreign');
            $table->dropForeign('link_client_counts_clients_section_id_foreign');
        });

        Schema::dropIfExists('link_client_counts');
    }
}
