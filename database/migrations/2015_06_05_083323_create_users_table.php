<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->string('pycid', 8);
            $table->string('class', 2);
            $table->tinyInteger('class_no', false, true);
            $table->string('ename', 64);
            $table->string('cname', 16);
            $table->char('sex', 1);
            $table->primary('pycid');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}