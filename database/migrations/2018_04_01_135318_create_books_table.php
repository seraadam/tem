<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cover');
            $table->string('desc');
            $table->string('pages')->nullable();
            $table->integer('price')->default(0);
            $table->integer('subscription_price')->default(0);
            $table->integer('book_price')->default(0);
            $table->integer('group_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->boolean('is_active')->default(0);
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
