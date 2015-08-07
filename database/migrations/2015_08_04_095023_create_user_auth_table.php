<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_auth', function (Blueprint $table) {
            $table->string('pycid', 8)->index();
            $table->integer('permission')->unsigned()->index();
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pycid')->references('pycid')->on('user')->onDelete('cascade');
            $table->foreign('permission')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_auth');
    }
}
