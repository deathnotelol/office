@include('components.layouts.header')
@include('components.layouts.sidebar')

<head>
    <style>
        /* Style the date input field */
        input[type="date"] {
            appearance: none;
            /* Removes default styles */
            -webkit-appearance: none;
            -moz-appearance: none;

            background-color: #f8f9fa;
            border: 2px solid #007bff;
            border-radius: 8px;
            /* padding: 10px 15px; */
            font-size: 16px;
            color: #333;
            cursor: pointer;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        /* Add hover effect */
        input[type="date"]:hover {
            border-color: #0056b3;
            background-color: #eef4ff;
        }

        /* Add focus effect */
        input[type="date"]:focus {
            border-color: #004085;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Placeholder text color */
        input[type="date"]::placeholder {
            color: #aaa;
        }

        /* .date-container {
            position: relative;
            display: inline-block;
        }

        .date-container input {
            width: 100%;
            padding-left: 40px;
            
        } */
    </style>
</head>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <form action="{{ route('personnel.update', $personnels->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text text-center">
                        <h2 class="mb-3">ပြည်ထဲရေးဝန်ကြီးဌာန</h2>
                        <h3>ဝန်ထမ်း၏ ကိုယ်ရေးအချက်အလက်</h3>
                    </div>
                </div>
            </div>
            <!-- Form  -->
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <div class="row">
                            <div class="col-xl-12 col-xxl-12">
                                <!-- Tab Navigation -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab1" type="button"
                                            role="tab">အခြေခံအချက်အလက်</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab2-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab2" type="button" role="tab">တပ်မတော်သား (သို့မဟုတ်)
                                            အခြား</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab3-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab3" type="button"
                                            role="tab">ဇနီးဆိုင်ရာအချက်အလက်</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab4-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab4" type="button" role="tab">ဘွဲ့ထူး/ဂုဏ်ထူး/တံဆိပ်
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab5-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab5" type="button" role="tab">ပြစ်မှု/ပြစ်ဒဏ်မှတ်တမ်း
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab6-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab6" type="button" role="tab">
                                            တာဝန်ထမ်းဆောင်မှုမှတ်တမ်း</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab7-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab7" type="button" role="tab"> သင်တန်းတက်ရောက်မှု
                                        </button>
                                    </li>

                                </ul>

                                <div class="tab-content mt-3" id="myTabContent">
                                    <!-- အခြေခံအချက်အလက် -->
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">ဓာတ်ပုံတင်ရန်</label>
                                            <input type="file" name="profileImage" class="form-control"
                                                id="imageInput"
                                                value="{{ old('profileImage', $personnels->profileImage) }}">
                                            <div id="imagePreview" class="mt-2">
                                                <img src="{{ asset('public/' . $personnels->profileImage) }}"
                                                    alt="" width="150px" height="150px">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">ကိုယ်ပိုင်အမှတ်</label>
                                            <input type="text" name="personnelId" class="form-control"
                                                value="{{ old('personnelId', $personnels->personnelId) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အဆင့်</label>
                                            <input type="text" name="personnelRank" class="form-control"
                                                value="{{ old('personnelRank', $personnels->personnelRank) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အမည်</label>
                                            <input type="text" name="personnelName" class="form-control"
                                                value="{{ old('personnelName', $personnels->personnelName) }}">
                                        </div>

                                        {{-- Date Picker --}}
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အဆင့်ရရက်စွဲ</label>
                                            <input name="getRankDate" type="text" class="form-control"
                                                value="{{ old('getRankDate', $personnels->getRankDate) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">လက်ရှိတာဝန်</label>
                                            <input type="text" name="currentDuty" class="form-control"
                                                value="{{ old('currentDuty', $personnels->currentDuty) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">လက်ရှိတပ်ဖွဲ့/ဌာန</label>
                                            <input type="text" name="currentDept" class="form-control"
                                                value="{{ old('currentDept', $personnels->currentDept) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တပ်ဖွဲ့/ဌာနရောက်ရက်စွဲ</label>
                                            <input name="deptArrivelDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('deptArrivelDate', $personnels->deptArrivelDate) }}">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">လူမျိုး</label>
                                                    <input type="text" name="nation" class="form-control"
                                                        value="{{ old('nation', $personnels->nation) }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ဘာသာ</label>
                                                    <input type="text" name="religion" class="form-control"
                                                        value="{{ old('religion', $personnels->religion) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်</label>
                                            <input type="text" name="nationalId" class="form-control"
                                                value="{{ old('nationalId', $personnels->nationalId) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြန်တမ်းဝင်ရက်စွဲ</label>
                                            <input name="gazettedDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('gazettedDate', $personnels->gazettedDate) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">ပညာအရည်အချင်း</label>
                                            <input type="text" name="education" class="form-control"
                                                value="{{ old('education', $personnels->education) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">မွေးသက္ကရာဇ်နှင့်ဇာတိ</label>
                                            <input name="dateOfBirth" type="text" class="form-control"
                                                value="{{ old('dateOfBirth', $personnels->dateOfBirth) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အဘအမည် (လူမျိုး/ဘာသာ)</label>
                                            <input type="text" name="fatherNameAndNationAndReligion"
                                                class="form-control"
                                                value="{{ old('fatherNameAndNationAndReligion', $personnels->fatherNameAndNationAndReligion) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အမိအမည် (လူမျိုး/ဘာသာ)</label>
                                            <input type="text" name="motherNameAndNationAndReligion"
                                                class="form-control"
                                                value="{{ old('motherNameAndNationAndReligion', $personnels->motherNameAndNationAndReligion) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အရာရှိလောင်းသင်တန်း</label>
                                            <input type="text" name="candidateOfficerTraining"
                                                class="form-control"
                                                value="{{ old('candidateOfficerTraining', $personnels->candidateOfficerTraining) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">ယခင်အလုပ်အကိုင်</label>
                                            <input type="text" name="previousOccupation" class="form-control"
                                                value="{{ old('previousOccupation', $personnels->previousOccupation) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အရပ်အမြင့်</label>
                                            <input type="text" name="height" class="form-control"
                                                placeholder="၅ ပေ ၉ လက်မ"
                                                value="{{ old('height', $personnels->height) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တပ်ဝင်ရက်စွဲ</label>
                                            <input name="dateOfEnlistment"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('dateOfEnlistment', $personnels->dateOfEnlistment) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အိမ်ထောင်ရှိ/ မရှိ</label>
                                            <input type="text" name="maritalStatus" class="form-control"
                                                value="{{ old('maritalStatus', $personnels->maritalStatus) }}">
                                        </div>

                                        <button type="button" class="btn btn-primary next-tab"
                                            data-next="tab2-tab">Next</button>
                                    </div>

                                    <!-- တပ်မတော်(သို့မဟုတ်) အခြားဝန်ကြီးဌာနမှကူးပြောင်းလာသူ -->
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="my-3 text-success">
                                            <h4> တပ်မတော်(သို့မဟုတ်) အခြားဝန်ကြီးဌာနမှကူးပြောင်းလာသူ </h4>
                                        </div>
                                        <div id="formContainer">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->military as $military)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="military_id[]"
                                                            value="{{ $military->id ?? '' }}">
                                                        <input type="hidden" name="delete_military[]" class="delete"
                                                            value="0">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">စဉ်</label>
                                                                <input type="text" name="srcNo[]"
                                                                    class="form-control"
                                                                    value="{{ $military->srcNo }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">ကိုယ်ပိုင်အမှတ်</label>
                                                                <input type="text" name="personalNo[]"
                                                                    class="form-control"
                                                                    value="{{ $military->personalNo }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်</label>
                                                                <input type="text" name="cadetTrainingNo[]"
                                                                    class="form-control"
                                                                    value="{{ $military->cadetTrainingNo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">တပ်ထွက်သည့်အကြောင်းအရာ</label>
                                                                <input type="text" name="outOfReason[]"
                                                                    class="form-control"
                                                                    value="{{ $military->outOfReason }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">တာဝန်ထမ်းဆောင်ခဲ့သည့်တပ်များ</label>
                                                                <input type="text" name="servedArmies[]"
                                                                    class="form-control"
                                                                    value="{{ $military->servedArmies }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">ပြစ်မှု/ပြစ်ဒဏ်(ရှိလျှင်)</label>
                                                                <input type="text" name="caseAndPunishment[]"
                                                                    class="form-control"
                                                                    value="{{ $military->caseAndPunishment }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button"
                                                                class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-success addForm">+</button>
                                                    <button type="button"
                                                        class="btn btn-danger remove-form">Remove</button>
                                                @endforeach
                                            </div>
                                            {{-- Hidden Input --}}
                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="military_id[]" value="">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="srcNo[]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">ကိုယ်ပိုင်အမှတ်</label>
                                                            <input type="text" name="personalNo[]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label">ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်</label>
                                                            <input type="text" name="cadetTrainingNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">တပ်ထွက်သည့်အကြောင်းအရာ</label>
                                                            <input type="text" name="outOfReason[]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label">တာဝန်ထမ်းဆောင်ခဲ့သည့်တပ်များ</label>
                                                            <input type="text" name="servedArmies[]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">ပြစ်မှု/ပြစ်ဒဏ်(ရှိလျှင်)</label>
                                                            <input type="text" name="caseAndPunishment[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success addForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-form">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success prev-tab"
                                            data-prev="tab1-tab">Previous</button>
                                        <button type="button" class="btn btn-primary next-tab"
                                            data-next="tab3-tab">Next</button>
                                    </div>

                                    <!-- ဇနီးဆိုင်ရာအချက်အလက် -->

                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">ဓာတ်ပုံတင်ရန်</label>
                                                <input type="file" name="wifeimage" class="form-control"
                                                    id="wifeImageInput"
                                                    value="{{ old('wifeimage', $personnels->wifeimage) }}">
                                                <div id="wifeImagePreview" class="mt-2">
                                                    <img src="{{ asset('public/' . $personnels->wifeimage) }}"
                                                        alt="" width="150px" height="150px">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">အမည်</label>
                                                    <input type="text" name="wifeName" class="form-control"
                                                        value="{{ old('wifeName', $personnels->wifeName) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">လူမျိုး/ဘာသာ</label>
                                                    <input type="text" name="wifeNationAndReligion"
                                                        class="form-control"
                                                        value="{{ old('wifeNationAndReligion', $personnels->wifeNationAndReligion) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">မွေးသက္ကရာဇ်နှင့် ဇာတိ</label>
                                                    <input name="wifeDobAndPlace" type="text" id="dateTextInput"
                                                        class="form-control" placeholder="Pick a date and enter text"
                                                        value="{{ old('wifeDobAndPlace', $personnels->wifeDobAndPlace) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">နိုင်ငံသားစိစစ်ရေးကတ်</label>
                                                    <input type="text" name="wifeNRCNo" class="form-control"
                                                        value="{{ old('wifeNRCNo', $personnels->wifeNRCNo) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">ပညာအရည်အချင်း</label>
                                                    <input type="text" name="wifeEducation" class="form-control"
                                                        value="{{ old('wifeEducation', $personnels->wifeEducation) }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">အလုပ်အကိုင်</label>
                                                    <input type="text" name="wifeOccupation" class="form-control"
                                                        value="{{ old('wifeOccupation', $personnels->wifeOccupation) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">အဘအမည်</label>
                                                    <input type="text" name="wifeFatherName" class="form-control"
                                                        value="{{ old('wifeFatherName', $personnels->wifeFatherName) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">လူမျိုး/ ဘာသာ</label>
                                                    <input type="text" name="fatherNationAdnReligion"
                                                        class="form-control"
                                                        value="{{ old('fatherNationAdnReligion', $personnels->fatherNationAdnReligion) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">အမိအမည်</label>
                                                    <input type="text" name="wifeMotherName" class="form-control"
                                                        value="{{ old('wifeMotherName', $personnels->wifeMotherName) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">လူမျိုး/ ဘာသာ</label>
                                                    <input type="text" name="motherNationAdnReligion"
                                                        class="form-control"
                                                        value="{{ old('motherNationAdnReligion', $personnels->motherNationAdnReligion) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-3 text-success">
                                            <h4>အမွေစား/ အမွေခံ</h4>
                                        </div>
                                        <div id="formContainer1">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->inheritance as $inheri)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="inheritance_id[]"
                                                            value="{{ $inheri->id ?? '' }}">
                                                        <input type="hidden" name="delete_inheritance[]" class="delete" value="0">
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">စဉ်</label>
                                                                <input type="text" name="inheriNo[]"
                                                                    class="form-control"
                                                                    value="{{ $inheri->inheriNo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">အမည်</label>
                                                                <input type="text" name="inheriName[]"
                                                                    class="form-control"
                                                                    value="{{ $inheri->inheriName }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">တော်စပ်ပုံ</label>
                                                                <input type="text" name="inheriRelation[]"
                                                                    class="form-control"
                                                                    value="{{ $inheri->inheriRelation }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">နေရပ်လိပ်စာ</label>
                                                                <input type="text" name="inheriAddress[]"
                                                                    class="form-control"
                                                                    value="{{ $inheri->inheriAddress }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">မှတ်ချက်</label>
                                                                <input type="text" name="inheriRemark[]"
                                                                    class="form-control"
                                                                    value="{{ $inheri->inheriRemark }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div>  
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-success addWifeForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-wife-form">Remove</button>
                                            </div>

                                            {{-- Hidden Input --}}
                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="inheritance_id[]" value="">
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="inheriNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">အမည်</label>
                                                            <input type="text" name="inheriName[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">တော်စပ်ပုံ</label>
                                                            <input type="text" name="inheriRelation[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">နေရပ်လိပ်စာ</label>
                                                            <input type="text" name="inheriAddress[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">မှတ်ချက်</label>
                                                            <input type="text" name="inheriRemark[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success addWifeForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-wife-form">Remove</button>
                                            </div>
                                        </div>


                                        <div class="my-3 text-success">
                                            <h4>သား / သမီး</h4>
                                        </div>
                                        <div id="formContainer2">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->children as $child)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="child_id[]"
                                                            value="{{ $child->id ?? '' }}">
                                                        <input type="hidden" name="delete_child[]" class="delete" value="0">
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">စဉ်</label>
                                                                <input type="text" name="childNo[]"
                                                                    class="form-control"
                                                                    value="{{ $child->childNo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">အမည်</label>
                                                                <input type="text" name="childName[]"
                                                                    class="form-control"
                                                                    value="{{ $child->childName }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-group">
                                                                <label for="childDob">မွေးသက္ကရာဇ်</label>
                                                                <input type="date" name="childDob[]"
                                                                    class="form-control dob-field" id="childDob"
                                                                    value="{{ $child->childDob }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="childAge">အသက်</label>
                                                                <input type="text" name="childAge[]"
                                                                    class="form-control age-field" readonly
                                                                    value="{{ $child->childAge }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">အလုပ်အကိုင်</label>
                                                                <input type="text" name="childOccupation[]"
                                                                    class="form-control"
                                                                    value="{{ $child->childOccupation }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">နေရပ်လိပ်စာ</label>
                                                                <input type="text" name="childAddress[]"
                                                                    class="form-control"
                                                                    value="{{ $child->childAddress }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div>  
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-success addChildForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-child-form">Remove</button>
                                            </div>

                                            {{-- Hidden Input --}}

                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="child_id[]" value="">
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="childNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">အမည်</label>
                                                            <input type="text" name="childName[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="childDob">မွေးသက္ကရာဇ်</label>
                                                            <input type="date" name="childDob[]"
                                                                class="form-control dob-field" id="childDob">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="childAge">အသက်</label>
                                                            <input type="text" name="childAge[]"
                                                                class="form-control age-field" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">အလုပ်အကိုင်</label>
                                                            <input type="text" name="childOccupation[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">နေရပ်လိပ်စာ</label>
                                                            <input type="text" name="childAddress[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success addChildForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-child-form">Remove</button>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-success prev-tab"
                                            data-prev="tab2-tab">Previous</button>
                                        <button type="button" class="btn btn-primary next-tab"
                                            data-next="tab4-tab">Next</button>
                                    </div>

                                    <!-- ဘွဲထူး/ဂုဏ်ထူး/တံဆိပ် -->
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="my-3 text-success">
                                            <h4>ဘွဲထူး/ဂုဏ်ထူး/တံဆိပ်</h4>
                                        </div>
                                        <div id="formContainer3">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->medals as $medal)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="medal_id[]"
                                                            value="{{ $medal->id ?? '' }}">
                                                        <input type="hidden" name="delete_medal[]" class="delete"
                                                            value="0">
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">စဉ်</label>
                                                                <input type="text" name="medalNo[]"
                                                                    class="form-control"
                                                                    value="{{ $medal->medalNo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">ဘွဲ့ထူး/ဂုဏ်ထူး/တံဆိပ်</label>
                                                                <input type="text" name="medalName[]"
                                                                    class="form-control"
                                                                    value="{{ $medal->medalName }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button"
                                                                class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-success addMadelForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-madel-form">Remove</button>
                                            </div>
                                            {{-- Hidden Input --}}
                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="medal_id[]" value="">
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="medalNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="mb-3">
                                                            <label class="form-label">ဘွဲ့ထူး/ဂုဏ်ထူး/တံဆိပ်</label>
                                                            <input type="text" name="medalName[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success addMadelForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-madel-form">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success prev-tab"
                                            data-prev="tab3-tab">Previous</button>
                                        <button type="button" class="btn btn-primary next-tab"
                                            data-next="tab5-tab">Next</button>
                                    </div>

                                    <!-- ပြစ်မှု/ ပြစ်ဒဏ်မှတ်တမ်း -->
                                    <div class="tab-pane fade" id="tab5" role="tabpanel">
                                        <div class="my-3 text-success">
                                            <h4>ပြစ်မှု/ပြစ်ဒဏ်မှတ်တမ်း</h4>
                                        </div>
                                        <div id="formContainer4">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->crimes as $crime)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="crime_id[]"
                                                            value="{{ $crime->id ?? '' }}">
                                                        <input type="hidden" name="delete_crime[]" class="delete" value="0">
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">စဉ်</label>
                                                                <input type="text" name="crimeNo[]"
                                                                    class="form-control"
                                                                    value="{{ $crime->crimeNo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">ပြစ်မှု</label>
                                                                <input type="text" name="crimeName[]"
                                                                    class="form-control"
                                                                    value="{{ $crime->crimeName }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">ပြစ်ဒဏ်</label>
                                                                <input type="text" name="punishment[]"
                                                                    class="form-control"
                                                                    value="{{ $crime->punishment }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="childDob">ရက်စွဲ</label>
                                                                <input type="date" name="crimeDate[]"
                                                                    class="form-control"
                                                                    value="{{ $crime->crimeDate }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">မှတ်ချက်</label>
                                                                <input type="text" name="crimeRemark[]"
                                                                    class="form-control"
                                                                    value="{{ $crime->crimeRemark }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div> 
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-success addCrimeForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-crime-form">Remove</button>
                                            </div>

                                            {{-- Hidden Input --}}
                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="crime_id[]" value="">
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="crimeNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">ပြစ်မှု</label>
                                                            <input type="text" name="crimeName[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">ပြစ်ဒဏ်</label>
                                                            <input type="text" name="punishment[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="childDob">ရက်စွဲ</label>
                                                            <input type="date" name="crimeDate[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">မှတ်ချက်</label>
                                                            <input type="text" name="crimeRemark[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success addCrimeForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-crime-form">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success prev-tab"
                                            data-prev="tab4-tab">Previous</button>
                                        <button type="button" class="btn btn-primary next-tab"
                                            data-next="tab6-tab">Next</button>
                                    </div>

                                    <!-- တာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (ပြည်ထဲရေးဝန်ကြီးဌာန) -->
                                    <div class="tab-pane fade" id="tab6" role="tabpanel">
                                        <div class="my-3 text-success">
                                            <h4> တာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (ပြည်ထဲရေးဝန်ကြီးဌာန) </h4>
                                        </div>
                                        <div id="formContainer5">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->services as $service)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="service_id[]"
                                                            value="{{ $service->id }}">
                                                        <input type="hidden" name="delete_service[]" class="delete"
                                                            value="0">
                                                        <!-- Hidden delete flag -->

                                                        <div class="col-2">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="servedNo[]"
                                                                class="form-control"
                                                                value="{{ $service->servedNo }}">
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">အဆင့်</label>
                                                            <input type="text" name="servedRank[]"
                                                                class="form-control"
                                                                value="{{ $service->servedRank }}">
                                                        </div>
                                                        <div class="col-2">
                                                            <label class="form-label">တပ်ဖွဲ့/ဒေသ</label>
                                                            <input type="text" name="servedPlace[]"
                                                                class="form-control"
                                                                value="{{ $service->servedPlace }}">
                                                        </div>
                                                        <div class="col-3">
                                                            <label>ကာလ (မှ)</label>
                                                            <input type="date" name="servedPeriodFrom[]"
                                                                class="form-control"
                                                                value="{{ $service->servedPeriodFrom }}">
                                                            <label>ကာလ (ထိ)</label>
                                                            <input type="date" name="servedPeriodTo[]"
                                                                class="form-control"
                                                                value="{{ $service->servedPeriodTo }}">
                                                        </div>
                                                        <div class="col-2">
                                                            <label class="form-label">မှတ်ချက်</label>
                                                            <input type="text" name="servedRemark[]"
                                                                class="form-control"
                                                                value="{{ $service->servedRemark }}">
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button"
                                                                class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <button type="button"
                                                    class="btn btn-success servedRecordForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-served-form">Remove</button>
                                            </div>
                                            {{-- Hidden Form --}}
                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="service_id[]" value="">
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="servedNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">အဆင့်</label>
                                                            <input type="text" name="servedRank[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">တပ်ဖွဲ့/ဒေသ</label>
                                                            <input type="text" name="servedPlace[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group date-container">
                                                            <label for="servedPeriod">ကာလ (မှ)</label>
                                                            <input type="date" name="servedPeriodFrom[]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group date-container">
                                                            <label for="servedPeriod">ကာလ (ထိ)</label>
                                                            <input type="date" name="servedPeriodTo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">မှတ်ချက်</label>
                                                            <input type="text" name="servedRemark[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                    class="btn btn-success servedRecordForm">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-served-form">Remove</button>
                                            </div>
                                        </div>


                                        <button type="button" class="btn btn-success prev-tab"
                                            data-prev="tab5-tab">Previous</button>
                                        <button type="button" class="btn btn-primary next-tab"
                                            data-next="tab7-tab">Next</button>
                                    </div>

                                    <!-- သင်တန်းတက်ရောက်မှု -->
                                    <div class="tab-pane fade" id="tab7" role="tabpanel">
                                        <div class="my-4 text-success">
                                            <h4> ပြည်တွင်းသင်တန်း တက်ရောက်မှု </h4>
                                        </div>
                                        <div id="formContainer6">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->trainingInter as $trainingIn)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="trainingInter_id[]"
                                                            value="{{ $trainingIn->id ?? '' }}">
                                                        <input type="hidden" name="delete_trainingInter[]" class="delete" value="0">
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">စဉ်</label>
                                                                <input type="text" name="traningInterNo[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingIn->traningInterNo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">တက်ရောက်ခဲ့သည့်သင်တန်းများ</label>
                                                                <input type="text" name="traningInterName[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingIn->traningInterName }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-group date-container">
                                                                <label for="servedPeriod">ကာလ (မှ)</label>
                                                                <input type="date" name="traningInterPeriodFrom[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingIn->traningInterPeriodFrom }}">
                                                            </div>
                                                            <div class="form-group date-container">
                                                                <label for="servedPeriod">ကာလ (ထိ)</label>
                                                                <input type="date" name="traningInterPeriodTo[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingIn->traningInterPeriodTo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div>  
                                                    </div>
                                                @endforeach
                                                <button type="button"
                                                    class="btn btn-success traningFormInter">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-traningInter-form">Remove</button>
                                            </div>
                                            {{-- Hidden Input --}}
                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="trainingInter_id[]" value="">
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="traningInterNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label">တက်ရောက်ခဲ့သည့်သင်တန်းများ</label>
                                                            <input type="text" name="traningInterName[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group date-container">
                                                            <label for="servedPeriod">ကာလ (မှ)</label>
                                                            <input type="date" name="traningInterPeriodFrom[]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group date-container">
                                                            <label for="servedPeriod">ကာလ (ထိ)</label>
                                                            <input type="date" name="traningInterPeriodTo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                    class="btn btn-success traningFormInter">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-traningInter-form">Remove</button>
                                            </div>
                                        </div>
                                        <div class="my-4 text-success">
                                            <h4> ပြည်ပသင်တန်း တက်ရောက်မှု </h4>
                                        </div>
                                        <div id="formContainer7">
                                            <div class="form-group border p-3 mb-3 single-form form-instance">
                                                @foreach ($personnels->trainingOuter as $trainingOut)
                                                    <div class="row delete-row">
                                                        <input type="hidden" name="trainingOuter_id[]"
                                                            value="{{ $trainingOut->id ?? '' }}">
                                                        <input type="hidden" name="delete_trainingOuter[]" class="delete" value="0">
                                                        <div class="col-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">စဉ်</label>
                                                                <input type="text" name="traningOuterNo[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingOut->traningOuterNo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">တက်ရောက်ခဲ့သည့်သင်တန်းများ</label>
                                                                <input type="text" name="traningOuterName[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingOut->traningOuterName }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-group date-container">
                                                                <label for="servedPeriod">ကာလ (မှ)</label>
                                                                <input type="date" name="traningOuterPeriodFrom[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingOut->traningOuterPeriodFrom }}">
                                                            </div>
                                                            <div class="form-group date-container">
                                                                <label for="servedPeriod">ကာလ (ထိ)</label>
                                                                <input type="date" name="traningOuterPeriodTo[]"
                                                                    class="form-control"
                                                                    value="{{ $trainingOut->traningOuterPeriodTo }}">
                                                            </div>
                                                        </div>
                                                         <div class="col-2">
                                                            <button type="button" class="btn btn-danger my-3 clear-row">Clear</button>
                                                        </div> 
                                                    </div>
                                                @endforeach
                                                <button type="button"
                                                    class="btn btn-success traningFormOuter">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-traningOuter-form">Remove</button>
                                            </div>
                                            {{-- Hidden Input --}}
                                            <div
                                                class="form-group border p-3 mb-3 single-form form-instance-hidden d-none">
                                                <div class="row">
                                                    <input type="hidden" name="trainingOuter_id[]" value="">
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">စဉ်</label>
                                                            <input type="text" name="traningOuterNo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label">တက်ရောက်ခဲ့သည့်သင်တန်းများ</label>
                                                            <input type="text" name="traningOuterName[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group date-container">
                                                            <label for="servedPeriod">ကာလ (မှ)</label>
                                                            <input type="date" name="traningOuterPeriodFrom[]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group date-container">
                                                            <label for="servedPeriod">ကာလ (ထိ)</label>
                                                            <input type="date" name="traningOuterPeriodTo[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                    class="btn btn-success traningFormOuter">+</button>
                                                <button type="button"
                                                    class="btn btn-danger remove-traningOuter-form">Remove</button>
                                            </div>
                                        </div>

                                        <div class="my-4 text-primary">
                                            <h5>အထက်ဖော်ပြပါ ဖြည့်စွက်ရေးသွင်းထားသော အချက်အလက်များအား
                                                မှန်ကန်ပါကြောင်း
                                                တာဝန်ခံ လက်မှတ်ရေးထိုးပါသည်။</h5>
                                        </div>
                                        <div class="form-group border p-3 mb-3 single-form form-instance">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group p-3">
                                                        <label for="Sign">လက်မှတ်</label>

                                                        <div>
                                                            <!-- Canvas for displaying or capturing signature -->
                                                            <canvas id="sign" class="border w-100"></canvas>
                                                            <button type="button" class="btn btn-danger btn-sm mt-2"
                                                                onclick="clearCanvas('sign')">Clear</button>
                                                        </div>

                                                        <!-- Hidden input to store the signature data -->
                                                        <input type="hidden" name="personnelSign"
                                                            id="personnelSign"
                                                            value="{{ $personnels->personnelSign }}">

                                                        <!-- Display signature image if exists -->
                                                        @if ($personnels->personnelSign)
                                                            <script>
                                                                window.onload = function() {
                                                                    let signatureCanvas = document.getElementById('sign');
                                                                    let signatureContext = signatureCanvas.getContext('2d');

                                                                    // Correct the image path for Laravel's public storage
                                                                    let existingSignature = "{{ asset('public/storage/' . $personnels->personnelSign) }}";

                                                                    let image = new Image();
                                                                    image.crossOrigin = "Anonymous"; // Prevent CORS issues
                                                                    image.onload = function() {
                                                                        signatureContext.clearRect(0, 0, signatureCanvas.width, signatureCanvas
                                                                            .height); // Clear before drawing
                                                                        signatureContext.drawImage(image, 0, 0, signatureCanvas.width, signatureCanvas.height);
                                                                    };
                                                                    image.src = existingSignature;
                                                                };
                                                            </script>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group date-container">
                                                        <label for="servedPeriod">ရက်စွဲ</label>
                                                        <input type="date" name="signDate" class="form-control"
                                                            value="{{ $personnels->signDate }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">ကိုယ်ပိုင်အမှတ်</label>
                                                        <input type="text" name="signID" class="form-control"
                                                            value="{{ $personnels->signID }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">အဆင့်</label>
                                                        <input type="text" name="signRank" class="form-control"
                                                            value="{{ $personnels->signRank }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">အမည်</label>
                                                        <input type="text" name="signName" class="form-control"
                                                            value="{{ $personnels->signName }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success prev-tab"
                                            data-prev="tab6-tab">Previous</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary p-3">Update</button>
            <a class="btn btn-lg btn-secondary p-3" href="{{ route('personnel.index') }}">Back</a>
        </div>
    </form>
