<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('closed_by_id')->unsigned()->nullable();
            $table->bigInteger('shop_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->integer('status')->default(0);

            //           Order Status
            $table->boolean('delivered')->default(0);
            $table->date('delivered_date')->nullable();
            $table->boolean('cancelled')->default(0);
            $table->date('cancelled_date')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('closed_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders');
    }
}
