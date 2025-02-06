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
}


