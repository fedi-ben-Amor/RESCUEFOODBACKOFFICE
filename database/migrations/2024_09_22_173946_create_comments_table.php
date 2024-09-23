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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // ID du commentaire
            $table->foreignId('blog_id')->constrained()->onDelete('cascade'); // Liaison avec le blog
            $table->text('content'); // Contenu du commentaire
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Liaison avec l'utilisateur (facultatif)
            $table->timestamps(); // Timestamps pour created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
