<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseList extends Model
{
    protected $fillable = [
        'file_id',
        'user_id',
        'status',
        'inLetterDate',
        'inLetterNumber',
        'inLetterContent',

        'inLetterToDps',
        'inLetterRemark',
        'inLetterReturnDate',
        'dpsRemark',
        'psRemark',
        'dmRemark',
        'umRemark',
        'outLetterDate',
        'outLetterContent',
        'outLetterNumber',
        'toChildDeptName',
        'deadlineDate',



        'fromMPFReturnDate',
        'fromMPFLetterNumber',
        'fromMPFLetterContent',

        'fromGADReturnDate',
        'fromGADLetterNumber',
        'fromGADLetterContent',

        'fromBSIReturnDate',
        'fromBSILetterNumber',
        'fromBSILetterContent',

        'fromPDReturnDate',
        'fromPDLetterNumber',
        'fromPDLetterContent',

        'fromFSDReturnDate',
        'fromFSDLetterNumber',
        'fromFSDLetterContent',


        'processToDps',
        'processReturnDate',

        'processCaseDpsRemark',
        'processCasePsRemark',
        'processCaseDmRemark',
        'processCaseUmRemark',

        'toRelevantDeptOutLetterDate',
        'letterNumberOfRelevantDept',
        'letterContentOfRelevantDept',
        'toRelevantDeptName',
        'otherAction',
        'caseCompletedDate',
        'relatedCaseFile',
    ];

    /**
     * Relationship to User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Relationship to CaseFile model.
     */
    public function caseFile()
    {
        return $this->belongsTo(CaseFile::class, 'file_id');
    }
}
