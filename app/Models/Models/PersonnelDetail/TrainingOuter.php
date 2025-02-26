<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingOuter extends Model
{
    use HasFactory;

    protected $table = 'trainingOuter';

    protected $fillable = [
        'personnel_id',
        'traningOuterNo',
        'traningOuterName',
        'traningOuterPeriodFrom',
        'traningOuterPeriodTo',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
