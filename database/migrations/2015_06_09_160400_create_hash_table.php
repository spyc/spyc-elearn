<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hash', function(Blueprint $table)
        {
            $table->string('pycid', 8);
            #$table->foreign('pycid')->reference('pycid')->on('users')->onDelete('cascade');
            $table->string('hash', 64);
            $table->string('remember_token',100)->nullable();
            $table->timestamps();
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
        Schema::drop('hash');
    }
}