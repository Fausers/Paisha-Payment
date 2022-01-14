<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouponIdToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('coupon_id')->unsigned()->nullable()->after('price');
            $table->integer('discount')->nullable()->after('price');
            $table->integer('status')->default(0)->nullable()->after('coupon_id');
            $table->integer('payment_status')->default(0)->nullable()->after('coupon_id');

            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_coupon_id_foreign');
            $table->dropColumn('coupon_id');
            $table->dropColumn('discount');
            $table->dropColumn('status');
            $table->dropColumn('payment_status');
        });
    }
}
