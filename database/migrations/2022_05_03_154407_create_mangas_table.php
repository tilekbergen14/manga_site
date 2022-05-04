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
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("author")->nullable();
            $table->string("genres")->nullable();
            $table->string("type")->nullable();
            $table->string("released")->nullable();
            $table->string("status")->nullable();
            $table->string("description")->nullable();
            $table->string("image")->nullable();
            $table->string("images")->nullable();
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
        Schema::dropIfExists('mangas');
    }
};
