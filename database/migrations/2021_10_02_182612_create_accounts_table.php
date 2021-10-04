<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_issued')->nullable();
            $table->unsignedBigInteger('account_activated')->nullable();
            $table->unsignedBigInteger('account_deactivated')->nullable();
            $table->string('account_deactivated_file')->nullable();
            $table->unsignedBigInteger('account_blocked_till_date')->nullable();
            $table->unsignedTinyInteger('account_status')->nullable()->default(1);
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
        Schema::dropIfExists('accounts');
    }
}
