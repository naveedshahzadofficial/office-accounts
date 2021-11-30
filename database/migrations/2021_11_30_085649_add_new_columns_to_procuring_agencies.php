<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToProcuringAgencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procuring_agencies', function (Blueprint $table) {
            $table->unsignedBigInteger('public_sector_organization_59e_registered')->nullable();
            $table->unsignedBigInteger('suppliers_registered')->nullable();
            $table->unsignedBigInteger('psmu_registered')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procuring_agencies', function (Blueprint $table) {
            $table->dropColumn('public_sector_organization_59e_registered');
            $table->dropColumn('suppliers_registered');
            $table->dropColumn('psmu_registered');
        });
    }
}
