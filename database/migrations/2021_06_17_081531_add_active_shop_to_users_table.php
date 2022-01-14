<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveShopToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('active_shop')->nullable()->after('activated');

//            $table->foreign('active_shop')->references('id')->on('shops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->table('users', function (Blueprint $table) {
//            $table->dropForeign('first_name');
            $table->dropColumn('active_shop');
        });
    }
}
