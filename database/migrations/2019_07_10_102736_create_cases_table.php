<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->integer('pet_id')->references('id')->on('pet_and_owners')->onDelete('cascade');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('closed');
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
        Schema::dropIfExists('cases');
    }
}
