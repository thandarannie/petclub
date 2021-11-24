<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetAndOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_and_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner_name');
            $table->string('email')->nullable();
            $table->string('phone_no');
            $table->string('address');
            $table->string('pet_name');
            $table->string('pet_image');
            $table->integer('species_id')->references('id')->on('pet_species')->onDelete('cascade');
            $table->integer('age')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('pet_and_owners');
    }
}
