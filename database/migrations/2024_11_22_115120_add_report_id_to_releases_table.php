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
        Schema::table('releases', function (Blueprint $table) {
            $table->unsignedBigInteger('report_id'); // Add the new field
    
            // Optionally, you can add a foreign key constraint if needed
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('releases', function (Blueprint $table) {
            $table->dropColumn('report_id'); // Remove the field in case of rollback
    
            // Drop the foreign key constraint if added
            $table->dropForeign(['report_id']);
        });
    }
    
};
