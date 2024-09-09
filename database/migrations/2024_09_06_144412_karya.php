<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Karya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemilik');
            $table->string('title');
            $table->string('description');
            $table->string('cover_image');
            $table->timestamps();
        
            // Update the table reference to 'users' instead of 'user'
            $table->foreign('pemilik')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
