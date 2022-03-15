<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_homes', function (Blueprint $table) {
            $table->id();
            $table->string('version');
            $table->string('power');
            $table->string('comm_type');
            $table->string('ip_address');
            $table->string('response');
            $table->string('pcu_shord_id')->nullable();
            $table->string('command');
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
        Schema::dropIfExists('call_homes');
    }
}
