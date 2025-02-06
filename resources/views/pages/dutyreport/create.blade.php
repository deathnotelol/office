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
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('duty-report.store') }}" method="POST">
                    @csrf
                    @if(auth()->user()->hasAnyRole(['staff', 'officer', 'deputy-director', 'director', 'super-admin']))
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
                                            <input 
                                            type="text" 
                                            class="form-control form-control-lg input-default @error('reciverName') is-invalid @enderror"
                                            placeholder="လက်ခံသူ အမည်" 
                                            name="reciverName" 
                                            value="{{ old('reciverName') }}"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ကိုယ်ပိုင်အမှတ်" name="reciverNumber">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ရာထူး/ အဆင့်" name="reciverRank">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">လွှဲပြောင်းပေးသူ အမည်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="လွှဲပြောင်းပေးသူ အမည်" name="fromTransferName">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ကိုယ်ပိုင်အမှတ်" name="fromTransferNumber">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ရာထူး/ အဆင့်" name="fromTransferRank">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleFormControlSelect1">လွှဲပြောင်းလက်ခံဆောင်ရွက်သည့်
                                            နေ့ရက်</label>
                                        <input name="reciveDate" class="datepicker-default form-control form-control-lg"
                                            id="datepicker" placeholder="Choice Date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">၂။ e-Government ဌာန ဝန်ထမ်းများရုံးတက်ရောက်မှုစာရင်း
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title">ရှိရင်းအင်အား</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">သန္ဓေ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="သန္ဓေ" name="hasPermanentStaff">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="တွဲဖက်" name="hasAssociateStaff">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပေါင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ပေါင်း" name="totalStaff">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="card-title">ရုံးတက်အင်အား</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">သန္ဓေ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="သန္ဓေ" name="attenPermanentStaff">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="တွဲဖက်" name="attenAssociateStaff">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပေါင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ပေါင်း" name="attenTotalStaff">
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-title">ပျက်ကွက်အင်အား</h2>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">သန္ဓေ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="သန္ဓေ" name="absentPermanentStaff">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တွဲဖက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="တွဲဖက်" name="absentAssociateStaff">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပေါင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ပေါင်း" name="absentTotalStaff">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">ပျက်ကွက်သည့်အကြောာင်းအရာ</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="comment" name="absentReson"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">၃။ ဝင်စာ/ ထွက်စာများ ပေးပို့/ လက်ခံ ဆောင်ရွက်မှု
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title">ဝင်စာ/ ထွက်စာ လက်ခံရရှိမှု</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ဝင်စာ" name="inLetter">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ထွက်စာ" name="outLetter">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="card-title">EDMS ပေးပို့/ လက်ခံ ရရှိမှု</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ဝင်စာ" name="edmsInLetter">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ထွက်စာ" name="edmsOutLetter">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title">Gmail/ Fax ပေးပို့/ လက်ခံရရှိမှု</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ဝင်စာ" name="gmailInLetter">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ထွက်စာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ထွက်စာ" name="gmailOutLetter">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="card-title">Internet Monitoring Team</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">သတင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="သတင်း" name="intMonitoringNewsCount">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ရွက်ရေ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ရွက်ရေ" name="intMonitoringNewsPaperCount">
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
                                            <input type="number" class="form-control form-control-lg input-default"
                                                placeholder="နေ့စဉ်သတင်း(မြန်မာဘာသာ)" name="dailyNewsMM">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)" name="dailyNewsEng">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">မူးယစ်သတင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="မူးယစ်သတင်း" name="drugNews">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တင်ဒါထုတ်ပြန်ချက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="တင်ဒါထုတ်ပြန်ချက်" name="tenderWeb">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြည်ထဲရေးသတင်းလွှာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ပြည်ထဲရေးသတင်းလွှာ" name="mohaNewsPaper">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ရဲပြန်ကြား</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ရဲပြန်ကြား" name="mpfInformation">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဌာန−၄ မှ သတင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ဌာန−၄ မှ သတင်း" name="fromDeptFour">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ထုတ်ပြန်ကြေညာချက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ထုတ်ပြန်ကြေညာချက်" name="announcement">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="card-title">Myanmar National Portal တွင် လွှင့်တင်မှု</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">နေ့စဉ်သတင်း(မြန်မာဘာသာ)</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="နေ့စဉ်သတင်း(မြန်မာဘာသာ)" name="MNPDailyNewsMM">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="နေ့စဉ်သတင်း(အင်္ဂလိပ်ဘာသာ)" name="MNPDailyNewsEng">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">မူးယစ်သတင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="မူးယစ်သတင်း" name="MNPDrugNews">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တင်ဒါထုတ်ပြန်ချက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="တင်ဒါထုတ်ပြန်ချက်" name="tenderMNP">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြည်ထဲရေးသတင်းလွှာ</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ပြည်ထဲရေးသတင်းလွှာ" name="MNPMohaNewPaper">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ရဲပြန်ကြား</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ရဲပြန်ကြား" name="MNPMpfInformation">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဌာန−၄ မှ သတင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ဌာန−၄ မှ သတင်း" name="MNPFromDeptFour">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ထုတ်ပြန်ကြေညာချက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                placeholder="ထုတ်ပြန်ကြေညာချက်" name="MNPAnnouncement">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">မှတ်ချက်</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="comment" name="remarkForNews"></textarea>
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
                                            <textarea class="form-control" rows="5" id="comment" name="cctvStatus"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">၆။ e-Government ဌာနရှိ Rack Server စစ်ဆေးမှုနှင့်
                                ဝင်ရောက်ရရှိမှု အခြေအနေ</h2>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="comment" name="rackServerStatus"></textarea>
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
                                                <td><input type="number" class="form-control" name="desktopGood"></td>
                                                <td><input type="number" class="form-control" name="desktopBad"></td>
                                            </tr>
                                            <tr class="font-weight-bold text-dark">
                                                <th>၂။</th>
                                                <td>Laptop</td>
                                                <td>၈ လုံး</td>
                                                <td><input type="number" class="form-control" name="laptopGood"></td>
                                                <td><input type="number" class="form-control" name="laptopBad"></td>
                                            </tr>
                                            <tr class="font-weight-bold text-dark">
                                                <th>၃။</th>
                                                <td>Printer</td>
                                                <td>၄ လုံး</td>
                                                <td><input type="number" class="form-control" name="printerGood"></td>
                                                <td><input type="number" class="form-control" name="printerBad"></td>
                                            </tr>
                                            <tr class="font-weight-bold text-dark">
                                                <th>၄။</th>
                                                <td>Copier</td>
                                                <td>၁ လုံး</td>
                                                <td><input type="number" class="form-control" name="copierGood"></td>
                                                <td><input type="text" class="form-control" name="copierBad"></td>
                                            </tr>
                                            <tr class="font-weight-bold text-dark">
                                                <th>၅။</th>
                                                <td>Scanner</td>
                                                <td>၁ လုံး</td>
                                                <td><input type="number" class="form-control" name="scannerGood"></td>
                                                <td><input type="number" class="form-control" name="scannerBad"></td>
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
                                        <textarea class="form-control" rows="5" id="comment" name="descOfEquipment"></textarea>
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
                                <textarea class="form-control" rows="6" id="comment" name="deptOtherReport"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">၉။ တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ သတင်းပို့တင်ပြချက် <h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="form-group">
                                <textarea class="form-control" rows="6" id="comment" name="staffReporting"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">၁၀။ တပ်ဖွဲ့ဝင်၊ ဝန်ထမ်းများမှ
                                အစိုးရရုံးပိတ်ရက်များတွင် နေပြည်တော်ကောင်စီနယ်မြေအတွင်း အခြေပြုနေထိုင်ခြင်း ရှိ/ မရှိ
                                တင်ပြချက်<h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="form-group">
                                <textarea class="form-control" rows="6" id="comment" name="offDayCheckForStaff"></textarea>
                            </div>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->hasAnyRole(['officer', 'deputy-director', 'director', 'super-admin']))
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
                                        <input name="transferDate" class="datepicker-default form-control form-control-lg"
                                            id="datepicker" placeholder="Choice Date">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">လက်ခံသူ အမည်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="လက်ခံသူ အမည်" name="toReciverName">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ကိုယ်ပိုင်အမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ကိုယ်ပိုင်အမှတ်" name="toReciverNumber">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ရာထူး/ အဆင့်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ရာထူး/ အဆင့်" name="toReciverRank">
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
                                            <h3 class="card-title font-weight-bold">တာဝန်မှူးတာဝန် လွှဲပြောင်းပေးသူ</h3>
                                        </div>
                                        <div class="form-group p-3">
                                            <label for="transferSign">လွှဲပြောင်းပေးသူ လက်မှတ်</label>
                                            <canvas id="transferSign" class="border w-100" width="500" height="200"></canvas>
                                            <input type="hidden" name="transferSignature" id="transferSignature">
                                            <button class="btn btn-primary btn-lg" type="button" onclick="clearCanvas('transferSign')">Clear</button>
                                        </div>
                                        <!-- Transfer Person Details -->
                                        <div class="form-group">
                                            <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                            <input class="form-control form-control-lg" type="text" id="transferPerson"
                                                name="transferPersonNumber" required placeholder="ကိုယ်ပိုင်အမှတ်">
                                        </div>
                                        <div class="form-group">
                                            <label for="transferRank">အဆင့်</label>
                                            <input class="form-control form-control-lg" type="text" id="transferRank"
                                                name="transferPersonRank" required placeholder="အဆင့်">
                                        </div>
                                        <div class="form-group">
                                            <label for="transferName">အမည်</label>
                                            <input class="form-control form-control-lg" type="text" id="transferName"
                                                name="transferPersonName" required placeholder="အမည်">
                                        </div>
                                    </div>

                                    <!-- Receiver Person Section -->
                                    <div class="col-6">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">တာဝန်မှူးတာဝန် လက်ခံသူ</h3>
                                        </div>
                                        <div class="form-group p-3">
                                            <label for="receiverSign">လက်ခံသူ လက်မှတ်</label>
                                            <canvas id="receiverSign" class="border w-100" width="500" height="200"></canvas>
                                            <input type="hidden" name="receiverSignature" id="receiverSignature">
                                            <button class="btn btn-primary btn-lg" type="button" onclick="clearCanvas('receiverSign')">Clear</button>
                                        </div>
                                        <!-- Receiver Person Details -->
                                        <div class="form-group">
                                            <label for="receiverPerson">ကိုယ်ပိုင်အမှတ်</label>
                                            <input class="form-control form-control-lg" type="text" id="receiverPerson"
                                                name="receiverPersonNumber" required placeholder="ကိုယ်ပိုင်အမှတ်">
                                        </div>
                                        <div class="form-group">
                                            <label for="receiverRank">အဆင့်</label>
                                            <input class="form-control form-control-lg" type="text" id="receiverRank"
                                                name="receiverPersonRank" required placeholder="အဆင့်">
                                        </div>
                                        <div class="form-group">
                                            <label for="receiverName">အမည်</label>
                                            <input class="form-control form-control-lg" type="text" id="receiverName"
                                                name="receiverPersonName" required placeholder="အမည်">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                    <!--DD Remark Section -->
                @if(auth()->user()->hasAnyRole(['deputy-director', 'director', 'super-admin']))
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">၁၂။ ဒုတိယညွှန်ကြားရေးမှူး မှတ်ချက်<h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="form-group">
                                <textarea class="form-control" rows="6" id="comment" name="ddRemark"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group p-3">
                                    <label for="ddSign">လက်မှတ်</label>
                                    <canvas id="ddSign" class="border w-100" width="300" height="200"></canvas>
                                    <input type="hidden" name="ddSignature" id="ddSignature">
                                    <button class="btn btn-primary btn-lg" type="button" onclick="clearCanvas('ddSign')">Clear</button>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group p-3">
                                    <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                    <input class="form-control form-control-lg" type="text" id="transferPerson"
                                        name="ddNumber" required placeholder="ကိုယ်ပိုင်အမှတ်">
                                </div>
                                <div class="form-group p-3">
                                    <label for="transferRank">အဆင့်</label>
                                    <input class="form-control form-control-lg" type="text" id="transferRank"
                                        name="ddRank" required placeholder="အဆင့်">
                                </div>
                                <div class="form-group p-3">
                                    <label for="transferName">အမည်</label>
                                    <input class="form-control form-control-lg" type="text" id="transferName"
                                        name="ddName" required placeholder="အမည်">
                                </div>
                            </div>
                        </div>

                    </div>
                @endif

                    <!--Director Remark Section -->
                @if(auth()->user()->hasAnyRole('director', 'super-admin'))
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">၁၃။ ညွှန်ကြားရေးမှူး မှတ်ချက်<h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="form-group">
                                <textarea class="form-control" rows="6" id="comment" name="directorRemark"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group p-3">
                                    <label for="directorSign">လက်မှတ်</label>
                                    <canvas id="directorSign" class="border w-100" width="300" height="200"></canvas>
                                    <input type="hidden" name="directorSignature" id="directorSignature">
                                    <button class="btn btn-primary btn-lg" type="button" onclick="clearCanvas('directorSign')">Clear</button>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group p-3">
                                    <label for="transferPerson">ကိုယ်ပိုင်အမှတ်</label>
                                    <input class="form-control form-control-lg" type="text" id="transferPerson"
                                        name="directorNumber" required placeholder="ကိုယ်ပိုင်အမှတ်">
                                </div>
                                <div class="form-group p-3">
                                    <label for="transferRank">အဆင့်</label>
                                    <input class="form-control form-control-lg" type="text" id="transferRank"
                                        name="directorRank" required placeholder="အဆင့်">
                                </div>
                                <div class="form-group p-3">
                                    <label for="transferName">အမည်</label>
                                    <input class="form-control form-control-lg" type="text" id="transferName"
                                        name="directorName" required placeholder="အမည်">
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

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')