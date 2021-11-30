<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComplaintPendingOtherMoreThan7ToComplaintsRedressals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaints_redressals', function (Blueprint $table) {
            $table->unsignedBigInteger('complaint_pending_other_more_than_7')->nullable();
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
            $table->dropColumn('complaint_pending_other_more_than_7');
        });
    }
}
