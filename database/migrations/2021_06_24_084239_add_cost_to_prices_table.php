<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostToPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->integer('cost');
            $table->integer('markup');
            $table->integer('price_include_tax')->default(0);
            $table->integer('price_change_allowed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->dropColumn('cost');
            $table->dropColumn('markup');
            $table->dropColumn('price_include_tax');
            $table->dropColumn('price_change_allowed');
        });
    }
}
