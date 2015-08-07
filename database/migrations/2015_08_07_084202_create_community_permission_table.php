<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_permission', function (Blueprint $table) {
            $table->integer('community')->unsigned()->index();
            $table->string('post', 16)->index();
            $table->integer('permission')->unsigned()->index();
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('community')->references('id')->on('community')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permission')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('community_permission');
    }
}
