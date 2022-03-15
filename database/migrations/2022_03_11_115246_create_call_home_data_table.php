<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallHomeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_home_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('call_home_id')->unsigned()->index();
            $table->integer('real_time');
            $table->integer('total_uptime');
            $table->integer('session_uptime');
            $table->integer('v_panel');
            $table->integer('v_out');
            $table->integer('isns');
            $table->integer('carrier');
            $table->integer('lac');
            $table->integer('ci');
            $table->integer('rssi');
            $table->integer('ber');
            $table->string('lat_long')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('call_home_id')->references('id')->on('call_homes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_home_data');
    }
}
