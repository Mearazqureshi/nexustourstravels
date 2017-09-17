<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndPaymentStatusInBookPackageYable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_packages',function(Blueprint $table){
            $table->enum('status',['1','2'])->default('1')->comment('1:Pending; 2:Complate;');
            $table->enum('payment_status',['1','2','3'])->default('1')->comment('1:Offline; 2:Half;3:Full');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_packages', function ($table) {
            $table->dropColumn('status');
            $table->dropColumn('payment_status');
        });
    }
}
