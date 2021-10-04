<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('violation_website')->nullable();
            $table->unsignedBigInteger('violation_newspaper')->nullable();
            $table->unsignedBigInteger('violation_identified')->nullable();
            $table->unsignedBigInteger('violation_removed')->nullable();
            $table->unsignedBigInteger('violation_pending')->nullable();
            $table->string('violation_file')->nullable();
            $table->unsignedTinyInteger('violation_status')->nullable()->default(1);
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
        Schema::dropIfExists('violation_examinations');
    }
}
