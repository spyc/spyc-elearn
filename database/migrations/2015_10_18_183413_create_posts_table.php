<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', '64')->inedx();
            $table->string('title')->index();
            $table->enum('lang', ['en', 'zh']);
            $table->text('content');

            $table->string('owner', 8);
            $table->integer('group', false, true);
            $table->integer('auth', false, true)->default(473);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner')->references('pycid')->on('user');
            $table->foreign('group')->references('community')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
