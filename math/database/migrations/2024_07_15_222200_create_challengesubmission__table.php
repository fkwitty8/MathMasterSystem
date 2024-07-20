<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challengesubmission', function (Blueprint $table) {
            $table->id();
            $table->string('SubID');
            $table->string('PupilID');
            $table->string('QnID');
            $table->string('QnMarks');
        
            $table->integer('QnTime');
            $table->date('DateSubmitted');
            $table->string('Challenge_FinishedStatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challengesubmission');
    }
}
