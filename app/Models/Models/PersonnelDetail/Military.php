<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Military extends Model
{
    use HasFactory;

    protected $table = 'military';

    protected $fillable = [
        'personnel_id',
        'srcNo',
        'personalNo',
        'cadetTrainingNo',
        'outOfReason',
        'servedArmies',
        'caseAndPunishment',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
