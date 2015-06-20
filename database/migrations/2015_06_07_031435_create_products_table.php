<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('proCategoryId')->unsigned();
            $table->string('proTitle');
            $table->string('proName');
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
        Schema::drop('products');
    }
}
