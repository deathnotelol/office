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
                <form action="{{ route('temporary-duty-report.updateTransfer', $temporaryReports->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    @if (auth()->user()->hasAnyRole('officer', 'super-admin'))
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
                                                    value="{{ old('reciverName', $temporaryReports->reciverName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ကိုယ်ပိုင်အမှတ်" name="reciverNumber"
                                                    value="{{ old('reciverNumber', $temporaryReports->reciverNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရာထူး/ အဆင့်" name="reciverRank"
                                                    value="{{ old('reciverRank', $temporaryReports->reciverRank) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">လွှဲပြောင်းပေးသူ အမည်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="လွှဲပြောင်းပေးသူ အမည်" name="fromTransferName"
                                                    value="{{ old('fromTransferName', $temporaryReports->fromTransferName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ကိုယ်ပိုင်အမှတ်" name="fromTransferNumber"
                                                    value="{{ old('fromTransferNumber', $temporaryReports->fromTransferNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရာထူး/ အဆင့်" name="fromTransferRank"
                                                    value="{{ old('fromTransferRank', $temporaryReports->fromTransferRank) }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleFormControlSelect1">လွှဲပြောင်းလက်ခံဆောင်ရွက်သည့်
                                                နေ့ရက်</label>
                                            <input name="reciveDate"
                                                class="datepicker-default form-control form-control-lg" id="datepicker"
                                                placeholder="Choice Date"
                                                value="{{ old('reciveDate', $temporaryReports->reciveDate) }}">
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
                                                    value="{{ old('hasPermanentStaff', $temporaryReports->hasPermanentStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တွဲဖက်" name="hasAssociateStaff"
                                                    value="{{ old('hasAssociateStaff', $temporaryReports->hasAssociateStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပေါင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပေါင်း" name="totalStaff"
                                                    value="{{ old('totalStaff', $temporaryReports->totalStaff) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">ရုံးတက်အင်အား</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">သန္ဓေ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="သန္ဓေ" name="attenPermanentStaff"
                                                    value="{{ old('attenPermanentStaff', $temporaryReports->attenPermanentStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တွဲဖက်" name="attenAssociateStaff"
                                                    value="{{ old('attenAssociateStaff', $temporaryReports->attenAssociateStaff) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပေါင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပေါင်း" name="attenTotalStaff"
                                                    value="{{ old('attenTotalStaff', $temporaryReports->attenTotalStaff) }}">
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
                                                    value="{{ old('absentPermanentStaff', $temporaryReports->absentPermanentStaff) }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တွဲဖက်" name="absentAssociateStaff"
                                                    value="{{ old('absentAssociateStaff', $temporaryReports->absentAssociateStaff) }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပေါင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပေါင်း" name="absentTotalStaff"
                                                    value="{{ old('absentTotalStaff', $temporaryReports->absentTotalStaff) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title">ပျက်ကွက်သည့်အကြောာင်းအရာ</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" id="comment" name="absentReson">{{ old('absentReson', $temporaryReports->absentReson) }}</textarea>
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
                                                    value="{{ old('inLetter', $temporaryReports->inLetter) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထွက်စာ" name="outLetter"
                                                    value="{{ old('outLetter', $temporaryReports->outLetter) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">EDMS ပေးပို့/ လက်ခံ ရရှိမှု</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဝင်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဝင်စာ" name="edmsInLetter"
                                                    value="{{ old('edmsInLetter', $temporaryReports->edmsInLetter) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထွက်စာ" name="edmsOutLetter"
                                                    value="{{ old('edmsOutLetter', $temporaryReports->edmsOutLetter) }}">
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
                                                    value="{{ old('gmailInLetter', $temporaryReports->gmailInLetter) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထွက်စာ" name="gmailOutLetter"
                                                    value="{{ old('gmailOutLetter', $temporaryReports->gmailOutLetter) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">Internet Monitoring Team</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="သတင်း" name="intMonitoringNewsCount"
                                                    value="{{ old('intMonitoringNewsCount', $temporaryReports->intMonitoringNewsCount) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရွက်ရေ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရွက်ရေ" name="intMonitoringNewsPaperCount"
                                                    value="{{ old('intMonitoringNewsPaperCount', $temporaryReports->intMonitoringNewsPaperCount) }}">
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
                                                    value="{{ old('dailyNewsMM', $temporaryReports->dailyNewsMM) }}">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="exampleFormControlSelect1">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)" name="dailyNewsEng"
                                                    value="{{ old('dailyNewsEng', $temporaryReports->dailyNewsEng) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">မူးယစ်သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="မူးယစ်သတင်း" name="drugNews"
                                                    value="{{ old('drugNews', $temporaryReports->drugNews) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တင်ဒါထုတ်ပြန်ချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တင်ဒါထုတ်ပြန်ချက်" name="tenderWeb"
                                                    value="{{ old('tenderWeb', $temporaryReports->tenderWeb) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပြည်ထဲရေးသတင်းလွှာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပြည်ထဲရေးသတင်းလွှာ" name="mohaNewsPaper"
                                                    value="{{ old('mohaNewsPaper', $temporaryReports->mohaNewsPaper) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရဲပြန်ကြား</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရဲပြန်ကြား" name="mpfInformation"
                                                    value="{{ old('mpfInformation', $temporaryReports->mpfInformation) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဌာန−၄ မှ သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဌာန−၄ မှ သတင်း" name="fromDeptFour"
                                                    value="{{ old('fromDeptFour', $temporaryReports->fromDeptFour) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထုတ်ပြန်ကြေညာချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထုတ်ပြန်ကြေညာချက်" name="announcement"
                                                    value="{{ old('announcement', $temporaryReports->announcement) }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="card-title">Myanmar National Portal တွင် လွှင့်တင်မှု</h3>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">နေ့စဉ်သတင်း(မြန်မာဘာသာ)</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="နေ့စဉ်သတင်း(မြန်မာဘာသာ)" name="MNPDailyNewsMM"
                                                    value="{{ old('MNPDailyNewsMM', $temporaryReports->MNPDailyNewsMM) }}">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="exampleFormControlSelect1">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)" name="MNPDailyNewsEng"
                                                    value="{{ old('MNPDailyNewsEng', $temporaryReports->MNPDailyNewsEng) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">မူးယစ်သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="မူးယစ်သတင်း" name="MNPDrugNews"
                                                    value="{{ old('MNPDrugNews', $temporaryReports->MNPDrugNews) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">တင်ဒါထုတ်ပြန်ချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="တင်ဒါထုတ်ပြန်ချက်" name="tenderMNP"
                                                    value="{{ old('tenderMNP', $temporaryReports->tenderMNP) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ပြည်ထဲရေးသတင်းလွှာ</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ပြည်ထဲရေးသတင်းလွှာ" name="MNPMohaNewPaper"
                                                    value="{{ old('MNPMohaNewPaper', $temporaryReports->MNPMohaNewPaper) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရဲပြန်ကြား</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရဲပြန်ကြား" name="MNPMpfInformation"
                                                    value="{{ old('MNPMpfInformation', $temporaryReports->MNPMpfInformation) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ဌာန−၄ မှ သတင်း</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ဌာန−၄ မှ သတင်း" name="MNPFromDeptFour"
                                                value="{{ old('MNPFromDeptFour', $temporaryReports->MNPFromDeptFour) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ထုတ်ပြန်ကြေညာချက်</label>
                                                <input type="number"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ထုတ်ပြန်ကြေညာချက်" name="MNPAnnouncement"
                                                    value="{{ old('MNPAnnouncement', $temporaryReports->MNPAnnouncement) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title">မှတ်ချက်</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" id="comment" name="remarkForNews">{{ old('remarkForNews', $temporaryReports->remarkForNews) }}</textarea>
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
                                                <textarea class="form-control" rows="5" id="comment" name="cctvStatus">{{ old('cctvStatus', $temporaryReports->cctvStatus) }}</textarea>
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
                                                <textarea class="form-control" rows="5" id="comment" name="rackServerStatus">{{ old('rackServerStatus', $temporaryReports->rackServerStatus) }}</textarea>
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
                                                            value="{{ old('desktopGood', $temporaryReports->desktopGood) }}">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="desktopBad"
                                                            value="{{ old('desktopBad', $temporaryReports->desktopBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၂။</th>
                                                    <td>Laptop</td>
                                                    <td>၈ လုံး</td>
                                                    <td><input type="number" class="form-control" name="laptopGood"
                                                        value="{{ old('laptopGood', $temporaryReports->laptopGood) }}">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="laptopBad"
                                                        value="{{ old('laptopBad', $temporaryReports->laptopBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၃။</th>
                                                    <td>Printer</td>
                                                    <td>၄ လုံး</td>
                                                    <td><input type="number" class="form-control"
                                                            name="printerGood"
                                                            value="{{ old('printerGood', $temporaryReports->printerGood) }}">
                                                        </td>
                                                    <td><input type="number" class="form-control" name="printerBad"
                                                        value="{{ old('printerBad', $temporaryReports->printerBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၄။</th>
                                                    <td>Copier</td>
                                                    <td>၁ လုံး</td>
                                                    <td><input type="number" class="form-control" name="copierGood"
                                                        value="{{ old('copierGood', $temporaryReports->copierGood) }}">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="copierBad"
                                                        value="{{ old('copierBad', $temporaryReports->copierBad) }}">
                                                    </td>
                                                </tr>
                                                <tr class="font-weight-bold text-dark">
                                                    <th>၅။</th>
                                                    <td>Scanner</td>
                                                    <td>၁ လုံး</td>
                                                    <td><input type="number" class="form-control"
                                                            name="scannerGood"
                                                            value="{{ old('scannerGood', $temporaryReports->scannerGood) }}"></td>
                                                    <td><input type="number" class="form-control" name="scannerBad"
                                                        value="{{ old('scannerBad', $temporaryReports->scannerBad) }}">
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
                                            <textarea class="form-control" rows="5" id="comment" name="descOfEquipment">{{ old('descOfEquipment', $temporaryReports->descOfEquipment) }}</textarea>
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
                                    <textarea class="form-control" rows="6" id="comment" name="deptOtherReport">{{ old('deptOtherReport', $temporaryReports->deptOtherReport) }}</textarea>
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
                                    <textarea class="form-control" rows="6" id="comment" name="staffReporting">{{ old('staffReporting', $temporaryReports->staffReporting) }}</textarea>
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
                                    <textarea class="form-control" rows="6" id="comment" name="offDayCheckForStaff">{{ old('offDayCheckForStaff', $temporaryReports->offDayCheckForStaff) }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (auth()->user()->hasAnyRole(['officer', 'deputy-director', 'director', 'super-admin']))
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
                                                value="{{ old('transferDate', $temporaryReports->transferDate) }}">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">လက်ခံသူ အမည်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="လက်ခံသူ အမည်" name="toReciverName"
                                                    value="{{ old('toReciverName', $temporaryReports->toReciverName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ကိုယ်ပိုင်အမှတ်" name="toReciverNumber"
                                                    value="{{ old('toReciverNumber', $temporaryReports->toReciverNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                                <input type="text"
                                                    class="form-control form-control-lg input-default "
                                                    placeholder="ရာထူး/ အဆင့်" name="toReciverRank"
                                                    value="{{ old('toReciverRank', $temporaryReports->toReciverRank) }}">
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
                                            @php
                                                // Fetch the user's existing signature if available
                                            $signature = auth()
                                                        ->user()
                                                        ->signatures()
                                                        ->first();
                                            @endphp
                                                <canvas id="transferSign" class="border w-100" width="500" height="200"></canvas>
                                                <button class="btn btn-primary btn-lg" type="button" onclick="clearCanvas('transferSign')">Clear</button>    
                                            </div>
                                            <input type="hidden" name="transferSignature" id="transferSignature" >
                                @if ($signature)
                                    <!-- Pass existing signature URL to JavaScript -->
                                    <script>
                                        window.onload = function() {
                                            const signatureCanvas = document.getElementById('transferSign');
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
                                            <!-- Transfer Person Details -->
                                            <div class="form-group">
                                                <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="transferPerson" name="transferPersonNumber" 
                                                    placeholder="ကိုယ်ပိုင်အမှတ်"
                                                    value="{{ old('transferPersonNumber', $temporaryReports->transferPersonNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="transferRank">အဆင့်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="transferRank" name="transferPersonRank" 
                                                    placeholder="အဆင့်"
                                                    value="{{ old('transferPersonRank', $temporaryReports->transferPersonRank) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="transferName">အမည်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="transferName" name="transferPersonName" 
                                                    placeholder="အမည်"
                                                    value="{{ old('transferPersonName', $temporaryReports->transferPersonName) }}">
                                            </div>
                                        </div>

                                        <!-- Receiver Person Section -->
                                        {{-- <div class="col-6">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">တာဝန်မှူးတာဝန် လက်ခံသူ</h3>
                                            </div>
                                            <div class="form-group p-3">
                                                <label for="receiverSign">လက်ခံသူ လက်မှတ်</label>
                                            @php
                                                // Fetch the user's existing signature if available
                                            $signature = auth()
                                                        ->user()
                                                        ->signatures()
                                                        ->where('signature_type', 'receiverSign')
                                                        ->first();
                                            @endphp
                                                <canvas id="receiverSign" class="border w-100" width="500" height="200"></canvas>
                                                <button class="btn btn-primary btn-lg" type="button" onclick="clearCanvas('receiverSign')">Clear</button>
                                            </div>
                                            <input type="hidden" name="receiverSignature" id="receiverSignature">
                                            @if ($signature)
                                                <!-- Pass existing signature URL to JavaScript -->
                                                <script>
                                                    window.onload = function() {
                                                        const signatureCanvas = document.getElementById('receiverSign');
                                                        const signatureContext = signatureCanvas.getContext('2d');
                                                        const existingSignature = "{{ asset('storage/' . $signature->image_path) }}";

                                                        const image = new Image();
                                                        image.onload = function() {
                                                            signatureContext.drawImage(image, 0, 0, signatureCanvas.width, signatureCanvas.height);
                                                        };
                                                        image.src = existingSignature;
                                                    };
                                                </script>
                                            @endif
                                           
                                            <!-- Receiver Person Details -->
                                            <div class="form-group">
                                                <label for="receiverPerson">ကိုယ်ပိုင်အမှတ်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="receiverPerson" name="receiverPersonNumber" 
                                                    placeholder="ကိုယ်ပိုင်အမှတ်"
                                                    value="{{ old('receiverPersonNumber', $temporaryReports->receiverPersonNumber) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="receiverRank">အဆင့်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="receiverRank" name="receiverPersonRank" 
                                                    placeholder="အဆင့်"
                                                    value="{{ old('receiverPersonRank', $temporaryReports->receiverPersonRank) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="receiverName">အမည်</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    id="receiverName" name="receiverPersonName" 
                                                    placeholder="အမည်"
                                                    value="{{ old('receiverPersonName', $temporaryReports->receiverPersonName) }}">
                                            </div>
                                        </div> --}}
                                        <div class="col-6">
                                            <h3 class="text-warning text-center">အထက်တွင်ဖြည့်သွင်းထားသော အချက်အလက်များ မှန်ကန်မှုရှိ/ မရှိ စိစစ်ပြီးမှသာလွှဲပြောင်းပေးရန် ဖြစ်ပါသည်။</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <button class="btn btn-lg btn-success" type="submit">Submit Report</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to clear the canvas for a given signature (transfer or receiver)
function clearCanvas(canvasId) {
    const canvas = document.getElementById(canvasId);
    const context = canvas.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);

    // Clear the corresponding hidden input for transfer/receiver signature
    if (canvasId === 'transferSign') {
        document.getElementById('transferSignature').value = ''; // Clear transfer signature hidden input
    } else if (canvasId === 'receiverSign') {
        document.getElementById('receiverSignature').value = ''; // Clear receiver signature hidden input
    }
}

// Capture the canvas data as a Base64 image for a given signature (transfer or receiver)
function saveSignature(canvasId) {
    const canvas = document.getElementById(canvasId);
    const signatureDataUrl = canvas.toDataURL('image/png');

    // Set the corresponding hidden input value based on the canvas ID
    if (canvasId === 'transferSign') {
        document.getElementById('transferSignature').value = signatureDataUrl; // Set transfer signature hidden input
    } else if (canvasId === 'receiverSign') {
        document.getElementById('receiverSignature').value = signatureDataUrl; // Set receiver signature hidden input
    }
}

// Optionally call saveSignature before form submission to capture the signatures
document.querySelector('form').addEventListener('submit', function(event) {
    // Ensure signatures are saved before form submission
    saveSignature('transferSign');
    saveSignature('receiverSign');
});

</script>

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')
