<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('country', 100)->nullable();
            $table->string('item_type', 100)->nullable();
            $table->string('sales_channel', 100)->nullable();
            $table->string('order_id')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('total_profit')->nullable();

            $table->foreignId('created_by_id')->nullable()->constrained('users','id');
            $table->foreignId('updated_by_id')->nullable()->constrained('users','id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
