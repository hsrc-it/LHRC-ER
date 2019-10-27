<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgeGroupEducationalResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_group_educational_resource', function (Blueprint $table) {
          $table->bigIncrements('id')->unsigned();
          $table->unsignedBigInteger('age_group_id');
          $table->foreign('age_group_id')->references('id')->on('age_groups');
          $table->unsignedBigInteger('educational_resource_id');
          $table->foreign('educational_resource_id')->references('id')->on('educational_resources');
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
        Schema::dropIfExists('age_group_educational_resource');
    }
}
