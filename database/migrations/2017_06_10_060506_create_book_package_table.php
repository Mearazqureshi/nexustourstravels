<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id');
            $table->integer('user_id');
            $table->string('source_city');
            $table->string('departure_city');
            $table->integer('no_of_person');
            $table->integer('contact_no');
            $table->integer('total');
            $table->dateTime('journey_date');
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
        Schema::dropIfExists('book_packages');
    }
}
