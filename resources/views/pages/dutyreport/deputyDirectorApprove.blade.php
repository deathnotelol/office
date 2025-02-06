@include('components.layouts.header')
@include('components.layouts.sidebar')

<div class="content-body">
    <div class="container-fluid">
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
                    ၁။&emsp;&emsp;<strong>{{ $temporaryReports->reciverName }}</strong> ၊ ကိုယ်ပိုင်အမှတ်၊
                    {{ $temporaryReports->reciverNumber }}၊ ရာထူး/ အဆင့် {{ $temporaryReports->reciverRank }} သည်
                    e-Government ဌာန တာဝန်မှူး
                    တာဝန်ဝတ္တရားများကို <strong>{{ $temporaryReports->fromTransferName }}</strong>၊ ကိုယ်ပိုင်အမှတ်၊
                    {{ $temporaryReports->fromTransferNumber }}၊ ရာထူး/အဆင့် {{ $temporaryReports->fromTransferRank }}
                    ထံမှ
                    {{ $temporaryReports->reciveDate }} ရက်နေ့ ၀၉၀၀ နာရီတွင် လွှဲပြောင်း/ လက်ခံရရှိခဲ့ပါသည်။
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၂။&emsp;&emsp;ဝန်ထမ်းများ ရုံးတက်ရောက်မှုစာရင်း</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;သန္ဓေ <u><strong>{{ $temporaryReports->hasPermanentStaff }}</strong></u> ဦး၊ တွဲဖက်
                    <u><strong>{{ $temporaryReports->hasAssociateStaff }}</strong></u> ဦး၊ ပေါင်း
                    <u><strong>{{ $temporaryReports->totalStaff }}</strong></u> ဦး ရှိရာ ရုံးတက်အင်အားစာရင်းမှာ သန္ဓေ
                    <u><strong>{{ $temporaryReports->attenPermanentStaff }}</strong></u> ဦး၊ တွဲဖက်
                    <u><strong>{{ $temporaryReports->attenAssociateStaff }}</strong></u> ဦး၊ ပေါင်း
                    <u><strong>{{ $temporaryReports->attenTotalStaff }}</strong></u> ဦး ဖြစ်ပါသည်။ ပျက်ကွက်မှုစာရင်းမှာ
                    သန္ဓေ
                    <u><strong>{{ $temporaryReports->absentPermanentStaff }}</strong></u> ဦး၊ တွဲဖက်
                    <u><strong>{{ $temporaryReports->absentAssociateStaff }}</strong></u> ဦး၊ ပေါင်း
                    <u><strong>{{ $temporaryReports->absentTotalStaff }}</strong></u> ဦး ဖြစ်ပါသည်။
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၃။&emsp;&emsp;ပျက်ကွက်သည့်အကြောင်းအရာ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $temporaryReports->absentReson }}
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
                            <td style="font-size: 1rem">{{ $temporaryReports->inLetter }}</td>
                            <td style="font-size: 1rem">{{ $temporaryReports->outLetter }}</td>
                            <td style="font-size: 1rem">{{ $temporaryReports->edmsInLetter }}</td>
                            <td style="font-size: 1rem">{{ $temporaryReports->edmsOutLetter }}</td>
                            <td style="font-size: 1rem">{{ $temporaryReports->gmailInLetter }}</td>
                            <td style="font-size: 1rem">{{ $temporaryReports->gmailOutLetter }}</td>
                        </tr>
                    </tbody>
                </table>
                <p style="font-size: 1.2rem">
                    <strong>&emsp;&emsp;Internet Monitoring Team မှ သတင်း (
                        {{ $temporaryReports->intMonitoringNewsCount }} )
                        ပုဒ်၊ ( {{ $temporaryReports->intMonitoringNewsPaperCount }} ) ရွက်အား ဌာန(၄)သို့
                        ပေးပို့ထားရှိပါသည်။
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
                                    <th style="font-size: 1rem">{{ $temporaryReports->dailyNewsMM }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၂)</th>
                                    <th style="font-size: 1rem">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->dailyNewsEng }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၃)</th>
                                    <th style="font-size: 1rem">မူးယစ်သတင်း</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->drugNews }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၄)</th>
                                    <th style="font-size: 1rem">တင်ဒါထုတ်ပြန်ချက်</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->tenderWeb }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၅)</th>
                                    <th style="font-size: 1rem">ပြည်ထဲရေးသတင်းလွှာ</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->mohaNewsPaper }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၆)</th>
                                    <th style="font-size: 1rem">ရဲပြန်ကြား</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->mpfInformation }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၇)</th>
                                    <th style="font-size: 1rem">ဌာန−၄ မှ သတင်း</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->fromDeptFour }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၈)</th>
                                    <th style="font-size: 1rem">ထုတ်ပြန်ကြေညာချက်</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->announcement }}</th>
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
                                    <th style="font-size: 1rem">{{ $temporaryReports->MNPDailyNewsMM }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၂)</th>
                                    <th style="font-size: 1rem">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->MNPDailyNewsEng }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၃)</th>
                                    <th style="font-size: 1rem">မူးယစ်သတင်း</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->MNPDrugNews }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၄)</th>
                                    <th style="font-size: 1rem">တင်ဒါထုတ်ပြန်ချက်</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->tenderMNP }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၅)</th>
                                    <th style="font-size: 1rem">ပြည်ထဲရေးသတင်းလွှာ</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->MNPMohaNewPaper }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၆)</th>
                                    <th style="font-size: 1rem">ရဲပြန်ကြား</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->MNPMpfInformation }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၇)</th>
                                    <th style="font-size: 1rem">ဌာန−၄ မှ သတင်း</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->MNPFromDeptFour }}</th>
                                </tr>
                                <tr class="text-dark text-lg">
                                    <th style="font-size: 1rem">(၈)</th>
                                    <th style="font-size: 1rem">ထုတ်ပြန်ကြေညာချက်</th>
                                    <th style="font-size: 1rem">{{ $temporaryReports->MNPAnnouncement }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    <strong>မှတ်ချက်။</strong>&emsp;&emsp;{{ $temporaryReports->remarkForNews }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၆။&emsp;&emsp;CCTV ထူးခြာမှု အခြေအနေ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $temporaryReports->cctvStatus }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၇။&emsp;&emsp;e-Government ဌာနရှိ Rack Server စစ်ဆေးမှုနှင့်
                    ဝင်ရောက်ရရှိမှု အခြေအနေ</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $temporaryReports->rackServerStatus }}
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
                                <td>{{ $temporaryReports->desktopGood }}</td>
                                <td>{{ $temporaryReports->desktopBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၂။</th>
                                <td>Laptop</td>
                                <td>၈ လုံး</td>
                                <td>{{ $temporaryReports->laptopGood }}</td>
                                <td>{{ $temporaryReports->laptopBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၃။</th>
                                <td>Printer</td>
                                <td>၄ လုံး</td>
                                <td>{{ $temporaryReports->printerGood }}</td>
                                <td>{{ $temporaryReports->printerBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၄။</th>
                                <td>Copier</td>
                                <td>၁ လုံး</td>
                                <td>{{ $temporaryReports->copierGood }}</td>
                                <td>{{ $temporaryReports->copierBad }}</td>
                            </tr>
                            <tr class="font-weight-bold text-dark">
                                <th>၅။</th>
                                <td>Scanner</td>
                                <td>၁ လုံး</td>
                                <td>{{ $temporaryReports->scannerGood }}</td>
                                <td>{{ $temporaryReports->scannerBad }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-body text-dark text-wrap text-lg">
                        <p style="font-size: 1.2rem">
                            &emsp;&emsp;Laptop (၈) လုံးမှာ ဝန်ကြီးခန်းတွင် ASUS (၁) လုံး၊ ဌာနတွင် (၆) လုံးနှင့် ဌာန−၅ မှ
                            Card Printer အတွက် အငှား (၁) လုံး၊ စုစုပေါင်း (၈) လုံး ဖြစ်ပါသည်။
                        </p>
                        <p style="font-size: 1.2rem">
                            <strong>&emsp;&emsp;{{ $temporaryReports->descOfEquipment }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၉။&emsp;&emsp;e-Government ဌာနမှ သီးခြားတင်ပြချက်</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $temporaryReports->deptOtherReport }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၁၀။&emsp;&emsp;တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ သတင်းပို့တင်ပြချက်</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $temporaryReports->staffReporting }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၁၁။&emsp;&emsp;တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ အစိုးရရုံးပိတ်ရက်များတွင်
                    နေပြည်တော်ကောင်စီနယ်မြေအတွင်း အခြေပြုနေထိုင်ခြင်း ရှိ/ မရှိ တင်ပြချက်</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;{{ $temporaryReports->offDayCheckForStaff }}
                </p>
            </div>
            <div class="card-header">
                <h3 class="font-weight-bold">၁၂။&emsp;&emsp;e-Government ဌာန တာဝန်မှူးတာဝန် လွှဲပြောင်းပေးအပ်ခြင်း</h3>
            </div>
            <div class="card-body text-dark text-wrap text-lg">
                <p style="font-size: 1.2rem">
                    &emsp;&emsp;<strong>{{ $temporaryReports->transferDate }}</strong> ရက်နေ့ ၀၉၀၀ နာရီတွင်
                    တာဝန်မှူးလုပ်ငန်းတာဝန်များအား <strong>{{ $temporaryReports->toReciverName }}</strong> ၊
                    ကိုယ်ပိုင်အမှတ်၊
                    <strong>{{ $temporaryReports->toReciverNumber }}</strong> ၊ ရာထူး/အဆင့်
                    <strong>{{ $temporaryReports->toReciverRank }}</strong> ထံ စနစ်တကျလွှဲပြောင်း ပေးအပ်ခဲ့ပါသည်။
                </p>
            </div>


            <div class="row">
                <!-- Transfer Signature Section -->
                <div class="col-6">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <h3 class="font-weight-bold">တာဝန်မှူးတာဝန်လွှဲပြောင်းပေးသူ</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <img src="{{ asset('public/storage/' . $temporaryReports->transferSignature )}}" alt="Signature" class="w-100">
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
                                    {{ $temporaryReports->transferPersonNumber }}
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
                                    {{ $temporaryReports->transferPersonRank }}
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
                                    {{ $temporaryReports->transferPersonName }}
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
                        <img src="{{ asset('public/storage/' . $temporaryReports->receiverSignature )}}" alt="Signature" class="w-100">
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
                                    {{ $temporaryReports->receiverPersonNumber }}
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
                                    {{ $temporaryReports->receiverPersonRank }}
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
                                    {{ $temporaryReports->receiverPersonName }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--DD Remark Section -->
        @if (auth()->user()->hasAnyRole(['deputy-director']))
            <form action="{{ route('temporary-duty-report.updateDeputyDirectorApprove', $temporaryReports->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title font-weight-bold">၁၂။ ဒုတိယညွှန်ကြားရေးမှူး မှတ်ချက်<h2>
                    </div>
                    <div class="col-12 p-3">
                        <div class="form-group">
                            <textarea class="form-control" rows="6" id="comment" name="ddRemark" value="{{ old('ddRemark', $temporaryReports->ddRemark) }}">{{ old('ddRemark', $temporaryReports->ddRemark) }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group p-3">
                                <label for="ddSign">လက်မှတ်</label>

                                @php
                                    // Fetch the user's existing signature if available
                                $signature = auth()
                                            ->user()
                                            ->signatures()
                                            ->first();
                                @endphp

                                <div>
                                    <!-- Canvas for displaying or capturing signature -->
                                    <canvas id="ddSign" class="border w-100" width="300"
                                        height="200"></canvas>
                                    <button type="button" class="btn btn-primary btn-sm mt-2"
                                        onclick="clearCanvas('ddSign')">Clear</button>
                                </div>

                                <!-- Hidden input to store the signature data -->
                                <input type="hidden" name="ddSignature" id="ddSignature" value="">

                                @if ($signature)
                                    <!-- Pass existing signature URL to JavaScript -->
                                    <script>
                                        window.onload = function() {
                                            const signatureCanvas = document.getElementById('ddSign');
                                            const signatureContext = signatureCanvas.getContext('2d');
                                            const existingSignature = "{{ asset('public/storage/' . $signature->image_path) }}";

                                            const image = new Image();
                                            image.onload = function() {
                                                signatureContext.drawImage(image, 0, 0, signatureCanvas.width, signatureCanvas.height);
                                            };
                                            image.src = existingSignature;
                                        };
                                    </script>
                                @endif
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group p-3">
                                <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                <input class="form-control form-control-lg" type="text" id="transferPerson"
                                    name="ddNumber" required placeholder="ကိုယ်ပိုင်အမှတ်"
                                    value="{{ old('ddNumber', $temporaryReports->ddNumber) }}">
                            </div>
                            <div class="form-group p-3">
                                <label for="transferRank">အဆင့်</label>
                                <input class="form-control form-control-lg" type="text" id="transferRank"
                                    name="ddRank" required placeholder="အဆင့်"
                                    value="{{ old('ddRank', $temporaryReports->ddRank) }}">
                            </div>
                            <div class="form-group p-3">
                                <label for="transferName">အမည်</label>
                                <input class="form-control form-control-lg" type="text" id="transferName"
                                    name="ddName" required placeholder="အမည်"
                                    value="{{ old('ddName', $temporaryReports->ddName) }}">
                            </div>
                        </div>
                    </div>
                </div>
              <button class="btn btn-lg btn-success" type="submit">Approve Report</button>
            </form>
        @endif
    </div>
</div>
<script>

    function clearCanvas(canvasId) {
        const canvas = document.getElementById(canvasId);
        const context = canvas.getContext('2d');
        context.clearRect(0, 0, canvas.width, canvas.height);
        document.getElementById('ddSignature').value = ''; // Clear hidden input
    }

    // Capture the canvas data as a Base64 image
    function saveSignature(canvasId) {
        const canvas = document.getElementById(canvasId);
        const signatureDataUrl = canvas.toDataURL('image/png');
        document.getElementById('ddSignature').value = signatureDataUrl;
    }

    // Optionally call saveSignature before form submission
    document.querySelector('form').addEventListener('submit', function() {
        saveSignature('ddSign');
    });
</script>
@include('components.layouts.footer')
