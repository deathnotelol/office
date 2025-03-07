<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseFile extends Model
{
    protected $fillable = [
        'fileNumber',
        'cabinetName',
        'subDeptName',
        'fileName',
        'fileOpenDate',
    ];

    // public function caseList()
    // {
    //     return $this->belongsTo(CaseList::class, 'file_id', 'id');
    // }

     // Define the relationship to CaseList
     public function caseLists()
     {
         return $this->hasMany(CaseList::class, 'file_id');
     }
}
