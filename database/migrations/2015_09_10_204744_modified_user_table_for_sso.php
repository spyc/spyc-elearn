<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifiedUserTableForSso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->softDeletes();
            $table->renameColumn('name', 'ename');
            $table->string('cname', 8)->after('name');
            $table->string('class', 2)->after('cname');
            $table->tinyInteger('class_no', false, true)->after('class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('password', 60);
            $table->dropSoftDeletes();
            $table->dropColumn(['cname', 'class', 'class_no']);
            $table->renameColumn('ename', 'name');
        });
    }
}
