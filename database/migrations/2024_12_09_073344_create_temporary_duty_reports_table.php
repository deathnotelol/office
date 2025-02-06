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
        Schema::create('temporary_duty_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID who last updated
            $table->string('role_stage'); // Current role handling the record
            $table->boolean('is_completed')->default(false); // Finalization status
        
            // All fields from duty_reports table
            $table->string('reciverName');
            $table->string('reciverNumber');
            $table->string('reciverRank');
            
            $table->string('fromTransferName');
            $table->string('fromTransferNumber');
            $table->string('fromTransferRank');
            
            $table->date('reciveDate');
            
            $table->integer('hasPermanentStaff');
            $table->integer('hasAssociateStaff');
            $table->integer('totalStaff');
            
            $table->integer('attenPermanentStaff');
            $table->integer('attenAssociateStaff');
            $table->integer('attenTotalStaff');
            
            $table->integer('absentPermanentStaff');
            $table->integer('absentAssociateStaff');
            $table->integer('absentTotalStaff');
            
            $table->text('absentReson')->nullable();
            
            $table->integer('inLetter');
            $table->integer('outLetter');
            
            $table->integer('edmsInLetter');
            $table->integer('edmsOutLetter');
            
            $table->integer('gmailInLetter');
            $table->integer('gmailOutLetter');
            
            $table->integer('intMonitoringNewsCount');
            $table->integer('intMonitoringNewsPaperCount');
            
            $table->integer('dailyNewsMM');
            $table->integer('dailyNewsEng');
            $table->integer('drugNews');
            $table->integer('tenderWeb');
            $table->integer('mohaNewsPaper');
            $table->integer('mpfInformation');
            $table->integer('fromDeptFour');
            $table->integer('announcement');
            
            $table->integer('MNPDailyNewsMM');
            $table->integer('MNPDailyNewsEng');
            $table->integer('MNPDrugNews');
            $table->integer('tenderMNP');
            $table->integer('MNPMohaNewPaper');
            $table->integer('MNPMpfInformation');
            $table->integer('MNPFromDeptFour');
            $table->integer('MNPAnnouncement');
            
            $table->text('remarkForNews')->nullable();
            
            $table->text('cctvStatus')->nullable();
            $table->text('rackServerStatus')->nullable();
            
            $table->integer('desktopGood');
            $table->integer('desktopBad');
            $table->integer('laptopGood');
            $table->integer('laptopBad');
            $table->integer('printerGood');
            $table->integer('printerBad');
            $table->integer('copierGood');
            $table->integer('copierBad');
            $table->integer('scannerGood');
            $table->integer('scannerBad');
            
            $table->text('descOfEquipment')->nullable();
            $table->text('deptOtherReport')->nullable();
            $table->text('staffReporting')->nullable();
            $table->text('offDayCheckForStaff')->nullable();
            
            $table->date('transferDate')->nullable();
            
            $table->string('toReciverName')->nullable();
            $table->string('toReciverNumber')->nullable();
            $table->string('toReciverRank')->nullable();
            
            $table->string('transferSignature')->nullable();
            $table->string('transferPersonNumber')->nullable();
            $table->string('transferPersonRank')->nullable();
            $table->string('transferPersonName')->nullable();
            
            $table->string('receiverSignature')->nullable();
            $table->string('receiverPersonNumber')->nullable();
            $table->string('receiverPersonRank')->nullable();
            $table->string('receiverPersonName')->nullable();
            
            //DD Sign and Information
            $table->string('ddSignature')->nullable();
            $table->string('ddNumber')->nullable();
            $table->string('ddRank')->nullable();
            $table->string('ddName')->nullable();

            //Director Sign and Information
            $table->string('directorSignature')->nullable();
            $table->string('directorNumber')->nullable();
            $table->string('directorRank')->nullable();
            $table->string('directorName')->nullable();

            $table->timestamps(); // Includes created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_duty_reports');
    }
};
