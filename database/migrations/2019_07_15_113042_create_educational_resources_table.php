<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_resources', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->text('title', 500);
            $table->integer('Gender')->unsigned()->comment('1-> male/ 2-> female/ 3-> both');
            $table->integer('age_group')->unsigned()->comment('1-> child [0-12]/ 2-> Adolescent [13-18]/ 3-> Adults [19-64]/ 4-> Elderly [65+]');
            $table->text('language', 500);
            $table->text('url', 1000);
            $table->text('format');
            $table->text('keywords', 1000);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('educational_resources');
    }
}
