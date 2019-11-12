<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->integer('pages');
            
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->foreign('author_id')
                ->references('id')
                ->on('authors');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
