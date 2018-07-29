<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('venue');
            $table->string('location');
            $table->string('date');
            $table->integer('duration');
            $table->string('brochure');
            $table->text('desc');
            $table->text('bonus');
            $table->integer('fee_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
