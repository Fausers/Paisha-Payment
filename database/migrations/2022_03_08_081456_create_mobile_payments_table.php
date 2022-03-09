<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_payments', function (Blueprint $table) {
            $table->id();
            $table->string('api_username');
            $table->string('api_password');
            $table->string('service_id');
            $table->string('trans_id');
            $table->dateTime('trans_date');
            $table->bigInteger('trans_timestamp')->default('0')->nullable();
            $table->string('amount');
            $table->string('msnid');
            $table->string('reference_no');
            $table->string('payment_status');
            $table->string('payment_status_desc');
            $table->string('payment_receipt');
            $table->string('opco');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobile_payments');
    }
}
