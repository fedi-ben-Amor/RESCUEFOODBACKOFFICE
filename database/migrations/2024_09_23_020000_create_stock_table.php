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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('franchise_id'); // Foreign key for Franchise
            $table->unsignedBigInteger('food_id')->default(1); // Default value for food_id, no foreign key constraint
            $table->integer('quantity'); // Quantity of the stock item
            $table->date('expiration_date')->nullable(); // Expiration date of the stock item, if applicable
            $table->timestamps();

            // Foreign key constraint for franchise_id
            $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
