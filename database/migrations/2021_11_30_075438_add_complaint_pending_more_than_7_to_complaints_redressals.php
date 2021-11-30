<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComplaintPendingMoreThan7ToComplaintsRedressals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaints_redressals', function (Blueprint $table) {
            $table->dropColumn('complaint_pending_3_to_10');
            $table->dropColumn('complaint_pending_more_than_10');
            $table->unsignedBigInteger('complaint_pending_more_than_7')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaints_redressals', function (Blueprint $table) {
            $table->dropColumn('complaint_pending_more_than_7');
            $table->unsignedBigInteger('complaint_pending_3_to_10')->nullable();
            $table->unsignedBigInteger('complaint_pending_more_than_10')->nullable();
        });
    }
}
