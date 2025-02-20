<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crimes extends Model
{
    use HasFactory;

    protected $table = 'crimes';

    protected $fillable = [
        'personnel_id',
        'crimeNo',
        'crimeName',
        'punishment',
        'crimeDate',
        'crimeRemark',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
