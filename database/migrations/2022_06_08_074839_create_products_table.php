<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('sub_category_id')->nullable()->constrained();
            $table->string('product_name');
            $table->foreignId('unit_id')->nullable()->constrained();
            $table->decimal('unit_price',11,2)->nullable()->default(0.00);
            $table->string('shipping_type')->nullable();
            $table->decimal('shipping_cost',11,2)->nullable()->default(0.00);
            $table->text('description')->nullable();
            $table->schemalessAttributes('attributes');
            $table->unsignedTinyInteger('product_status')->nullable()->default(1);
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
        Schema::dropIfExists('products');
    }
}
