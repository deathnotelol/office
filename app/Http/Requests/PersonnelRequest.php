<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules()
    {
        $rules = [
            'personnelId' => 'required|string',
            'personnelRank' => 'required|string',
            'personnelName' => 'required|string',
            'getRankDate' => 'nullable|date',
            'currentDuty' => 'nullable|string',
            'currentDept' => 'nullable|string',
            'deptArrivelDate' => 'nullable|date',
            'nation' => 'nullable|string',
            'religion' => 'nullable|string',
            'nationalId' => 'nullable|string',
            'gazettedDate' => 'nullable|date',
            'education' => 'nullable|string',
            'dateOfBirth' => 'nullable|date',
            'fatherNameAndNationAndReligion' => 'nullable|string',
            'motherNameAndNationAndReligion' => 'nullable|string',
            'candidateOfficerTraining' => 'nullable|string',
            'previousOccupation' => 'nullable|string',
            'height' => 'nullable|string',
            'dateOfEnlistment' => 'nullable|date',
            'maritalStatus' => 'nullable|string',

            // Wife Information
            'wifeName' => 'nullable|string',
            'wifeNationAndReligion' => 'nullable|string',
            'wifeDobAndPlace' => 'nullable|string',
            'wifeNRCNo' => 'nullable|string',
            'wifeEducation' => 'nullable|string',
            'wifeOccupation' => 'nullable|string',
            'wifeFatherName' => 'nullable|string',
            'fatherNationAdnReligion' => 'nullable|string',
            'wifeMotherName' => 'nullable|string',
            'motherNationAdnReligion' => 'nullable|string',

            // Signature Information
            'personnelSign' => 'nullable|string',
            'signDate' => 'nullable|date',
            'signID' => 'nullable|string',
            'signRank' => 'nullable|string',
            'signName' => 'nullable|string',


            // Personnel Details Validation
            'srcNo' => 'nullable|string',
            'personalNo' => 'nullable|string',
            'cadetTrainingNo' => 'nullable|string',
            'outOfReason' => 'nullable|string',
            'servedArmies' => 'nullable|string',
            'caseAndPunishment' => 'nullable|string',

            // Inheritance Information
            'inheriNo' => 'nullable|string',
            'inheriName' => 'nullable|string',
            'inheriRelation' => 'nullable|string',
            'inheriAddress' => 'nullable|string',
            'inheriRemark' => 'nullable|string',

            // Children Information
            'childNo' => 'nullable|string',
            'childName' => 'nullable|string',
            'childDob' => 'nullable|date',
            'childAge' => 'nullable|string',
            'childOccupation' => 'nullable|string',
            'childAddress' => 'nullable|string',

            // Medals and Awards
            'medalNo' => 'nullable|string',
            'medalName' => 'nullable|string',

            // Crime Records
            'crimeNo' => 'nullable|string',
            'crimeName' => 'nullable|string',
            'punishment' => 'nullable|string',
            'crimeDate' => 'nullable|date',
            'crimeRemark' => 'nullable|string',

            // Service Records (Police)
            'servedNo' => 'nullable|string',
            'servedRank' => 'nullable|string',
            'servedPlace' => 'nullable|string',
            'servedPeriodFrom' => 'nullable|date',
            'servedPeriodTo' => 'nullable|date',
            'servedRemark' => 'nullable|string',

            // Domestic Training
            'traningInterNo' => 'nullable|string',
            'traningInterName' => 'nullable|string',
            'traningInterPeriodFrom' => 'nullable|date',
            'traningInterPeriodTo' => 'nullable|date',

            // Foreign Training
            'traningOuterNo' => 'nullable|string',
            'traningOuterName' => 'nullable|string',
            'traningOuterPeriodFrom' => 'nullable|date',
            'traningOuterPeriodTo' => 'nullable|date',
        ];

        return $rules;
    }
}
