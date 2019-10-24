<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('database_type', function (Blueprint $table) {
            $table->unsignedBigInteger('database_id');
            $table->unsignedBigInteger('type_id');

            $table->foreign('database_id')->references('id')->on('databases')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');

            $table->index(['database_id', 'type_id']);
            $table->unique(['database_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('database_type');
    }
}
