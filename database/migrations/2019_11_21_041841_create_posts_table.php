<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            // Con nullable() especificamos que el campo puede ser nulo
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            // Con default especificamos el valor por defecto de una columna
            $table->boolean('published')->default(false);
            $table->boolean('featured')->default(false);
            // Relación con categorías
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            // Relación con usuarios
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            // Timestamps
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
        Schema::dropIfExists('posts');
    }
}
