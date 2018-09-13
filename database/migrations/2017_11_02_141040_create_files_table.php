<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fileName')->nullable();
            $table->string('filePath')->nullable();
            $table->string('fileUrl')->nullable();
            $table->integer('send_id')->unsigned()->nullable();
            $table->foreign('send_id')->references('id')->on('sends')->onDelete('cascade');
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
        Schema::table('files', function(Blueprint $table) {
            $table->dropForeign('files_send_id_foreign');
        });
        Schema::dropIfExists('files');
    }
}
