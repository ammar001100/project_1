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
        Schema::create('report_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_num');
            $table->string('client_name');
            $table->integer('user_id');
            $table->string('user_name');
            $table->integer('client_id');
            $table->integer('total');
            $table->string('order_date');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_orders');
    }
};
