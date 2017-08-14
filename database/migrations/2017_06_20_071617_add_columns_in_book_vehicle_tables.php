<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInVehicleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_vehicles',function(Blueprint $table){
            $table->string('from');
            $table->string('to');
            $table->string('km');
            $table->integer('contact_no');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_vehicles', function ($table) {
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('km');
            $table->dropColumn('contact_no');
        });
    }
}
