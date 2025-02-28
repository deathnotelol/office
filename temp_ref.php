<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseList extends Model
{
    protected $fillable = [
        'file_id', //အမှုတွဲဖိုင် ID
        'user_id',
        'status', //အမှုတွဲ၏ လက်ရှိအခြေအနေ
        'inLetterDate', //ဝင်စာပါ ရက်စွဲ
        'inLetterNumber', //စာအမှတ်
        'inLetterContent', //အကြောင်းအရာ
        //ဆောင်ရွက်ထားရှိမှု
        'inLetterToDps', //ဝင်စာတင်သည့်ရက်
        'inLetterRemark', //ဝင်စာတင်ပြရာတွင် ရေးသားသည့် မှတ်ချက်
        'inLetterReturnDate', //ဝင်စာပြန်ကျသည့်နေရက်
        'dpsRemark', //DPS မှတ်ချက်
        'psRemark', //PS မှတ်ချက်
        'dmRemark', //DM မှတ်ချက်
        'umRemark', //UM မှတ်ချက်
        'outLetterDate',  //လက်အောက်ဌာနသို့ စာထွက်သည့်နေရက်
        'outLetterContent', //အကြောင်းအရာ
        'outLetterNumber', //စာအမှတ်
        'toChildDeptName',  //ထွက်စာပေးပို့သည့် လက်အောက်ဌာန
        'deadlineDate', //လက်အောက်မှပြန်လည်တင်ပြရမည့်နေရက် 


        //ဆောင်ရွက်ပြီးစီးမှု
        'fromMPFReturnDate', //နရခ မှ ပြန်လည်တင်ပြသည့်နေ့ရက်
        'fromMPFLetterNumber',  //စာအမှတ်
        'fromMPFLetterContent', //အကြောင်းအရာ

        'fromGADReturnDate',    //အထဥ
        'fromGADLetterNumber',  
        'fromGADLetterContent',

        'fromBSIReturnDate', //စစစ
        'fromBSILetterNumber',  
        'fromBSILetterContent',

        'fromPDReturnDate', //အကစ
        'fromPDLetterNumber',  
        'fromPDLetterContent',

        'fromFSDReturnDate', //မသဥ
        'fromFSDLetterNumber',  
        'fromFSDLetterContent',


        'processToDps', //လက်အောက်မှဝင်စာများ စုစည်းတင်ပြသည့်နေ့ရက်       
        'processReturnDate', //တင်ပြခဲ့သည့်အမှုတွဲ ပြန်ကျသည့်နေရက်  
        
        'processCaseDpsRemark',
        'processCasePsRemark',
        'processCaseDmRemark',
        'processCaseUmRemark',

        'toRelevantDeptOutLetterDate', //သက်ဆိုင်ရာ ဌာန/အဖွဲ့အစည်းသို့ စာထွက်သည့်နေ့ရက်        
        'letterNumberOfRelevantDept', //သက်ဆိုင်ရာ ဌာန/အဖွဲ့အစည်းသို့ ထွက်သည့် စာအမှတ်       
        'letterContentOfRelevantDept',//သက်ဆိုင်ရာ ဌာန/အဖွဲ့အစည်းသို့ ထွက်သည့် စာပါအကြောင်းအရာ         
        'toRelevantDeptName',  //ပေးပို့သည့် သက်ဆိုင်ရာ ဌာန/ အဖွဲ့အစည်းအမည်          
        'otherAction',  //အခြားသီးခြား ဆောင်ရွက်မှု (ဥပမာ − မှတ်တမ်းထားရှိခြင်း)   
        'caseCompletedDate', //အမှုတွဲ နောက်ဆုံးပြီးပြတ်သည့်နေ့ရက်
        'relatedCaseFile', //Scan ပြုလုပ်ထားသည့် အမှုတွဲဖိုင်များ သိမ်းရန်
    ];

    public $personnelData = [

        //အခြေခံအချက်အလက်

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

        //တပ်မတော်သား(သို့မဟုတ်) အခြားဝန်ကြီးဌာန/ အဖွဲ့အစည်းမှ ကူးပြောင်းလာပါက
        'srcNo[]', //စဉ်
        'personalNo[]', //ကိုယ်ပိုင်အမှတ်
        'cadetTrainingNo[]', //ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်
        'outOfReason[]', //တပ်ထွက်သည့်အကြောင်းအရာ
        'servedArmies[]', //တာဝန်ထမ်းဆောင်ခဲ့သည့်တပ်များ
        'caseAndPunishment[]', //ပြစ်မှု/ပြစ်ဒဏ်(ရှိလျှင်)

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

        //အမွေစား/ အမွေခံ
        'inheriNo[]', //စဉ်
        'inheriName[]', //အမည်
        'inheriRelation[]', // တော်စပ်ပုံ
        'inheriAddress[]', //နေရပ်လိပ်စာ
        'inheriRemark[]', //မှတ်ချက်

        //သား/ သမီး
        'childNo[]', //စဉ်
        'childName[]', //အမည်
        'childDob[]', //မွေးသက္ကရာဇ် 
        'childAge[]', //အသက်
        'childOccupation[]', //အလုပ်အကိုင်
        'childAddress[]', //နေရပ်လိပ်စာ

        //ဘွဲထူး/ဂုဏ်ထူး/တံဆပ်
        'medalNo[]', //စဉ်
        'medalName[]', //ဘွဲထူး/ဂုဏ်ထူး/တံဆပ်

        //ပြစ်မှု/ ပြစ်ဒဏ်မှတ်တမ်း
        'crimeNo[]', //စဉ်
        'crimeName[]', //ပြစ်မှု
        'punishment[]', //ပြစ်ဒဏ်
        'crimeDate[]', //ရက်စွဲ
        'crimeRemark[]', //မှတ်ချက်

        //တာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (ပြည်ထဲရေးဝန်ကြီးဌာန)
        'servedNo[]', //စဉ်
        'servedRank[]', //အဆင့်
        'servedPlace[]', //တပ်ဖွဲ့/ဒေသ
        'servedPeriodFrom[]', //ကာလ (မှ)
        'servedPeriodTo[]', //ကာလ (ထိ)
        'servedRemark[]', //မှတ်ချက်

        //ပြည်တွင်းသင်တန်းတက်ရောက်မှု
        'traningInterNo[]', //စဉ်
        'traningInterName[]', //တက်ရောက်ခဲ့သည့်သင်တန်းများ
        'traningInterPeriodFrom[]', //ကာလ (မှ)
        'traningInterPeriodTo[]', //ကာလ (ထိ)

         //ပြည်ပသင်တန်းတက်ရောက်မှု
         'traningOuterNo[]', //စဉ်
         'traningOuterName[]', //တက်ရောက်ခဲ့သည့်သင်တန်းများ
         'traningOuterPeriodFrom[]', //ကာလ (မှ)
         'traningOuterPeriodTo[]', //ကာလ (ထိ)

         //လက်မှတ်
         'personnelSign', //လက်မှတ်
         'signDate', //ရက်စွဲ
         'signID', //ကိုယ်ပိုင်အမှတ်
         'signRank',//အဆင့်
         'signName', //အမည်

         //Month
         
         'ဇန်နဝါရီ',
         'ဖေဖော်ဝါရီ',
         'မတ်',
         'ဧ့ပြီ',
         'မေ',
         'ဇွန်',
         'ဇူလိုင်',
         'သြ့ဂုတ်',
         'စက်တင်ဘာ',
         'အောက်တိုဘာ',
         'နိုဝင်ဘာ',
         'ဒီဇင်ဘာ',

    ];
}










