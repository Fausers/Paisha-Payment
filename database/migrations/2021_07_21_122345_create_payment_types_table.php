<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->string('code');
            $table->boolean('enabled')->default(1);
            $table->boolean('quick_payment')->default(1);
            $table->boolean('customer_required')->default(1);
            $table->boolean('change_allowed')->default(0);
            $table->boolean('mark_paid')->default(1);
            $table->boolean('print_receipt')->default(1);
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
        Schema::dropIfExists('payment_types');
    }
}
