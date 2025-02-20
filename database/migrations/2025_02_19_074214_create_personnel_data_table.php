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
        Schema::create('personnel_data', function (Blueprint $table) {
            $table->id();
            $table->string('personnelId')->unique();
            $table->string('personnelRank');
            $table->string('personnelName');
            $table->date('getRankDate')->nullable();
            $table->string('currentDuty')->nullable();
            $table->string('currentDept')->nullable();
            $table->date('deptArrivelDate')->nullable();
            $table->string('nation')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationalId')->unique();
            $table->date('gazettedDate')->nullable();
            $table->string('education')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('fatherNameAndNationAndReligion')->nullable();
            $table->string('motherNameAndNationAndReligion')->nullable();
            $table->string('candidateOfficerTraining')->nullable();
            $table->string('previousOccupation')->nullable();
            $table->string('height')->nullable();
            $table->date('dateOfEnlistment')->nullable();
            $table->string('maritalStatus')->nullable();

            // Spouse Information
            $table->string('wifeName')->nullable();
            $table->string('wifeNationAndReligion')->nullable();
            $table->string('wifeDobAndPlace')->nullable();
            $table->string('wifeNRCNo')->nullable();
            $table->string('wifeEducation')->nullable();
            $table->string('wifeOccupation')->nullable();
            $table->string('wifeFatherName')->nullable();
            $table->string('fatherNationAdnReligion')->nullable();
            $table->string('wifeMotherName')->nullable();
            $table->string('motherNationAdnReligion')->nullable();

            // Signature
            $table->string('personnelSign')->nullable();
            $table->date('signDate')->nullable();
            $table->string('signID')->nullable();
            $table->string('signRank')->nullable();
            $table->string('signName')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_data');
    }
};
