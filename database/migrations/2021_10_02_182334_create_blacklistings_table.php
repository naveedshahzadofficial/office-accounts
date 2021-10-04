<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlacklistingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklistings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blacklist_order')->nullable();
            $table->unsignedBigInteger('blacklisting_case_disposed_off')->nullable();
            $table->unsignedBigInteger('blacklisting_pending_15_to_30')->nullable();
            $table->unsignedBigInteger('blacklisting_pending_more_than_30')->nullable();
            $table->unsignedTinyInteger('blacklisting_status')->nullable()->default(1);
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
        Schema::dropIfExists('blacklistings');
    }
}
