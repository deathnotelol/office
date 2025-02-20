<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'personnel_id',
        'servedNo',
        'servedRank',
        'servedPlace',
        'servedPeriodFrom',
        'servedPeriodTo',
        'servedRemark',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
