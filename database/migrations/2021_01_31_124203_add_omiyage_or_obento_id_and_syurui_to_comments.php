<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOmiyageOrObentoIdAndSyuruiToComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            //作成する
            $table->bigInteger('omiyage_or_obento_id');
            $table->string('syurui');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //削除する
            $table->dropColumn('omiyage_or_obento_id');
            $table->dropColumn('syurui');
        });
    }
}
