<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('educational_resource_id');
          $table->foreign('educational_resource_id')->references('id')->on('educational_resources');
          $table->text('name', 1000);
          $table->text('email', 1000)->nullable();
          $table->integer('phone')->unsigned()->nullable();
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
        Schema::dropIfExists('authors');
    }
}
