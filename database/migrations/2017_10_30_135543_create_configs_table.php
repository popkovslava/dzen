<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
             $table->increments('id');
             $table->string('title')->nullable();
             $table->integer('link_id')->unsigned()->nullable();
             $table->foreign('link_id')->references('id')->on('links');
             $table->integer('key_config_id')->unsigned()->nullable();
             $table->foreign('key_config_id')->references('id')->on('key_configs');
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
        Schema::table('configs', function(Blueprint $table) {
            $table->dropForeign('configs_key_config_id_foreign');
            $table->dropForeign('configs_link_id_foreign');
        });
        Schema::dropIfExists('configs');
    }
}
