<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_products', function (Blueprint $table) {
            $table->id();
            $table->integer('report_order_id');
            $table->integer('order_num');
            $table->string('client_name');
            $table->integer('client_id');
            $table->string('product_name');
            $table->integer('product_id');
            $table->integer('product_price');
            $table->integer('product_price_sale');
            $table->string('product_unit');
            $table->integer('product_quantity');
            $table->integer('product_total');
            $table->integer('won');
            $table->string('order_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_products');
    }
};
