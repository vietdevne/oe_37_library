<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('publishers', function (Blueprint $table) {
            $table->unsignedBigInteger('pub_id')->autoIncrement();
            $table->string('pub_name', 125);
            $table->text('pub_logo')->nullable();
            $table->text('pub_desc')->nullable();
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
        Schema::dropIfExists('publishers');
        Schema::enableForeignKeyConstraints();
    }
}
