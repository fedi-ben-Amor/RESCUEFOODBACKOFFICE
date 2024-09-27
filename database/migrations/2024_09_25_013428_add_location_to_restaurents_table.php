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
        Schema::table('restaurents', function (Blueprint $table) {
            $table->string('address')->nullable(); // New location attribute
            $table->string('city', 100)->nullable(); // New location attribute
            $table->string('state', 100)->nullable(); // New location attribute
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurents', function (Blueprint $table) {
            $table->dropColumn([
                'address',
                'city',
                'state'
            ]);
        });
    }
};