</div>


<script>
    // Capture the canvas data as a Base64 image
    function saveSignature(canvasId) {
        const canvas = document.getElementById(canvasId);
        const signatureDataUrl = canvas.toDataURL('image/png'); // Convert to Base64
        document.getElementById('personnelSign').value = signatureDataUrl;
    }

    document.querySelector('form').addEventListener('submit', function() {
        saveSignature('sign'); // Save before submitting
    });



    //Moving Form Tab

    document.addEventListener("DOMContentLoaded", function() {
        function showTab(tabId) {
            let tabButton = document.getElementById(tabId); // Get the tab button
            if (tabButton) {
                let tabInstance = new bootstrap.Tab(tabButton);
                tabInstance.show();

                // Ensure the correct tab content is active
                let tabContentId = tabButton.getAttribute("data-bs-target");
                document.querySelectorAll(".tab-pane").forEach(tab => tab.classList.remove("show", "active"));
                document.querySelector(tabContentId).classList.add("show", "active");
            }
        }

        // Handle Next button click
        document.querySelectorAll(".next-tab").forEach(button => {
            button.addEventListener("click", function() {
                showTab(this.getAttribute("data-next"));
            });
        });

        // Handle Previous button click
        document.querySelectorAll(".prev-tab").forEach(button => {
            button.addEventListener("click", function() {
                showTab(this.getAttribute("data-prev"));
            });
        });

        // ✅ Allow clicking on tab headings AND updating tab content correctly
        document.querySelectorAll(".nav-link").forEach(tab => {
            tab.addEventListener("click", function(event) {
                let targetTab = event.target; // The clicked tab button
                let tabInstance = new bootstrap.Tab(targetTab);
                tabInstance.show();

                // Ensure the correct tab content is active
                let tabContentId = targetTab.getAttribute("data-bs-target");
                document.querySelectorAll(".tab-pane").forEach(tab => tab.classList.remove(
                    "show", "active"));
                document.querySelector(tabContentId).classList.add("show", "active");
            });
        });
    });

    // Form Add with + button for Form Data
    document.addEventListener("DOMContentLoaded", function() {
        function handleDynamicForms(containerId, addBtnClass, removeBtnClass, hiddenFormClass) {
            let formContainer = document.getElementById(containerId);
            let hiddenForm = formContainer.querySelector(`.${hiddenFormClass}`); // Get hidden form template

            function updateRemoveButtons() {
                let forms = formContainer.querySelectorAll('.form-instance:not(.form-instance-hidden)');
                forms.forEach((form, index) => {
                    let removeBtn = form.querySelector(`.${removeBtnClass}`);
                    removeBtn.style.display = forms.length === 1 ? 'none' : 'inline-block';
                });
            }

            updateRemoveButtons(); // Initial check

            formContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains(addBtnClass)) {
                    let newForm = hiddenForm.cloneNode(true); // Clone hidden form
                    newForm.classList.remove("d-none", "form-instance-hidden"); // Make it visible
                    newForm.classList.add("form-instance"); // Ensure it's counted as an instance

                    newForm.querySelectorAll("input").forEach((input) => (input.value =
                        "")); // Clear fields
                    formContainer.appendChild(newForm); // Append the new form
                    updateRemoveButtons();
                }

                if (event.target.classList.contains(removeBtnClass)) {
                    let forms = formContainer.querySelectorAll(
                        '.form-instance:not(.form-instance-hidden)');
                    if (forms.length > 1) {
                        event.target.closest(".form-instance").remove();
                        updateRemoveButtons();
                    }
                }
            });
        }

        // ✅ Initialize multiple form sections for editing
        handleDynamicForms("formContainer", "addForm", "remove-form", "form-instance-hidden"); // Main form
        handleDynamicForms("formContainer1", "addWifeForm", "remove-wife-form",
            "form-instance-hidden"); // Wife data
        handleDynamicForms("formContainer2", "addChildForm", "remove-child-form",
            "form-instance-hidden"); // Child data 
        handleDynamicForms("formContainer3", "addMadelForm", "remove-madel-form",
            "form-instance-hidden"); // CaseForm Data
        handleDynamicForms("formContainer4", "addCrimeForm", "remove-crime-form",
            "form-instance-hidden"); // MadelForm Data
        handleDynamicForms("formContainer5", "servedRecordForm", "remove-served-form",
            "form-instance-hidden"); // servedRecordForm Data
        handleDynamicForms("formContainer6", "traningFormInter", "remove-traningInter-form",
            "form-instance-hidden"); // Training Inter
        handleDynamicForms("formContainer7", "traningFormOuter", "remove-traningOuter-form",
            "form-instance-hidden"); // Training Outer
    });



    //Calculate Age in child section
    document.addEventListener("DOMContentLoaded", function() {
        // Function to convert numbers to Myanmar numerals
        function convertToMyanmarNumerals(number) {
            const myanmarNumerals = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];
            return number.toString().split('').map(digit => myanmarNumerals[digit]).join('');
        }

        // Function to calculate age from the selected date
        function calculateAge(dobInput) {
            let dobValue = dobInput.value; // Get the value in yyyy-mm-dd format

            // If no value is provided, exit
            if (!dobValue) return;

            // Parse the date string into a Date object
            let birthDate = new Date(dobValue);
            let today = new Date();

            // Calculate the difference in years
            let age = today.getFullYear() - birthDate.getFullYear();
            let monthDiff = today.getMonth() - birthDate.getMonth();
            let dayDiff = today.getDate() - birthDate.getDate();

            // Adjust the age if the birthday hasn't occurred yet this year
            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }

            // Convert age to Myanmar numerals
            let myanmarAge = convertToMyanmarNumerals(age);

            // Update the corresponding age input field
            let ageField = dobInput.closest('.form-group').nextElementSibling.querySelector('.age-field');
            if (ageField) {
                ageField.value = myanmarAge +
                    " နှစ်"; // Set the age in Myanmar numerals with "နှစ်" (years) suffix
            }
        }

        // Event listener for changes in the date picker input field
        document.addEventListener("change", function(event) {
            if (event.target.classList.contains("dob-field")) {
                calculateAge(event.target); // Call the calculate function
            }
        });
    });




    //Date and text single input field
    document.getElementById("dateTextInput").addEventListener("focus", function() {
        this.type = "date"; // Change input type to date picker
    });

    document.getElementById("dateTextInput").addEventListener("change", function() {
        let selectedDate = this.value; // Store the selected date
        this.type = "text"; // Change back to text input
        this.value = selectedDate; // Keep the date and allow additional text
    });


    //Preview Selected Image
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById('imagePreview');

        // Ensure that the user selected a file
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Check if it's an image by ensuring the file type starts with 'image/'
                if (file.type.startsWith('image/')) {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" alt="Selected Image" class="img-fluid" style="width: 150px; height: 150px;">`;
                } else {
                    imagePreview.innerHTML = '<p>Please select a valid image file.</p>';
                }
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            imagePreview.innerHTML = ''; // Clear preview if no file is selected
        }
    });

    //Preview wife Selected Image
    document.getElementById('wifeImageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById('wifeImagePreview');

        // Ensure that the user selected a file
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Check if it's an image by ensuring the file type starts with 'image/'
                if (file.type.startsWith('image/')) {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" alt="Selected Image" class="img-fluid" style="width: 150px; height: 150px;">`;
                } else {
                    imagePreview.innerHTML = '<p>Please select a valid image file.</p>';
                }
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            imagePreview.innerHTML = ''; // Clear preview if no file is selected
        }
    });

    //Clear Input row
    document.querySelectorAll('.clear-row').forEach(button => {
        button.addEventListener('click', function() {
            let row = this.closest('.delete-row');
            row.querySelectorAll('input[type="text"], input[type="date"]').forEach(input => input
                .value = '');
            row.querySelector('.delete').value = '1'; // Mark for deletion
        });
    });
</script>

@include('components.layouts.footer')
