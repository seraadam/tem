<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organization');
            $table->string('avatar')->nullable();
            $table->string('desc')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('facebook')->nullable();
            $table->string('website')->nullable();
            $table->integer('organization_type_id')->unsigned();
            $table->foreign('organization_type_id')->references('id')->on('organization_types')->onDelete('cascade');
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
        Schema::dropIfExists('organizations');
    }
}
