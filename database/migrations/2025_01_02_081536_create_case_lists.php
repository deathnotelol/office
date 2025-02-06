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
        Schema::create('case_lists', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('file_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status')->nullable();
            $table->date('inLetterDate')->nullable();
            $table->string('inLetterNumber')->nullable();
            $table->text('inLetterContent')->nullable();

            $table->date('inLetterToDps')->nullable();
            $table->text('inLetterRemark')->nullable();
            $table->date('inLetterReturnDate')->nullable();
            $table->text('dpsRemark')->nullable();
            $table->text('psRemark')->nullable();
            $table->text('dmRemark')->nullable();
            $table->text('umRemark')->nullable();
            $table->date('outLetterDate')->nullable();
            $table->text('outLetterContent')->nullable();
            $table->string('outLetterNumber')->nullable();
            $table->string('toChildDeptName')->nullable();
            $table->date('deadlineDate')->nullable();

            $table->date('fromMPFReturnDate')->nullable();
            $table->string('fromMPFLetterNumber')->nullable();
            $table->text('fromMPFLetterContent')->nullable();

            $table->date('fromGADReturnDate')->nullable();
            $table->string('fromGADLetterNumber')->nullable();
            $table->text('fromGADLetterContent')->nullable();

            $table->date('fromBSIReturnDate')->nullable();
            $table->string('fromBSILetterNumber')->nullable();
            $table->text('fromBSILetterContent')->nullable();

            $table->date('fromPDReturnDate')->nullable();
            $table->string('fromPDLetterNumber')->nullable();
            $table->text('fromPDLetterContent')->nullable();

            $table->date('fromFSDReturnDate')->nullable();
            $table->string('fromFSDLetterNumber')->nullable();
            $table->text('fromFSDLetterContent')->nullable();

            $table->date('processToDps')->nullable();
            $table->date('processReturnDate')->nullable();

            $table->text('processCaseDpsRemark')->nullable();
            $table->text('processCasePsRemark')->nullable();
            $table->text('processCaseDmRemark')->nullable();
            $table->text('processCaseUmRemark')->nullable();

            $table->date('toRelevantDeptOutLetterDate')->nullable();
            $table->string('letterNumberOfRelevantDept')->nullable();
            $table->text('letterContentOfRelevantDept')->nullable();
            $table->string('toRelevantDeptName')->nullable();
            $table->text('otherAction')->nullable();
            $table->date('caseCompletedDate')->nullable();
            $table->string('relatedCaseFile')->nullable();

            $table->timestamps(); // Adds created_at and updated_at
            $table->softDeletes(); // Adds deleted_at for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_lists');
    }
};
