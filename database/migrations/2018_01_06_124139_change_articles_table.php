<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->integer('public')->default(1)->change();
        });
        Schema::table('key_configs', function (Blueprint $table) {
            $table->integer('public')->default(1)->change();
        });
        Schema::table('stacks', function (Blueprint $table) {
            $table->integer('public')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->integer('public')->change();
        });
        Schema::table('key_configs', function (Blueprint $table) {
            $table->integer('public')->change();
        });
        Schema::table('stacks', function (Blueprint $table) {
            $table->integer('public')->change();
        });
    }
}
