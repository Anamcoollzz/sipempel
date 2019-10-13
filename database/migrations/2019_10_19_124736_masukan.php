<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Masukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masukan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('isi');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('masukan');
    }
}
