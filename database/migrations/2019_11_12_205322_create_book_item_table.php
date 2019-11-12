<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('state_id');
            $table->timestamps();
            
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_item');
    }
}
