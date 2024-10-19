<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('nameofbanca', 255);
            $table->string('nameofskipper', 255);
            $table->string('age', 255);
            $table->date('birthdate')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('educationalbackground', 255)->nullable();
            $table->string('resident', 255)->nullable();
            $table->string('violation', 255)->nullable();
            $table->string('engine', 255);
            $table->string('engineno', 255);
            $table->string('gridcoordinate', 255);
            $table->string('amount', 255);
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
        Schema::dropIfExists('reports');
    }
}
