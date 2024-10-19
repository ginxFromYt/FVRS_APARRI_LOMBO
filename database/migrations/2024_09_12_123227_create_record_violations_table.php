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
        Schema::table('record_violations', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'middle_name', 'last_name', 'extension_name', 'sex', 'address']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('record_violations', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('extension_name')->nullable();
            $table->string('sex');
            $table->string('address');
        });
    }
};
