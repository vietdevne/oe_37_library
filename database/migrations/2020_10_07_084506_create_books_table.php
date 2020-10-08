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
        Schema::disableForeignKeyConstraints();
        Schema::create('books', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->autoIncrement();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('pub_id');
            $table->unsignedBigInteger('cate_id');
            $table->string('book_title', 125);
            $table->text('book_image')->nullable();
            $table->text('book_desc');
            $table->integer('unit_price');
            $table->text('book_info')->nullable();
            $table->foreign('author_id')->references('author_id')->on('authors');
            $table->foreign('pub_id')->references('pub_id')->on('publishers');
            $table->foreign('cate_id')->references('cate_id')->on('categories');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('books');
        Schema::enableForeignKeyConstraints();
    }
}
