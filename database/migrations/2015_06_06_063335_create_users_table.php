<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('useEmail')->unique();
            $table->string('useFirstName');
            $table->string('useLastName');
            $table->string('usePassword');
            $table->integer('useVipNumber');
            $table->date('useDOB');
            $table->date('useDateJoined');
            $table->string('useAddress');
            $table->string('useCity');
            $table->string('usePostalCode');
            $table->string('useState');
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
        Schema::drop('users');
    }
}
