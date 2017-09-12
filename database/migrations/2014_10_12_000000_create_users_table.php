<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100)->unique();
            $table->string('gender',10);//1 = Male and 0 = Female
            $table->string('password');
            $table->timestamp('dob')->nullable(); //Data of Birth
            $table->string('phone',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('thumnail',255)->nullable();
            $table->integer('status_id_for')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('status_id_for')->references('status_id')->on('tbl_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
