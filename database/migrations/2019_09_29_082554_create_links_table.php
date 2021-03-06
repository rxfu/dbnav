<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('type', 64)->default('link')->comment('link：链接，file：文件');
            $table->string('file_type', 255)->nullable();
            $table->unsignedBigInteger('database_id');
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->foreign('database_id')->references('id')->on('databases')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
