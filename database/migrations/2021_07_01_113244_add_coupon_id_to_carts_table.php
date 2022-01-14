<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouponIdToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
               $table->bigInteger('coupon_id')->unsigned()->nullable()->after('total_price');
               $table->integer('sub_total')->after('total_items')->nullable();

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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign('carts_coupon_id_foreign');
            $table->dropColumn('coupon_id');
            $table->dropColumn('sub_total');
        });
    }
}
