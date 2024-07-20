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
        Schema::create('unverified_schoolrepresentatives', function (Blueprint $table) {
            $table->id();
            $table->string('RepID');
            $table->string('RepEmail');
            $table->string('SchoolRegistrationNumber');
            $table->string('RepFirstName');
            $table->string('RepLastName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unverified_schoolrepresentatives');
    }
};
