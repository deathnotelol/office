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
    Schema::table('temporary_duty_reports', function (Blueprint $table) {
        $table->json('data')->nullable(); // Use `json` type to store serialized data
    });
}

public function down()
{
    Schema::table('temporary_duty_reports', function (Blueprint $table) {
        $table->dropColumn('data');
    });
}
};
