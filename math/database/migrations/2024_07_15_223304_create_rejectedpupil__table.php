<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectedpupilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejectedpupil', function (Blueprint $table) {
            
                $table->id();
                $table->string('PupilID');
                $table->string('Password');
                $table->string('Email')->unique();
                $table->string('SchoolRegNo');
                $table->date('DOB');
                $table->string('FirstName');
                $table->string('LastName');
                $table->string('UserName');
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rejectedpupil');
    }
}
