<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsToAdvice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advice', function (Blueprint $table) {
            $table->renameColumn('advice_pending_3_to_10', 'advice_pending_3_to_7');
            $table->renameColumn('advice_pending_more_than_10', 'advice_pending_more_than_7');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advice', function (Blueprint $table) {
            $table->renameColumn('advice_pending_3_to_7', 'advice_pending_3_to_10');
            $table->renameColumn('advice_pending_more_than_7', 'advice_pending_more_than_10');
        });
    }
}
