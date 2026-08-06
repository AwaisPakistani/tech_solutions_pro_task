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
            $table->string('country', 100);
            $table->string('item_type', 100);
            $table->string('sales_channel', 100);
            $table->bigInteger('order_id')->unsigned();
            $table->double('unit_price', 15, 2);
            $table->double('total_profit', 15, 2);
            
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
