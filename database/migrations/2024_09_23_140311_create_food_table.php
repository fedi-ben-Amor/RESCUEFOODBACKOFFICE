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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('foodName'); // Column for food name
            $table->foreignId('category_id')->constrained(); // Foreign key relation to Category
            $table->text('description'); // Column for description
            $table->json('ingredients'); // Column for storing ingredients as JSON
            $table->integer('stockTotal'); // Column for stock total
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
        Schema::dropIfExists('food');
    }
};
