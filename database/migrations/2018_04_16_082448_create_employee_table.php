<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->unsignedInteger('uId');
            $table->foreign('uId')->references('id')->on('users');
            $table->string('last_name');
            $table->string('image');
            $table->string('job_title');
            $table->string('location');
            $table->enum('status', array('active', 'notActive'));
            
        
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
        Schema::dropIfExists('employee');
    }
}
