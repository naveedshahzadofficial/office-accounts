<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsRedressalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints_redressals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_disposed')->nullable();
            $table->unsignedBigInteger('complaint_pending_3_to_10')->nullable();
            $table->unsignedBigInteger('complaint_pending_more_than_10')->nullable();
            $table->unsignedBigInteger('complaint_other_3_to_10')->nullable();
            $table->unsignedBigInteger('complaint_other_more_than_10')->nullable();
            $table->unsignedTinyInteger('complaint_status')->nullable()->default(1);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints_redressals');
    }
}
