<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('callback_id')->unsigned();
            $table->text('from');
            $table->text('to');
            $table->text('channel');
            $table->text('timeUTC');
            $table->text('transaction_id');
            $table->text('media')->nullable();
            $table->longText('billing');
            $table->longText('message');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('callback_id')->references('id')->on('callbacks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inboxes');
    }
}
