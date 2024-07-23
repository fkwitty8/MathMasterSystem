<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qnans', function (Blueprint $table) {

                $table->id();
                $table->string('QnID');
                $table->string('Qn');
                $table->string('AnsID');
                $table->string('Ans');
                $table->integer('Marks');
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
        Schema::dropIfExists('qnans');
    }
}
