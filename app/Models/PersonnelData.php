<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Models\PersonnelDetail\Crimes;
use App\Models\Models\PersonnelDetail\Medals;
use App\Models\Models\PersonnelDetail\Children;
use App\Models\Models\PersonnelDetail\Military;
use App\Models\Models\PersonnelDetail\Services;
use App\Models\Models\PersonnelDetail\Inheritance;
use App\Models\Models\PersonnelDetail\TrainingInter;
use App\Models\Models\PersonnelDetail\TrainingOuter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonnelData extends Model
{
    use HasFactory;

    protected $table = 'personnel_data';
     protected $guarded = [];

    protected $fillable = [
        'personnelId', //ကိုယ်ပိုင်အမှတ်
        'personnelRank', //အဆင့်
        'personnelName', //အမည်
        'getRankDate', //အဆင့်ရရက်စွဲ
        'currentDuty', //လက်ရှိတာဝန်
        'currentDept', //လက်ရှိတပ်ဖွဲ့/ ဌာန
        'deptArrivelDate', //တပ်ဖွဲ့/ဌာနရောက်ရက်စွဲ
        'nation', //လူမျိုး
        'religion', //ဘာသာ
        'nationalId', //နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်
        'gazettedDate', // ပြန်တမ်းဝင်ရက်စွဲ
        'education', //ပညာအရည်အချင်း
        'dateOfBirth', //မွေးသက္ကရာဇ်
        'fatherNameAndNationAndReligion', //အဘအမည် (လူမျိုး/ဘာသာ)
        'motherNameAndNationAndReligion', //အမိအမည် (လူမျိုး/ဘာသာ)
        'candidateOfficerTraining', //အရာရှိလောင်းသင်တန်း
        'previousOccupation', //ယခင်အလုပ်အကိုင်
        'height', //အရပ်အမြင့်
        'dateOfEnlistment', //တပ်ဝင်ရက်စွဲ
        'maritalStatus', //အိမ်ထောင်ရှိ/ မရှိ
        'profileImage', //ဓာတ်ပုံ

         //ဇနီးဆိုင်ရာအချက်အလက်
         'wifeimage', //ဓာတ်ပုံ
         'wifeName', //အမည်
         'wifeNationAndReligion', //လူမျိုး/ဘာသာ
         'wifeDobAndPlace', //မွေးသက္ကရာဇ်နှင့် ဇာတိ
         'wifeNRCNo',  //နိုင်ငံသားစိစစ်ရေးကတ်
         'wifeEducation', //ပညာအရည်အချင်း
         'wifeOccupation', //အလုပ်အကိုင်
         'wifeFatherName', //အဘအမည်
         'fatherNationAdnReligion', // လူမျိုး/ ဘာသာ
         'wifeMotherName', //အမိအမည်
         'motherNationAdnReligion', //လူမျိုး/ဘာသာ

          //လက်မှတ်
          'personnelSign', //လက်မှတ်
          'signDate', //ရက်စွဲ
          'signID', //ကိုယ်ပိုင်အမှတ်
          'signRank',//အဆင့်
          'signName' //အမည်

    ];

     public function military()
    {
        return $this->hasMany(Military::class, 'personnel_id');
    }

    public function inheritance()
    {
        return $this->hasMany(Inheritance::class, 'personnel_id');
    }

    public function children()
    {
        return $this->hasMany(Children::class, 'personnel_id');
    }

    public function medals()
    {
        return $this->hasMany(Medals::class, 'personnel_id');
    }

    public function crimes()
    {
        return $this->hasMany(Crimes::class, 'personnel_id');
    }

    public function services()
    {
        return $this->hasMany(Services::class, 'personnel_id');
    }

    public function trainingInter()
    {
        return $this->hasMany(TrainingInter::class, 'personnel_id');
    }

    public function trainingOuter()
    {
        return $this->hasMany(TrainingOuter::class, 'personnel_id');
    }
}
