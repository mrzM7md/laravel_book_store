<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('book_id');
            $table->unsignedInteger('number_of_copies')->default(0);
            $table->boolean('bought')->default(FALSE);
            $table->timestamps();


            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');


            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('cascade');

            // $table->foreign('book_id')
            //       ->references('id')
            //       ->on('books')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_user');
    }
}
