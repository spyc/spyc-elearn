<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PatchLibraryNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('library_news', function (Blueprint $table) {
            $table->timestamp('event_time')->after('title');
            $table->string('type', 8)->index()->after('event_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('library_news', function (Blueprint $table) {
            $table->dropColumn('event_time');
            $table->dropColumn('type');
        });
    }
}
