<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Children extends Model
{
    use HasFactory;

    protected $table = 'children';

    protected $fillable = [
        'personnel_id',
        'childNo',
        'childName',
        'childDob',
        'childAge',
        'childOccupation',
        'childAddress',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
