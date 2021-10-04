<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_internal_conducted')->nullable();
            $table->unsignedBigInteger('inspection_verification_entries')->nullable();
            $table->unsignedBigInteger('inspection_pending_3_to_7')->nullable();
            $table->unsignedBigInteger('inspection_pending_more_than_7')->nullable();
            $table->unsignedBigInteger('inspection_miscellaneous_disposed_off')->nullable();
            $table->unsignedTinyInteger('inspection_status')->nullable()->default(1);
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
        Schema::dropIfExists('inspections');
    }
}
