<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyReport extends Model
{
    use HasFactory;
    protected $table = 'duty_reports';
    protected $fillable = [
        'user_id',
        'role_stage',
        'is_completed',
        'transfer_user_id',
        'receiver_user_id',
        'reciverName',
        'reciverNumber',
        'reciverRank',
        'fromTransferName',
        'fromTransferNumber',
        'fromTransferRank',
        'reciveDate',
        'hasPermanentStaff',
        'hasAssociateStaff',
        'totalStaff',
        'attenPermanentStaff',
        'attenAssociateStaff',
        'attenTotalStaff',
        'absentPermanentStaff',
        'absentAssociateStaff',
        'absentTotalStaff',
        'absentReson',
        'inLetter',
        'outLetter',
        'edmsInLetter',
        'edmsOutLetter',
        'gmailInLetter',
        'gmailOutLetter',
        'intMonitoringNewsCount',
        'intMonitoringNewsPaperCount',
        'dailyNewsMM',
        'dailyNewsEng',
        'drugNews',
        'tenderWeb',
        'mohaNewsPaper',
        'mpfInformation',
        'fromDeptFour',
        'announcement',
        'MNPDailyNewsMM',
        'MNPDailyNewsEng',
        'MNPDrugNews',
        'tenderMNP',
        'MNPMohaNewPaper',
        'MNPMpfInformation',
        'MNPFromDeptFour',
        'MNPAnnouncement',
        'remarkForNews',
        'cctvStatus',
        'rackServerStatus',
        'desktopGood',
        'desktopBad',
        'laptopGood',
        'laptopBad',
        'printerGood',
        'printerBad',
        'copierGood',
        'copierBad',
        'scannerGood',
        'scannerBad',
        'descOfEquipment',
        'deptOtherReport',
        'staffReporting',
        'offDayCheckForStaff',
        'transferDate',
        'toReciverName',
        'toReciverNumber',
        'toReciverRank',
        'transferSignature',
        'transferPersonNumber',
        'transferPersonRank',
        'transferPersonName',
        'receiverSignature',
        'receiverPersonNumber',
        'receiverPersonRank',
        'receiverPersonName',
        'ddRemark',
        'ddSignature',
        'ddNumber',
        'ddRank',
        'ddName',
        'directorRemark',
        'directorSignature',
        'directorNumber',
        'directorRank',
        'directorName'
    ];
}
