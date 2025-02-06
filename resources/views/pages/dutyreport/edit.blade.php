@include('components.layouts.header')
@include('components.layouts.sidebar')

<head>
    <style>
        canvas {
            border: 2px solid #000;
            border-radius: 5px;
            background-color: #f9f9f9;
            /* Light background for better visibility */
            cursor: crosshair;
        }
    </style>
</head>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ e-Government ဌာန တာဝန်မှူး အစီရင်ခံစာ</h2>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('pages.dutyreport.update', $report->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    @if (auth()->user()->hasAnyRole('staff', 'officer', 'deputy-director', 'director', 'super-admin'))
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">၁။ လွှဲပြောင်း/ လက်ခံ ဆောင်ရွက်ခြင်း</h3>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">လက်ခံသူ အမည်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default @error('reciverName') is-invalid @enderror"
                                                    placeholder="လက်ခံသူ အမည်" name="reciverName"
                                                    value="{{ old('reciverName', $report->reciverName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ကိုယ်ပိုင်အမှတ်" name="reciverNumber"
                                                    value="{{ old('reciverNumber', $report->reciverNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရာထူး/ အဆင့်" name="reciverRank"
                                                    value="{{ old('reciverRank', $report->reciverRank) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">လွှဲပြောင်းပေးသူ အမည်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="လွှဲပြောင်းပေးသူ အမည်" name="fromTransferName"
                                                    value="{{ old('fromTransferName', $report->fromTransferName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ကိုယ်ပိုင်အမှတ်" name="fromTransferNumber"
                                                    value="{{ old('fromTransferNumber', $report->fromTransferNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရာထူး/ အဆင့်" name="fromTransferRank"
                                                    value="{{ old('fromTransferRank', $report->fromTransferRank) }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleFormControlSelect1">လွှဲပြောင်းလက်ခံဆောင်ရွက်သည့်
                                                နေ့ရက်</label>
                                            <input name="reciveDate"
                                                class="datepicker-default form-control form-control-lg" id="datepicker"
                                                placeholder="Choice Date"
                                                value="{{ old('reciveDate', $report->reciveDate) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">၂။ e-Government ဌာန
                                    ဝန်ထမ်းများရုံးတက်ရောက်မှုစာရင်း
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="card-title">ရှိရင်းအင်အား</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">သန္ဓေ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="သန္ဓေ" name="hasPermanentStaff"
                                                    value="{{ old('hasPermanentStaff', $report->hasPermanentStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တွဲဖက်" name="hasAssociateStaff"
                                                    value="{{ old('hasAssociateStaff', $report->hasAssociateStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပေါင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပေါင်း" name="totalStaff"
                                                    value="{{ old('totalStaff', $report->totalStaff) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">ရုံးတက်အင်အား</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">သန္ဓေ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="သန္ဓေ" name="attenPermanentStaff"
                                                    value="{{ old('attenPermanentStaff', $report->attenPermanentStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တွဲဖက်" name="attenAssociateStaff"
                                                    value="{{ old('attenAssociateStaff', $report->attenAssociateStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပေါင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပေါင်း" name="attenTotalStaff"
                                                    value="{{ old('attenTotalStaff', $report->attenTotalStaff) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-title">ပျက်ကွက်အင်အား</h2>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">သန္ဓေ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="သန္ဓေ" name="absentPermanentStaff"
                                                    value="{{ old('absentPermanentStaff', $report->absentPermanentStaff) }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တွဲဖက်" name="absentAssociateStaff"
                                                    value="{{ old('absentAssociateStaff', $report->absentAssociateStaff) }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပေါင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပေါင်း" name="absentTotalStaff"
                                                    value="{{ old('absentTotalStaff', $report->absentTotalStaff) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title">ပျက်ကွက်သည့်အကြောာင်းအရာ</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" id="comment" name="absentReson">{{ old('absentReson', $report->absentReson) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၃။ ဝင်စာ/ ထွက်စာများ ပေးပို့/ လက်ခံ
                                    ဆောင်ရွက်မှု
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="card-title">ဝင်စာ/ ထွက်စာ လက်ခံရရှိမှု</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဝင်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဝင်စာ" name="inLetter"
                                                    value="{{ old('inLetter', $report->inLetter) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထွက်စာ" name="outLetter"
                                                    value="{{ old('outLetter', $report->outLetter) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">EDMS ပေးပို့/ လက်ခံ ရရှိမှု</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဝင်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဝင်စာ" name="edmsInLetter"
                                                    value="{{ old('edmsInLetter', $report->edmsInLetter) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထွက်စာ" name="edmsOutLetter"
                                                    value="{{ old('edmsOutLetter', $report->edmsOutLetter) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="card-title">Gmail/ Fax ပေးပို့/ လက်ခံရရှိမှု</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဝင်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဝင်စာ" name="gmailInLetter"
                                                    value="{{ old('gmailInLetter', $report->gmailInLetter) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထွက်စာ" name="gmailOutLetter"
                                                    value="{{ old('gmailOutLetter', $report->gmailOutLetter) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">Internet Monitoring Team</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="သတင်း" name="intMonitoringNewsCount"
                                                    value="{{ old('intMonitoringNewsCount', $report->intMonitoringNewsCount) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရွက်ရေ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရွက်ရေ" name="intMonitoringNewsPaperCount"
                                                    value="{{ old('intMonitoringNewsPaperCount', $report->intMonitoringNewsPaperCount) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၄။ နေ့စဉ်သတင်းလွှင့်တင်မှု</h2>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="card-title">Website တွင် လွှင့်တင်မှု</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">နေ့စဉ်သတင်း(မြန်မာဘာသာ)</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default"
                                                    placeholder="နေ့စဉ်သတင်း(မြန်မာဘာသာ)" name="dailyNewsMM"
                                                    value="{{ old('dailyNewsMM', $report->dailyNewsMM) }}">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="exampleFormControlSelect1">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)" name="dailyNewsEng"
                                                    value="{{ old('dailyNewsEng', $report->dailyNewsEng) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">မူးယစ်သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="မူးယစ်သတင်း" name="drugNews"
                                                    value="{{ old('drugNews', $report->drugNews) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တင်ဒါထုတ်ပြန်ချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တင်ဒါထုတ်ပြန်ချက်" name="tenderWeb"
                                                    value="{{ old('tenderWeb', $report->tenderWeb) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပြည်ထဲရေးသတင်းလွှာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပြည်ထဲရေးသတင်းလွှာ" name="mohaNewsPaper"
                                                    value="{{ old('mohaNewsPaper', $report->mohaNewsPaper) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရဲပြန်ကြား</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရဲပြန်ကြား" name="mpfInformation"
                                                    value="{{ old('mpfInformation', $report->mpfInformation) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဌာန−၄ မှ သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဌာန−၄ မှ သတင်း" name="fromDeptFour"
                                                    value="{{ old('fromDeptFour', $report->fromDeptFour) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထုတ်ပြန်ကြေညာချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထုတ်ပြန်ကြေညာချက်" name="announcement"
                                                    value="{{ old('announcement', $report->announcement) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">Myanmar National Portal တွင် လွှင့်တင်မှု</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">နေ့စဉ်သတင်း(မြန်မာဘာသာ)</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="နေ့စဉ်သတင်း(မြန်မာဘာသာ)" name="MNPDailyNewsMM"
                                                    value="{{ old('MNPDailyNewsMM', $report->MNPDailyNewsMM) }}">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="exampleFormControlSelect1">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)" name="MNPDailyNewsEng"
                                                    value="{{ old('MNPDailyNewsEng', $report->MNPDailyNewsEng) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">မူးယစ်သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="မူးယစ်သတင်း" name="MNPDrugNews"
                                                    value="{{ old('MNPDrugNews', $report->MNPDrugNews) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တင်ဒါထုတ်ပြန်ချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တင်ဒါထုတ်ပြန်ချက်" name="tenderMNP"
                                                    value="{{ old('tenderMNP', $report->tenderMNP) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပြည်ထဲရေးသတင်းလွှာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပြည်ထဲရေးသတင်းလွှာ" name="MNPMohaNewPaper"
                                                    value="{{ old('MNPMohaNewPaper', $report->MNPMohaNewPaper) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရဲပြန်ကြား</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရဲပြန်ကြား" name="MNPMpfInformation"
                                                    value="{{ old('MNPMpfInformation', $report->MNPMpfInformation) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဌာန−၄ မှ သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဌာန−၄ မှ သတင်း" name="MNPFromDeptFour"
                                                value="{{ old('MNPFromDeptFour', $report->MNPFromDeptFour) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထုတ်ပြန်ကြေညာချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထုတ်ပြန်ကြေညာချက်" name="MNPAnnouncement"
                                                    value="{{ old('MNPAnnouncement', $report->MNPAnnouncement) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title">မှတ်ချက်</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" id="comment" name="remarkForNews">{{ old('remarkForNews', $report->remarkForNews) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၅။ CCTV ထူးခြားမှုအခြေအနေ</h2>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" id="comment" name="cctvStatus">{{ old('cctvStatus', $report->cctvStatus) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၆။ e-Government ဌာနရှိ Rack Server
                                    စစ်ဆေးမှုနှင့်
                                    ဝင်ရောက်ရရှိမှု အခြေအနေ</h2>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" id="comment" name="rackServerStatus">{{ old('rackServerStatus', $report->rackServerStatus) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၇။ ဌာနရှိ Computer ၊ Priter နှင့်
                                    အခြားဆက်စပ်ပစ္စည်းများ အခြေအနေ
                                </h2>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-primary">
                                                <tr>
                                                    <th scope="col">စဉ်</th>
                                                    <th scope="col">ပစ္စည်းအမျိုးအမည်</th>
                                                    <th scope="col">ရှိရင်း</th>
                                                    <th scope="col">ကောင်း</th>
                                                    <th scope="col">မကောင်း</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၁။</th>
                                                    <td>Desktop Computer</td>
                                                    <td>၉ လုံး</td>
                                                    <td><input type="number" class="form-control" name="desktopGood"
                                                            value="{{ old('desktopGood', $report->desktopGood) }}">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="desktopBad"
                                                            value="{{ old('desktopBad', $report->desktopBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၂။</th>
                                                    <td>Laptop</td>
                                                    <td>၈ လုံး</td>
                                                    <td><input type="number" class="form-control" name="laptopGood"
                                                        value="{{ old('laptopGood', $report->laptopGood) }}">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="laptopBad"
                                                        value="{{ old('laptopBad', $report->laptopBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၃။</th>
                                                    <td>Printer</td>
                                                    <td>၄ လုံး</td>
                                                    <td><input type="number" class="form-control"
                                                            name="printerGood"
                                                            value="{{ old('printerGood', $report->printerGood) }}">
                                                        </td>
                                                    <td><input type="number" class="form-control" name="printerBad"
                                                        value="{{ old('printerBad', $report->printerBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၄။</th>
                                                    <td>Copier</td>
                                                    <td>၁ လုံး</td>
                                                    <td><input type="number" class="form-control" name="copierGood"
                                                        value="{{ old('copierGood', $report->copierGood) }}">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="copierBad"
                                                        value="{{ old('copierBad', $report->copierBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၅။</th>
                                                    <td>Scanner</td>
                                                    <td>၁ လုံး</td>
                                                    <td><input type="number" class="form-control"
                                                            name="scannerGood"
                                                            value="{{ old('scannerGood', $report->scannerGood) }}"></td>
                                                    <td><input type="number" class="form-control" name="scannerBad"
                                                        value="{{ old('scannerBad', $report->scannerBad) }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-header">
                                        <h2 class="card-title font-weight-bold">
                                            မှတ်ချက်။ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laptop (၈)
                                            လုံးမှာ ဝန်ကြီးခန်းတွင် ASUS (၁) လုံး၊ ဌာနတွင် (၆) လုံးနှင့် ဌာန−၅ မှ Card
                                            Printer
                                            အတွက် အငှား(၁) လုံး၊ စုစုပေါင်း (၈) လုံး ဖြစ်ပါသည်။
                                        </h2>
                                    </div>
                                    <div class="col-12 p-3">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="comment" name="descOfEquipment">{{ old('descOfEquipment', $report->descOfEquipment) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၈။ e-Government ဌာနမှ သီးခြားတင်ပြချက် </h2>
                            </div>
                            <div class="col-12 p-3">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" id="comment" name="deptOtherReport">{{ old('deptOtherReport', $report->deptOtherReport) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၉။ တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ သတင်းပို့တင်ပြချက်
                                    <h2>
                            </div>
                            <div class="col-12 p-3">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" id="comment" name="staffReporting">{{ old('staffReporting', $report->staffReporting) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၁၀။ တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ
                                    အစိုးရရုံးပိတ်ရက်များတွင် နေပြည်တော်ကောင်စီနယ်မြေအတွင်း အခြေပြုနေထိုင်ခြင်း ရှိ/
                                    မရှိ
                                    တင်ပြချက်<h2>
                            </div>
                            <div class="col-12 p-3">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" id="comment" name="offDayCheckForStaff">{{ old('offDayCheckForStaff', $report->offDayCheckForStaff) }}</textarea>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->hasAnyRole('officer', 'super-admin'))    
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">၁၁။ e-Government ဌာန တာဝန်မှူးတာဝန်
                                    လွှဲပြောင်းပေးအပ်ခြင်း </h3>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="exampleFormControlSelect1">တာဝန်မှူးတာဝန် လွှဲပြောင်းပေးသည့်
                                                နေ့ရက်</label>
                                            <input name="transferDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('transferDate', $report->transferDate) }}">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">လက်ခံသူ အမည်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="လက်ခံသူ အမည်" name="toReciverName"
                                                    value="{{ old('toReciverName', $report->toReciverName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ကိုယ်ပိုင်အမှတ်" name="toReciverNumber"
                                                    value="{{ old('toReciverNumber', $report->toReciverNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရာထူး/ အဆင့်" name="toReciverRank"
                                                    value="{{ old('toReciverRank', $report->toReciverRank) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                           
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <!-- Transfer Person Section -->
                                        <div class="col-6">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">တာဝန်မှူးတာဝန် လွှဲပြောင်းပေးသူ
                                                </h3>
                                            </div>
                                            <div class="form-group p-3">
                                                <label for="transferSign">လွှဲပြောင်းပေးသူ လက်မှတ်</label>
                                                <div class="card-body d-flex justify-content-center align-items-center w-50">
                                                    <img src="{{ asset('storage/' . $report->transferSignature) }}" alt="Transfer Signature" class="w-100" width="200px" height="200px">
                                                </div>
                                            </div>
                                            <input type="hidden" name="transferSignature" id="transferSignature" >
                                            <!-- Transfer Person Details -->
                                            <div class="form-group">
                                                <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="transferPerson" name="transferPersonNumber" 
                                                    placeholder="ကိုယ်ပိုင်အမှတ်"
                                                    value="{{ old('transferPersonNumber', $report->transferPersonNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="transferRank">အဆင့်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="transferRank" name="transferPersonRank" 
                                                    placeholder="အဆင့်"
                                                    value="{{ old('transferPersonRank', $report->transferPersonRank) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="transferName">အမည်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="transferName" name="transferPersonName" 
                                                    placeholder="အမည်"
                                                    value="{{ old('transferPersonName', $report->transferPersonName) }}">
                                            </div>
                                        </div>

                                        <!-- Receiver Person Section -->
                                        <div class="col-6">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">တာဝန်မှူးတာဝန် လက်ခံသူ</h3>
                                            </div>
                                            <div class="form-group p-3">
                                                <label for="receiverSign">လက်ခံသူ လက်မှတ်</label>
                                                <div class="card-body d-flex justify-content-center align-items-center w-50">
                                                    <img src="{{ asset('storage/' . $report->receiverSignature) }}" alt="Transfer Signature" class="w-100" width="200px" height="200px">
                                                </div>
                                            </div>
                                            <input type="hidden" name="receiverSignature" id="receiverSignature">
                                           
                                            <!-- Receiver Person Details -->
                                            <div class="form-group">
                                                <label for="receiverPerson">ကိုယ်ပိုင်အမှတ်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="receiverPerson" name="receiverPersonNumber" 
                                                    placeholder="ကိုယ်ပိုင်အမှတ်"
                                                    value="{{ old('receiverPersonNumber', $report->receiverPersonNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="receiverRank">အဆင့်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="receiverRank" name="receiverPersonRank" 
                                                    placeholder="အဆင့်"
                                                    value="{{ old('receiverPersonRank', $report->receiverPersonRank) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="receiverName">အမည်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="receiverName" name="receiverPersonName" 
                                                    placeholder="အမည်"
                                                    value="{{ old('receiverPersonName', $report->receiverPersonName) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if (auth()->user()->hasAnyRole('super-admin'))                        
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">၁၂။ ဒုတိယညွှန်ကြားရေးမှူး မှတ်ချက်<h2>
                            </div>
                            <div class="col-12 p-3">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" id="comment" name="ddRemark" value="{{ old('ddRemark', $report->ddRemark) }}">{{ old('ddRemark', $report->ddRemark) }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group p-3">
                                        <label for="ddSign">လက်မှတ်</label>
                                        <div class="card-body d-flex justify-content-center align-items-center w-50">
                                            <img src="{{ asset('storage/' . $report->ddSignature) }}" alt="Transfer Signature" class="w-100" width="200px" height="200px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group p-3">
                                        <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                        <input class="form-control form-control-lg" type="text" id="transferPerson"
                                            name="ddNumber" required placeholder="ကိုယ်ပိုင်အမှတ်"
                                            value="{{ old('ddNumber', $report->ddNumber) }}">
                                    </div>
                                    <div class="form-group p-3">
                                        <label for="transferRank">အဆင့်</label>
                                        <input class="form-control form-control-lg" type="text" id="transferRank"
                                            name="ddRank" required placeholder="အဆင့်"
                                            value="{{ old('ddRank', $report->ddRank) }}">
                                    </div>
                                    <div class="form-group p-3">
                                        <label for="transferName">အမည်</label>
                                        <input class="form-control form-control-lg" type="text" id="transferName"
                                            name="ddName" required placeholder="အမည်"
                                            value="{{ old('ddName', $report->ddName) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (auth()->user()->hasAnyRole('super-admin')) 
                        <div class="card">
                            <div class="card-header">
                                <h3 class="font-weight-bold">၁၂။ ညွှန်ကြားရေးမှူး မှတ်ချက်<h3>
                            </div>
                            <div class="col-12 p-3">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" id="comment" name="directorRemark"
                                    value="{{ old('directorRemark', $report->directorRemark) }}"> {{ old('directorRemark', $report->directorRemark) }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group p-3">
                                        <label for="ddSign">လက်မှတ်</label>        
                                        <div class="card-body d-flex justify-content-center align-items-center w-50">
                                            <img src="{{ asset('storage/' . $report->directorSignature) }}" alt="Transfer Signature" class="w-100" width="200px" height="200px">
                                        </div>        
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group p-3">
                                        <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                        <input class="form-control form-control-lg" type="text" id="transferPerson"
                                            name="directorNumber" required placeholder="ကိုယ်ပိုင်အမှတ်"
                                            value="{{ old('directorNumber', $report->directorNumber) }}">
                                    </div>
                                    <div class="form-group p-3">
                                        <label for="transferRank">အဆင့်</label>
                                        <input class="form-control form-control-lg" type="text" id="transferRank"
                                            name="directorRank" required placeholder="အဆင့်"
                                            value="{{ old('directorRank', $report->directorRank) }}">
                                    </div>
                                    <div class="form-group p-3">
                                        <label for="transferName">အမည်</label>
                                        <input class="form-control form-control-lg" type="text" id="transferName"
                                            name="directorName" required placeholder="အမည်"
                                            value="{{ old('directorName', $report->directorName) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                    <button class="btn btn-lg btn-success" type="submit">Update Report</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')
