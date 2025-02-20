<?php

namespace App\Models\Models\PersonnelDetail;

use App\Models\PersonnelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inheritance extends Model
{
    use HasFactory;

    protected $table = 'inheritance';

    protected $fillable = [
        'personnel_id',
        'inheriNo',
        'inheriName',
        'inheriRelation',
        'inheriAddress',
        'inheriRemark',
    ];

    public function personnel()
    {
        return $this->belongsTo(PersonnelData::class, 'personnel_id');
    }
}
