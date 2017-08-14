<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('no_of_person');
            $table->string('source');
            $table->string('destination');
            $table->dateTime('journey_date');
            $table->integer('contact_no');
            $table->integer('estimate_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wish_packages');
    }
}
