<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the franchise
            $table->string('location'); // Location of the franchise
            $table->string('manager_name'); // Name of the manager
            $table->string('contact_number')->nullable(); // Contact number
            $table->string('email')->nullable(); // Contact email
            $table->unsignedBigInteger('restaurant_id')->default(1); // restaurant_id with a default value
            $table->timestamps();

            // You can comment out the foreign key constraint for now
            // $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('franchises');
    }
};
