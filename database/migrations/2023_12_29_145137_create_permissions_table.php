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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();

            $table->boolean('employee_create')->default(false);
            $table->boolean('employee_update')->default(false);
            $table->boolean('employee_delete')->default(false);
            $table->boolean('employee_read')->default(false);

            $table->boolean('product_create')->default(false);
            $table->boolean('product_update')->default(false);
            $table->boolean('product_delete')->default(false);
            $table->boolean('product_read')->default(false);

            $table->boolean('section_create')->default(false);
            $table->boolean('section_update')->default(false);
            $table->boolean('section_delete')->default(false);
            $table->boolean('section_read')->default(false);

            $table->boolean('order_create')->default(false);
            $table->boolean('order_update')->default(false);
            $table->boolean('order_delete')->default(false);
            $table->boolean('order_read')->default(false);

            $table->boolean('stock_create')->default(false);
            $table->boolean('stock_update')->default(false);
            $table->boolean('stock_delete')->default(false);
            $table->boolean('stock_read')->default(false);

            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
