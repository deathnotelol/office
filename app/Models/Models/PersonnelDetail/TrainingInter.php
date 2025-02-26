<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingInter extends Model
{
    use HasFactory;

    protected $table = 'trainingInter';

    protected $fillable = [
        'personnel_id',
        'traningInterNo',
        'traningInterName',
        'traningInterPeriodFrom',
        'traningInterPeriodTo',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
