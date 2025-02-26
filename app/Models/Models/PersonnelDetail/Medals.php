<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medals extends Model
{
    use HasFactory;

    protected $table = 'medals';

    protected $fillable = [
        'personnel_id',
        'medalNo',
        'medalName',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
