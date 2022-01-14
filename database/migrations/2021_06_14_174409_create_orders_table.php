<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cart_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('price');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('email')->nullable();

            // PDO Payments
            $table->string('company_ref')->nullable();
            $table->string('result_code')->nullable();
            $table->string('result_explanation')->nullable();
            $table->string('trans_token')->nullable();
            $table->string('trans_ref')->nullable();

            //           Order Status
            $table->boolean('delivered')->default(0);
            $table->date('delivered_date')->nullable();
            $table->boolean('cancelled')->default(0);
            $table->date('cancelled_date')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
