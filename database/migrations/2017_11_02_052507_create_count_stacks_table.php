<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountStacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_stacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stack_category_id')->unsigned()->nullable();
            $table->foreign('stack_category_id')->references('id')->on('stack_categories')->onDelete('cascade');
            $table->integer('stack_id')->unsigned()->nullable();
            $table->foreign('stack_id')->references('id')->on('stacks')->onDelete('cascade');
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
        Schema::table('count_stacks', function(Blueprint $table) {
            $table->dropForeign('count_stacks_stack_category_id_foreign');
            $table->dropForeign('count_stacks_stack_id_foreign');
        });
        Schema::dropIfExists('count_stacks');
    }
}

