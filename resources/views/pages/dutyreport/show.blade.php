@include('components.layouts.header')
@include('components.layouts.sidebar')

<head>
    <style>
        /* Hide everything except the content to print */
        @media print {
            body * {
                visibility: hidden;
            }
            #print-section, #print-section * {
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
                    <h2 class="font-weight-bold">ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ e-Government ဌာန တာဝန်မှူး အစီရင်ခံစာ
                    </h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    ၁။&emsp;&emsp;<strong>{{ $report->reciverName }}</strong> ၊ ကိုယ်ပိုင်အမှတ်၊
                    {{ $report->reciverNumber }}၊ ရာထူး/ အဆင့် {{ $report->reciverRank }} သည် e-Government ဌာန တာဝန်မှူး
                    တာဝန်ဝတ္တရားများကို <strong>{{ $report->fromTransferName }}</strong>၊ ကိုယ်ပိုင်အမှတ်၊
                    {{ $report->fromTransferNumber }}၊ ရာထူး/အဆင့် {{ $report->fromTransferRank }} ထံမှ
                    {{ $report->reciveDate }} ရက်နေ့ ၀၉၀၀ နာရီတွင် လွှဲပြောင်း/ လက်ခံရရှိခဲ့ပါသည်။
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၂။&emsp;&emsp;ဝန်ထမ်းများ ရုံးတက်ရောက်မှုစာရင်း</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;သန္ဓေ <u><strong>{{ $report->hasPermanentStaff }}</strong></u> ဦး၊ တွဲဖက်
                    <u><strong>{{ $report->hasAssociateStaff }}</strong></u> ဦး၊ ပေါင်း
                    <u><strong>{{ $report->totalStaff }}</strong></u> ဦး ရှိရာ ရုံးတက်အင်အားစာရင်းမှာ သန္ဓေ
                    <u><strong>{{ $report->attenPermanentStaff }}</strong></u> ဦး၊ တွဲဖက်
                    <u><strong>{{ $report->attenAssociateStaff }}</strong></u> ဦး၊ ပေါင်း
                    <u><strong>{{ $report->attenTotalStaff }}</strong></u> ဦး ဖြစ်ပါသည်။ ပျက်ကွက်မှုစာရင်းမှာ သန္ဓေ
                    <u><strong>{{ $report->absentPermanentStaff }}</strong></u> ဦး၊ တွဲဖက်
                    <u><strong>{{ $report->absentAssociateStaff }}</strong></u> ဦး၊ ပေါင်း
                    <u><strong>{{ $report->absentTotalStaff }}</strong></u> ဦး ဖြစ်ပါသည်။
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၃။&emsp;&emsp;ပျက်ကွက်သည့်အကြောင်းအရာ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $report->absentReson }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၄။&emsp;&emsp;ဝင်စာ/ ထွက်စာများ ပေးပို့/ လက်ခံ ဆောင်ရွက်မှု</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <table class="table table-bordered table-hover text-wrap text-center">
                    <thead class="thead-primary">
                        <tr>
                            <th colspan="2" style="font-size: 1.2rem">ဝင်စာ/ထွက်စာ လက်ခံရရှိမှု</th>
                            <th colspan="2" style="font-size: 1.2rem">EDMS ပေးပို့/ လက်ခံ ရရှိ</th>
                            <th colspan="2" style="font-size: 1.2rem">Gmail/Fax ပေးပို့/လက်ခံ ရရှိမှု</th>
                        </tr>
                        <tr>
                            <th style="font-size: 1.2rem">ဝင်စာ</th>
                            <th style="font-size: 1.2rem">ထွက်စာ</th>
                            <th style="font-size: 1.2rem">ဝင်စာ</th>
                            <th style="font-size: 1.2rem">ထွက်စာ</th>
                            <th style="font-size: 1.2rem">ဝင်စာ</th>
                            <th style="font-size: 1.2rem">ထွက်စာ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-dark text-lg">
                            <td style="font-size: 1rem">{{ $report->inLetter }}</td>
                            <td style="font-size: 1rem">{{ $report->outLetter }}</td>
                            <td style="font-size: 1rem">{{ $report->edmsInLetter }}</td>
                            <td style="font-size: 1rem">{{ $report->edmsOutLetter }}</td>
                            <td style="font-size: 1rem">{{ $report->gmailInLetter }}</td>
                            <td style="font-size: 1rem">{{ $report->gmailOutLetter }}</td>
                        </tr>
                    </tbody>
                </table>
                <p style="font-size: 1.2rem">
                    <strong>&emsp;&emsp;Internet Monitoring Team မှ သတင်း ( {{ $report->intMonitoringNewsCount }} )
                        ပုဒ်၊ ( {{ $report->intMonitoringNewsPaperCount }} ) ရွက်အား ဌာန(၄)သို့ ပေးပို့ထားရှိပါသည်။
                    </strong>
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၅။&emsp;&emsp;နေ့စဉ်သတင်းလွှင့်တင်မှု</h3>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="card-body text-dark text-wrap text-lg">
                            <p style="font-size: 1.2rem">
                                (က)&emsp;&emsp;Website တွင်လွှင့်တင်မှု
                            </p>
                            <table class="table table-hover text-wrap text-left">
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၁)</th>
                                    <th style="font-size: 1rem">နေ့စဉ်သတင်း(မြန်မာဘာသာ)</th>
                                    <th style="font-size: 1rem">{{ $report->dailyNewsMM }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၂)</th>
                                    <th style="font-size: 1rem">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</th>
                                    <th style="font-size: 1rem">{{ $report->dailyNewsEng }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၃)</th>
                                    <th style="font-size: 1rem">မူးယစ်သတင်း</th>
                                    <th style="font-size: 1rem">{{ $report->drugNews }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၄)</th>
                                    <th style="font-size: 1rem">တင်ဒါထုတ်ပြန်ချက်</th>
                                    <th style="font-size: 1rem">{{ $report->tenderWeb }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၅)</th>
                                    <th style="font-size: 1rem">ပြည်ထဲရေးသတင်းလွှာ</th>
                                    <th style="font-size: 1rem">{{ $report->mohaNewsPaper }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၆)</th>
                                    <th style="font-size: 1rem">ရဲပြန်ကြား</th>
                                    <th style="font-size: 1rem">{{ $report->mpfInformation }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၇)</th>
                                    <th style="font-size: 1rem">ဌာန−၄ မှ သတင်း</th>
                                    <th style="font-size: 1rem">{{ $report->fromDeptFour }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၈)</th>
                                    <th style="font-size: 1rem">ထုတ်ပြန်ကြေညာချက်</th>
                                    <th style="font-size: 1rem">{{ $report->announcement }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="card-body text-dark text-wrap text-lg">
                            <p style="font-size: 1.2rem">
                                (ခ)&emsp;&emsp;Myanmar National Portal တွင်လွှင့်တင်မှု
                            </p>
                            <table class="table table-hover text-wrap text-left">
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၁)</th>
                                    <th style="font-size: 1rem">နေ့စဉ်သတင်း(မြန်မာဘာသာ)</th>
                                    <th style="font-size: 1rem">{{ $report->MNPDailyNewsMM }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၂)</th>
                                    <th style="font-size: 1rem">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</th>
                                    <th style="font-size: 1rem">{{ $report->MNPDailyNewsEng }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၃)</th>
                                    <th style="font-size: 1rem">မူးယစ်သတင်း</th>
                                    <th style="font-size: 1rem">{{ $report->MNPDrugNews }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၄)</th>
                                    <th style="font-size: 1rem">တင်ဒါထုတ်ပြန်ချက်</th>
                                    <th style="font-size: 1rem">{{ $report->tenderMNP }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၅)</th>
                                    <th style="font-size: 1rem">ပြည်ထဲရေးသတင်းလွှာ</th>
                                    <th style="font-size: 1rem">{{ $report->MNPMohaNewPaper }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၆)</th>
                                    <th style="font-size: 1rem">ရဲပြန်ကြား</th>
                                    <th style="font-size: 1rem">{{ $report->MNPMpfInformation }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၇)</th>
                                    <th style="font-size: 1rem">ဌာန−၄ မှ သတင်း</th>
                                    <th style="font-size: 1rem">{{ $report->MNPFromDeptFour }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၈)</th>
                                    <th style="font-size: 1rem">ထုတ်ပြန်ကြေညာချက်</th>
                                    <th style="font-size: 1rem">{{ $report->MNPAnnouncement }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    <strong>မှတ်ချက်။</strong>&emsp;&emsp;{{ $report->remarkForNews }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၆။&emsp;&emsp;CCTV ထူးခြာမှု အခြေအနေ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $report->cctvStatus }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၇။&emsp;&emsp;e-Government ဌာနရှိ Rack Server စစ်ဆေးမှုနှင့်
                    ဝင်ရောက်ရရှိမှု အခြေအနေ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $report->rackServerStatus }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၈။&emsp;&emsp;ဌာနရှိ Computer၊ Printer နှင့် အခြားစက်ပစ္စည်းများ အခြေအနေ
                </h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th style="font-size: 1.1rem" scope="col">စဉ်</th>
                                <th style="font-size: 1.1rem" scope="col">ပစ္စည်းအမျိုးအမည်</th>
                                <th style="font-size: 1.1rem" scope="col">ရှိရင်း</th>
                                <th style="font-size: 1.1rem" scope="col">ကောင်း</th>
                                <th style="font-size: 1.1rem" scope="col">မကောင်း</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="font-weight-bold text-dark">
                                <th>၁။</th>
                                <td>Desktop Computer</td>
                                <td>၉ လုံး</td>
                                <td>{{ $report->desktopGood }}</td>
                                <td>{{ $report->desktopBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၂။</th>
                                <td>Laptop</td>
                                <td>၈ လုံး</td>
                                <td>{{ $report->laptopGood }}</td>
                                <td>{{ $report->laptopBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၃။</th>
                                <td>Printer</td>
                                <td>၄ လုံး</td>
                                <td>{{ $report->printerGood }}</td>
                                <td>{{ $report->printerBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၄။</th>
                                <td>Copier</td>
                                <td>၁ လုံး</td>
                                <td>{{ $report->copierGood }}</td>
                                <td>{{ $report->copierBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၅။</th>
                                <td>Scanner</td>
                                <td>၁ လုံး</td>
                                <td>{{ $report->scannerGood }}</td>
                                <td>{{ $report->scannerBad }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-body text-dark text-wrap text-lg">
                        <p style="font-size: 1.2rem">
                            &emsp;&emsp;Laptop (၈) လုံးမှာ ဝန်ကြီးခန်းတွင် ASUS (၁) လုံး၊ ဌာနတွင် (၆) လုံးနှင့် ဌာန−၅ မှ
                            Card Printer အတွက် အငှား (၁) လုံး၊ စုစုပေါင်း (၈) လုံး ဖြစ်ပါသည်။
                        </p>
                        <p style="font-size: 1.2rem">
                            <strong>&emsp;&emsp;{{ $report->descOfEquipment }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၉။&emsp;&emsp;e-Government ဌာနမှ သီးခြားတင်ပြချက်</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $report->deptOtherReport }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၁၀။&emsp;&emsp;တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ သတင်းပို့တင်ပြချက်</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $report->staffReporting }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၁၁။&emsp;&emsp;တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ အစိုးရရုံးပိတ်ရက်များတွင်
                    နေပြည်တော်ကောင်စီနယ်မြေအတွင်း အခြေပြုနေထိုင်ခြင်း ရှိ/ မရှိ တင်ပြချက်</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $report->offDayCheckForStaff }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၁၂။&emsp;&emsp;e-Government ဌာန တာဝန်မှူးတာဝန် လွှဲပြောင်းပေးအပ်ခြင်း</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;<strong>{{ $report->transferDate }}</strong> ရက်နေ့ ၀၉၀၀ နာရီတွင်
                    တာဝန်မှူးလုပ်ငန်းတာဝန်များအား <strong>{{ $report->toReciverName }}</strong> ၊ ကိုယ်ပိုင်အမှတ်၊
                    <strong>{{ $report->toReciverNumber }}</strong> ၊ ရာထူး/အဆင့်
                    <strong>{{ $report->toReciverRank }}</strong> ထံ စနစ်တကျလွှဲပြောင်း ပေးအပ်ခဲ့ပါသည်။
                </p>
            </div>


            <div class="row">
                <!-- Transfer Signature Section -->
                <div class="col-6">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <h3 class="font-weight-bold">တာဝန်မှူးတာဝန်လွှဲပြောင်းပေးသူ</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <img src="{{ asset('public/storage/' . $report->transferSignature) }}" alt="Transfer Signature"
                            style="width: 200px; height: 200px;">
                    </div>
                    <div class="card-body text-dark text-wrap text-lg">
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    ကိုယ်ပိုင်အမှတ်၊
                                </p>
                            </div>
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    {{ $report->transferPersonNumber }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    အဆင့်၊
                                </p>
                            </div>
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    {{ $report->transferPersonRank }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    အမည်၊
                                </p>
                            </div>
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    {{ $report->transferPersonName }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Receiver Signature Section -->
                <div class="col-6">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <h3 class="font-weight-bold">တာဝန်မှူးတာဝန်လက်ခံသူ</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <img src="{{ asset('public/storage/' . $report->receiverSignature) }}" alt="Receiver Signature"
                            style="width: 200px; height: 200px;">
                    </div>
                    <div class="card-body text-dark text-wrap text-lg">
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    ကိုယ်ပိုင်အမှတ်၊
                                </p>
                            </div>
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    {{ $report->receiverPersonNumber }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    အဆင့်၊
                                </p>
                            </div>
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    {{ $report->receiverPersonRank }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    အမည်၊
                                </p>
                            </div>
                            <div class="col-6">
                                <p style="font-size: 1.2rem">
                                    {{ $report->receiverPersonName }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DD Section --}}
            <div class="card-header">
                <h3 class="font-weight-bold">၁၃။&emsp;&emsp;ဒုတိယညွှန်ကြားရေးမှူး မှတ်ချက်</h3>
            </div>
            <div class="row">
                <!-- Transfer Signature Section -->
                <div class="col-12">
                    <div class="card-body d-flex justify-content-left align-items-left">
                        <p>{{ $report->ddRemark }}</p>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center w-50">
                        <img src="{{ asset('public/storage/' . $report->ddSignature) }}" alt="Transfer Signature"
                            class="w-100" width="200px" height="200px">
                    </div>
                    <div class="card-body text-dark text-wrap text-lg">
                        <div class="row">
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    ကိုယ်ပိုင်အမှတ်၊
                                </p>
                            </div>
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    {{ $report->ddNumber }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    အဆင့်၊
                                </p>
                            </div>
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    {{ $report->ddRank }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    အမည်၊
                                </p>
                            </div>
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    {{ $report->ddName }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Director Section --}}
            <div class="card-header">
                <h3 class="font-weight-bold">၁၄။&emsp;&emsp;ညွှန်ကြားရေးမှူး မှတ်ချက်</h3>
            </div>
            <div class="row">
                <!-- Transfer Signature Section -->
                <div class="col-12">
                    <div class="card-body d-flex justify-content-left align-items-left">
                        <p>{{ $report->directorRemark }}</p>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center w-50">
                        <img src="{{ asset('public/storage/' . $report->directorSignature) }}" alt="Transfer Signature"
                            class="w-100" width="200px" height="200px">
                    </div>
                    <div class="card-body text-dark text-wrap text-lg">
                        <div class="row">
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    ကိုယ်ပိုင်အမှတ်၊
                                </p>
                            </div>
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    {{ $report->directorNumber }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    အဆင့်၊
                                </p>
                            </div>
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    {{ $report->directorRank }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    အမည်၊
                                </p>
                            </div>
                            <div class="col-3">
                                <p style="font-size: 1.2rem">
                                    {{ $report->directorName }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="d-flex justify-content-between mb-5">
            <a href="{{ route('pages.dutyreport.index') }}" class="btn btn-primary btn-lg">Back to List</a>
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
