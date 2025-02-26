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
                top: 1in;
                left: 1in;
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
                    <h2 class="font-weight-bold mb-3">ပြည်ထဲရေးဝန်ကြီးဌာန</h2>
                    <h2 class="font-weight-bold">ဝန်ထမ်း၏ ကိုယ်ရေးအချက်အလက်</h2>
                </div>
            </div>
        </div>

        {{-- အခြေခံအချက်အလက် --}}
        <div class="card">
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #b6ddf1">
                <div class="mb-3 text-end">
                    <img src="{{ asset('public/' . $personnels->profileImage) }}" alt="ProfileImage" width="144px"
                        height="168px">
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ကိုယ်ပိုင်အမှတ် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->personnelId }}</strong></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အဆင့် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->personnelRank }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အမည် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->personnelName }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အဆင့်ရရက်စွဲ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ formatDateToMyanmarNumbers($personnels->getRankDate) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">လက်ရှိတာဝန် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->currentDuty }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">လက်ရှိတပ်ဖွဲ့/ဌာန −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->currentDept }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">တပ်ဖွဲ့/ဌာနရောက်ရက်စွဲ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ formatDateToMyanmarNumbers($personnels->deptArrivelDate) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">လူမျိုး/ဘာသာ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->nation }}</strong> /
                            <strong>{{ $personnels->religion }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->nationalId }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ပြန်တမ်းဝင်ရက်စွဲ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            @if ($personnels->gazettedDate)
                                <strong>{{ $personnels->gazettedDate }}</strong>
                            @else
                                <strong>မရှိပါ</strong>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ပညာအရည်အချင်း −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->education }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">မွေးသက္ကရာဇ်နှင့်ဇာတိ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ formatDateToMyanmarNumbers($personnels->dateOfBirth) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အဘအမည်(လူမျိုး/ဘာသာ) −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->fatherNameAndNationAndReligion }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အမိအမည်(လူမျိုး/ဘာသာ) −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->motherNameAndNationAndReligion }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အရာရှိလောင်းသင်တန်း −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->candidateOfficerTraining }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ယခင်အလုပ်အကိုင် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->previousOccupation }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အရပ်အမြင့် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->height }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">တပ်ဝင်ရက်စွဲ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ formatDateToMyanmarNumbers($personnels->dateOfEnlistment) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အိမ်ထောင်ရှိ/ မရှိ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->maritalStatus }}</strong></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- တပ်မတော်သား(သို့မဟုတ်) အခြားဝန်ကြီးဌာန/အဖွဲ့အစည်းမှ ကူးပြောင်းလာပါက --}}
        <div class="card">
            <div class="card-header">
                <h5 class="font-weight-bold">တပ်မတော်သား(သို့မဟုတ်) အခြားဝန်ကြီးဌာန/ အဖွဲ့အစည်းမှ ကူးပြောင်းလာပါက</h5>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #b6ddf1">
                <table class="table table-bordered table-hover text-wrap text-center">
                    <thead class="thead-primary">
                        <tr>
                            <th>စဉ်</th>
                            <th>ကိုယ်ပိုင်အမှတ်</th>
                            <th>ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်</th>
                            <th>တပ်ထွက်သည့် အကြောင်းအရာ</th>
                            <th>တာဝန်ထမ်းဆောင်ခဲ့သည့်တပ်များ</th>
                            <th>ပြစ်မှု/ပြစ်ဒဏ် (ရှိလျင်)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnels->military as $personnel)
                            <tr>
                                <td>{{ $personnel->srcNo }}</td>
                                <td>{{ $personnel->personalNo }}</td>
                                <td>
                                    @if ($personnel->cadetTrainingNo)
                                        {{ $personnel->cadetTrainingNo }}
                                    @else
                                        မရှိပါ
                                    @endif
                                </td>
                                <td>{{ $personnel->outOfReason }}</td>
                                <td>{{ $personnel->servedArmies }}</td>
                                <td>{{ $personnel->caseAndPunishment }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ဇနီးဆိုင်ရာအချက်အလက် --}}
        <div class="card">
            <div class="welcome-text text-center">
                <h4 class="font-weight-bold my-3">ဇနီးဆိုင်ရာအချက်အလက်</h4>
            </div>
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #b6ddf1">
                @if ($personnels->wifeName)
                    <div class="row">
                        <div class="col-5">
                            <p style="font-size: 1.2rem">အမည် −</p>
                        </div>
                        <div class="col-7">
                            <p style="font-size: 1.2rem"><strong>{{ $personnels->wifeName }}</strong></p>
                        </div>
                    </div>
                @else
                    မရှိပါ
                @endif
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">လူမျိုး/ဘာသာ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->wifeNationAndReligion }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">မွေးသက္ကရာဇ်နှင့်ဇာတိ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong>{{ formatDateToMyanmarNumbers($personnels->wifeDobAndPlace) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">နိုင်ငံသားစိစစ်ရေးကတ် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->wifeNRCNo }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">ပညာအရည်အချင်း −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->wifeEducation }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အလုပ်အကိုင် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->wifeOccupation }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အဘအမည် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->wifeFatherName }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">လူမျိုး/ ဘာသာ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->fatherNationAdnReligion }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">အမိအမည် −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->wifeMotherName }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">လူမျိုး/ဘာသာ −</p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem"><strong>{{ $personnels->motherNationAdnReligion }}</strong></p>
                    </div>
                </div>
                <div class="welcome-text text-center ">
                    <h4 class="font-weight-bold my-3">အမွေစား/ အမွေခံ</h4>
                </div>
                <div class="row">
                    <table class="table table-bordered table-hover text-wrap text-center">
                        <thead class="thead-primary">
                            <tr>
                                <th>စဉ်</th>
                                <th>အမည်</th>
                                <th>တော်စပ်ပုံ</th>
                                <th>နေရပ်လိပ်စာ</th>
                                <th>မှတ်ချက်</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personnels->inheritance as $inheri)
                                <tr>
                                    <td>{{ $inheri->inheriNo }}</td>
                                    <td>
                                        @if ($inheri->inheriName)
                                            {{ $inheri->inheriName }}
                                        @else
                                            မရှိပါ
                                        @endif
                                    </td>
                                    <td>{{ $inheri->inheriRelation }}</td>
                                    <td>{{ $inheri->inheriAddress }}</td>
                                    <td>{{ $inheri->inheriRemark }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="welcome-text text-start">
                    <h4 class="font-weight-bold my-3">သား/သမီး</h4>
                </div>
                <div class="row">
                    <table class="table table-bordered table-hover text-wrap text-center">
                        <thead class="thead-primary">
                            <tr>
                                <th>စဉ်</th>
                                <th>အမည်</th>
                                <th>မွေးသက္ကရာဇ်/အသက်</th>
                                <th>အလုပ်အကိုင်</th>
                                <th>နေရပ်လိပ်စာ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personnels->children as $child)
                                <tr>
                                    <td>{{ $child->childNo }}</td>
                                    <td>
                                        @if ($child->childName)
                                            {{ $child->childName }}
                                        @else
                                            မရှိပါ
                                        @endif
                                    </td>
                                    <td>{{ formatDateToMyanmarNumbers($child->childDob) }} <br> {{ $child->childAge }}
                                    </td>
                                    <td>{{ $child->childOccupation }}</td>
                                    <td>{{ $child->childAddress }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem"><b>ဘွဲထူး/ဂုဏ်ထူး/တံဆိပ် −</b></p>
                    </div>
                    <div class="col-7">
                        @foreach ($personnels->medals as $medal)
                            <div class="row mb-2"> <!-- Add margin-bottom for spacing -->
                                <div class="col-2"> <!-- Adjust width -->
                                    <p style="font-size: 1.2rem"><strong>{{ $medal->medalNo }}</strong></p>
                                </div>
                                <div class="col-10"> <!-- Adjust width -->
                                    @if ($medal->medalName)
                                        <p style="font-size: 1.2rem"><strong>{{ $medal->medalName }}</strong></p>
                                    @else
                                        <p style="font-size: 1.2rem">မရှိပါ</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>






        <div class="d-flex justify-content-between mb-5">
            <a href="{{ route('personnel.index') }}" class="btn btn-primary btn-lg">Back to List</a>
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
