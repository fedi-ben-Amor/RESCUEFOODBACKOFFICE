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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurent_id'); // Foreign key
            $table->unsignedBigInteger('user_id'); 
            $table->text('comment'); // Review comment
            $table->date('date'); // Review date
            $table->integer('rating')->unsigned(); // Rating value (e.g., 1-5)
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Set up foreign key constraint
            $table->foreign('restaurent_id')
                ->references('id')
                ->on('restaurents')
                ->onDelete('cascade'); // Optional: Cascades delete when a restaurant is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
