<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToTenderFees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tender_fees', function (Blueprint $table) {
            $table->unsignedBigInteger('fee_login_ids_activated')->nullable();
            $table->unsignedBigInteger('fee_login_ids_deactivated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tender_fees', function (Blueprint $table) {
            $table->dropColumn('fee_login_ids_activated');
            $table->dropColumn('fee_login_ids_deactivated');
        });
    }
}
