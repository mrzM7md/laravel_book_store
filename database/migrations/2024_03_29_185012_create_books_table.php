<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('category_id')->nullable();
            // $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->tinyInteger('best_seller')->unsigned()->default(0);
            $table->string('slug')->unique();
            $table->string('isbn')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('publish_year')->nullable();
            $table->unsignedInteger('number_of_pages')->nullable();
            $table->unsignedInteger('number_of_copies')->default(0);
            $table->decimal('price', 8, 2)->nullable();
            $table->string('cover_image');
            $table->timestamps();

            $table->foreignId('currency_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            
            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('set null');
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
