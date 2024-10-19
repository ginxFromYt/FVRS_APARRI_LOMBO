<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('record_violations', function (Blueprint $table) {
            $table->id();
            $table->string('violation');
            $table->string('location');
            $table->string('date_of_violation');
            $table->string('time_of_violation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('record_violations');
    }
};
