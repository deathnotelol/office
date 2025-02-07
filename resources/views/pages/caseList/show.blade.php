@include('components.layouts.header')
@include('components.layouts.sidebar')

<head>
    <style>
        /* Hide everything except the content to print */
        @media print {
            body * {
                visibility: hidden;
            }

            #print-section,
            #print-section * {
                visibility: visible;
            }

            #print-section {
                position: absolute;
                top: 1;
                left: 1;
                width: 100%;
            }
        }
    </style>
</head>

<div class="content-body">
    <div class="container-fluid" id="print-section">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2 class="font-weight-bold">{{ $caseList->inLetterContent }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div>
                <p class="p-2" style="font-size: 18px">
                    <strong>အမှုတွဲလက်ရှိအခြေအနေ</strong>
                    @if ($caseList->status == 'Pending')
                        <label class="badge bg-warning mx-3 p-2">{{ $caseList->status }}</label>
                    @elseif($caseList->status == 'Progress')
                        <label class="badge bg-info mx-3 p-2">{{ $caseList->status }}</label>
                    @elseif($caseList->status == 'Completed')
                        <label class="badge bg-success mx-3 p-2">{{ $caseList->status }}</label>
                    @else
                        <label class="badge bg-secondary mx-3 p-2">{{ $caseList->status }}</label>
                    @endif
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၁။&emsp;&emsp;ဝင်စာစတင်သည့်အခြေအနေများ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #b6ddf1">
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဖိုင်အမည် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->caseFile->fileName }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဝင်စာဝင်သည့်နေ့ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->inLetterDate }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            စာအမှတ် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->inLetterNumber }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            စာပေးပို့သည့်ဌာန −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->fromDeptName }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            အကြောင်းအရာ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->inLetterContent }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဝင်စာပါမှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->inLetterRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဒုတိယအမြဲတမ်းအတွင်းဝန် ရုံးအဖွဲ့သို့တင်ပြသည့်နေ့ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->inLetterToDps }} </strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-header">
                <h3 class="font-weight-bold">၂။&emsp;&emsp;ဝင်စာပြန်ကျသည့်အခြေအနေ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #d4f2fa">
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဝင်စာပြန်ကျသည့်နေ့ရက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->inLetterReturnDate }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဒုတိယအမြဲတမ်းအတွင်းဝန် မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->dpsRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            အမြဲတမ်းအတွင်းဝန် မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->psRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဒုတိယဝန်ကြီး မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->dmRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ပြည်ထောင်စုဝန်ကြီး မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->umRemark }} </strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-header">
                <h3 class="font-weight-bold">၃။&emsp;&emsp;ပြန်ကျလာသည့်စာအပေါ် ဆောင်ရွက်ချက်
                    (လက်အောက်ဌာနများသို့စာထွက်ခြင်း (သို့မဟုတ်) မှတ်တမ်းထားရှိခြင်း)</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #c3fbf2">
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            လက်အောက်ဌာနများသို့ စာထွက်သည့်နေ့ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->outLetterDate }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            အကြောင်းအရာ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->outLetterContent }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            စာအမှတ် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->outLetterNumber }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ပေးပို့ဌာန −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>
                                @if (is_array($childDepartments) && !empty($childDepartments))
                                    @foreach ($childDepartments as $dept)
                                        <span class="badge bg-info p-3">{{ $dept }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-secondary">No departments assigned</span>
                                @endif
                            </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            အရောက်တောင်းသည့်နေ့ရက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->deadlineDate }} </strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="pt-3" style="background-color: rgb(232, 247, 173)">
                <div class="row">
                    <div class="col-5">
                        <p class="ml-3" style="font-size: 1.2rem; color: red;">
                            အခြားဆောင်ရွက်ထားရှိမှု −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->otherAction }} </strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-header">
                <h3 class="font-weight-bold">၄။&emsp;&emsp;လက်အောက်ဌာနများမှ ပြန်လည်တင်ပြလာမှုအခြေအနေနှင့်
                    ဆောင်ရွက်ထားရှိမှု</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #9affdd">
                <div>
                    <h4 class="text-primary font-weight-bold">မြန်မာနိုင်ငံရဲတပ်ဖွဲ့</h4>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ရက်စွဲ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromMPFReturnDate }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">စာအမှတ် − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromMPFLetterNumber }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အကြောင်းအရာ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromMPFLetterContent }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body P-0 text-dark text-wrap text-lg" style="background-color: #9affdd">
                <div>
                    <h4 class="text-primary font-weight-bold">အထွေထွေအုပ်ချုပ်ရေးဦးစီးဌာန</h4>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ရက်စွဲ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromGADReturnDate }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">စာအမှတ် − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromGADLetterNumber }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အကြောင်းအရာ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromGADLetterContent }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body P-0 text-dark text-wrap text-lg" style="background-color: #9affdd">
                <div>
                    <h4 class="text-primary font-weight-bold">အထူးစုံစမ်းစစ်ဆေးရေးဦးစီးဌာန</h4>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ရက်စွဲ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromBSIReturnDate }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">စာအမှတ် − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromBSILetterNumber }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အကြောင်းအရာ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromBSILetterContent }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body P-0 text-dark text-wrap text-lg" style="background-color: #9affdd">
                <div>
                    <h4 class="text-primary font-weight-bold">အကျဉ်းဦးစီးဌာန</h4>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ရက်စွဲ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromPDReturnDate }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">စာအမှတ် − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromPDLetterNumber }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အကြောင်းအရာ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromPDLetterContent }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body P-0 text-dark text-wrap text-lg" style="background-color: #9affdd">
                <div>
                    <h4 class="text-primary font-weight-bold">မီးသတ်ဦးစီးဌာန</h4>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ရက်စွဲ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromFSDReturnDate }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">စာအမှတ် − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromFSDLetterNumber }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အကြောင်းအရာ − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->fromFSDLetterContent }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="pt-3" style="background-color: rgb(232, 247, 173)">
                <div class="row">
                    <div class="col-5">
                        <p class="ml-3" style="font-size: 1.2rem; color: red;">အခြားဆောင်ရွက်ထားရှိမှု − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->otherAction }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-header">
                <h3 class="font-weight-bold">၅။&emsp;&emsp;လက်အောက်ဌာနများမှ တင်ပြလာသောစာများအား
                    ဆက်လက်ဆောင်ရွက်ထားရှိမှုအခြေအနေ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #bbf1af">
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            လက်အောက်မှဝင်စာများ စုစည်းတင်ပြသည့်နေ့ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->processToDps }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            တင်ပြသည့်အမှုတွဲတွင် ရေးသားသည့်မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->processCaseRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            တင်ပြခဲ့သည့်အမှုတွဲ ပြန်ကျသည့်နေ့ရက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->processReturnDate }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဒုတိယအမြဲတမ်းအတွင်းဝန် မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->processCaseDpsRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            အမြဲတမ်းအတွင်းဝန် မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->processCasePsRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဒုတိယဝန်ကြီး မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->processCaseDmRemark }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ပြည်ထောင်စုဝန်ကြီး မှတ်ချက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->processCaseUmRemark }} </strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-header">
                <h3 class="font-weight-bold">၆။&emsp;&emsp;ပြန်ကျလာသော အမှုတွဲအား ဆက်လက်ဆောင်ရွက်ထားရှိမှု</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #87d076">
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            သက်ဆိုင်ရာ ဝန်ကြီးဌာန/အဖွဲ့အစည်း၊ တပ်ဖွဲ့/ ဦးစီးဌာနသို့ စာထွက်သည့်နေ့ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->toRelevantDeptOutLetterDate }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ထွက်စာနံပါတ် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->letterNumberOfRelevantDept }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            အကြောင်းအရာ −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->letterContentOfRelevantDept }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            စာပေးပို့သည့်ဌာန −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseList->toRelevantDeptName }} </strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="pt-3" style="background-color: rgb(232, 247, 173)">
                <div class="row">
                    <div class="col-5">
                        <p class="ml-3" style="font-size: 1.2rem; color: red;">အခြားဆောင်ရွက်ထားရှိမှု − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ $caseList->otherAction }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="pt-3" style="background-color: #87d076">
                <div class="row">
                    <div class="col-5">
                        <p class="ml-3" style="font-size: 1.2rem">အမှုတွဲနောက်ဆုံး ပြီးပြတ်သည့်နေ့ရက် − </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> <span class="bg-primary p-2 text-white">
                                    {{ $caseList->caseCompletedDate }}</span></strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p class="ml-3" style="font-size: 1.2rem">အမှုတွဲဖိုင်ကြည့်ရန် − </p>
                    </div>
                    {{-- <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>

                                @if (!empty($relatedCaseFiles))
                                    @foreach ($relatedCaseFiles as $file)
                                        <a href="{{ asset('public/storage/' . $file) }}" target="_blank"
                                            class="badge bg-primary text-white text-decoration-none">
                                            {{ basename($file) }}
                                        </a>
                                    @endforeach
                                @else
                                    <span class="badge bg-secondary">No related case files</span>
                                @endif
                            </strong>
                        </p>
                    </div> --}}
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>
                                @if (!empty($relatedCaseFiles) && is_array($relatedCaseFiles))
                                    @foreach ($relatedCaseFiles as $file)
                                        <a href="{{ asset('public/storage/' . $file) }}" target="_blank" class="d-flex align-items-center text-decoration-none m-1 gap-1">
                                            <img src="{{ asset('public/images/pdf-icon.png') }}" alt="PDF" width="30" height="30" class="me-2">
                                            <span class="badge bg-primary text-white ml-1">{{ basename($file) }}</span>
                                        </a>
                                    @endforeach
                                @else
                                    <span class="badge bg-secondary">No related case files</span>
                                @endif
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-5">
            <a href="{{ route('caseList.index') }}" class="btn btn-primary btn-lg">Back to List</a>
            <button onclick="exportAndPrint()" class="btn btn-success btn-lg">ExportAndPrint</button>
        </div>
    </div>
</div>

<script>
    function exportAndPrint() {
        const content = document.getElementById('print-section').innerHTML;
        const originalContent = document.body.innerHTML;

        // Replace the body content with the section to print
        document.body.innerHTML = content;

        // Trigger the browser's print dialog
        window.print();

        // Restore the original content
        document.body.innerHTML = originalContent;

        // Reinitialize JavaScript after restoring content (if necessary)
        window.location.reload(); // Ensure the page reloads for functionality
    }
</script>
@include('components.layouts.footer')
