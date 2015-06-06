<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function(Blueprint $table) {
            $table->increments('id');
            $table->string('proTitle');
            $table->string('proAuthor');
            $table->date('proPublishDate');
            $table->string('proPublisher');
            $table->decimal('proPrice');
            $table->string('proDescription');
            $table->string('proImagePath');
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
        Schema::drop('product');
    }
}
