<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePW extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PWs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->text('Text');
            $table->string('author');
            $table->string('Picfile')->nullable();
            $table->timestamp('creation_date')->nullable();
            $table->timestamp('last_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PWs');
    }
}
