<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_document_examined')->nullable();
            $table->unsignedBigInteger('fee_violations_identified')->nullable();
            $table->unsignedBigInteger('fee_verification_deposit')->nullable();
            $table->unsignedTinyInteger('fee_status')->nullable()->default(1);
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
        Schema::dropIfExists('tender_fees');
    }
}
