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
    Schema::create('turnover_receipts', function (Blueprint $table) {
        $table->id();
        $table->string('municipal_agriculturist');
        $table->date('date_of_violation');
        $table->time('time_of_violation');
        $table->string('name_of_violation');
        $table->string('name_of_skipper');
        $table->string('name_of_banca');
        $table->string('investigator_pnco');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnover_receipts');
    }
};
