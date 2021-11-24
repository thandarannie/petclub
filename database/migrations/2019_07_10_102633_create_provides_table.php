<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->integer('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('service_limit')->nullable();
            $table->integer('currently_used')->nullable();
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
        Schema::dropIfExists('provides');
    }
}
