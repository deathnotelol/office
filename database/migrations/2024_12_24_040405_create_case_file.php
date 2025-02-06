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
        Schema::create('case_files', function (Blueprint $table) {
            $table->id(); // Primary key (id)
            $table->string('fileNumber')->unique(); // Unique file number
            $table->string('cabinetName'); // Cabinet name
            $table->string('subDeptName'); // Sub-department name
            $table->string('fileName'); // File name
            $table->date('fileOpenDate'); // File open date
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_file');
    }
};

