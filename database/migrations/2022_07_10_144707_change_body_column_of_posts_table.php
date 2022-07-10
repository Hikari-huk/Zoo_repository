<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBodyColumnOfPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //bodyをcaptionに変更
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('body', 'caption');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->string('caption',200)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
        });
    }
}
