<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->text('remote_url')->nullable();
            $table->text('local_url')->nullable();
            $table->text('brief')->nullable();
            $table->text('content')->nullable();
            $table->integer('status')->default(0)->comment('数据库状态：0-试用，1-正式购买，2-开放资源');
            $table->timestamp('expired_at')->nullable();
            $table->text('remark')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('databases');
        Schema::enableForeignKeyConstraints();
    }
}
