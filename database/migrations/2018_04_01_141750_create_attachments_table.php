<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('attachment');
            $table->boolean('is_active')->default(0);
            $table->integer('folder_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('attachment_types')->onDelete('cascade');
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
        Schema::dropIfExists('attachments');
    }
}
