<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_provides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('case_id')->references('id')->on('cases')->onDelete('cascade');
            $table->integer('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->integer('unit')->nullable();
            $table->integer('cost_per_unit');
            $table->integer('price_charged')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('service_provides');
    }
}
