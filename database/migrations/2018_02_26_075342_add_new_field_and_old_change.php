<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldAndOldChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('img_galleries', function (Blueprint $table) {
            $table->renameColumn('large', 'image_large');
            $table->renameColumn('medium', 'image_medium');
            $table->renameColumn('thumb', 'image_thumb');
            $table->renameColumn('hight', 'image_height');
            $table->renameColumn('mini', 'title_img_mini');
            $table->string('image_small')->nullable()->after('medium');
            $table->string('image_mini')->nullable()->after('image_small');
            $table->string('image_height_large')->nullable()->after('hight');
            $table->string('image_height_medium')->nullable()->after('image_height_large');
            $table->string('image_height_small')->nullable()->after('image_height_medium');
            $table->string('image_height_thumb')->nullable()->after('image_height_small');
            $table->string('image_height_mini')->nullable()->after('image_height_thumb');
        });

        Schema::table('works', function (Blueprint $table) {
            $table->renameColumn('large', 'image_large');
            $table->renameColumn('medium', 'image_medium');
            $table->renameColumn('thumb', 'image_thumb');
            $table->string('image_small')->nullable()->after('medium');
            $table->string('image_mini')->nullable()->after('image_small');
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->string('image_mini')->nullable()->after('image');
        });
        
        Schema::table('clients_sections', function (Blueprint $table) {
            $table->renameColumn('thumb', 'image_thumb');
            $table->string('image_mini')->nullable()->after('thumb');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->tinyInteger('shuffle')->default(false);
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
            $table->renameColumn('image_large', 'large');
            $table->renameColumn('image_medium', 'medium');
            $table->renameColumn('image_thumb', 'thumb');
            $table->renameColumn('image_height', 'hight');
            $table->dropColumn('image_small');
            $table->dropColumn('image_mini');
            $table->dropColumn('image_height_large');
            $table->dropColumn('image_height_medium');
            $table->dropColumn('image_height_small');
            $table->dropColumn('image_height_thumb');
            $table->dropColumn('image_height_mini');
            $table->dropColumn('title_img_mini');
            // $table->dropColumn('shuffle');
        });

        Schema::table('works', function (Blueprint $table) {
            $table->renameColumn('image_large', 'large');
            $table->renameColumn('image_medium', 'medium');
            $table->renameColumn('image_thumb', 'thumb');
            $table->dropColumn('image_small');
            $table->dropColumn('image_mini');
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('image_mini');
        });

        Schema::table('clients_sections', function (Blueprint $table) {
            $table->renameColumn('image_thumb', 'thumb');
            $table->dropColumn('image_mini');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('shuffle');
        });
    }
}
