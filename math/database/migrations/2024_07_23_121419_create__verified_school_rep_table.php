<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('VerifiedSchoolRep', function (Blueprint $table) {
            $table->id();
            $table->string('schoolRegNo');
            $table->string('RepID');
            $table->string('RepEmail');
            $table->string('RepFirstName');
            $table->string('RepLastName');
            $table->string('ImageID');
            $table->string('DOB');
            $table->string('UserName');
            $table->string('Password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolrepresentatives');
    }
};
