@include('components.layouts.header')
@include('components.layouts.sidebar')


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ e-Government ဌာန အမှုတွဲများရေးသွင်းရန်</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('caseList.update', $caseList->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အမှုတွဲနှင့်သက်ဆိုင်သည့်
                                                ဖိုင်အမည်</label>
                                            <select name="file_id" class="form-control">
                                                @foreach ($caseFiles as $caseFile)
                                                    <option value="{{ $caseFile->id }}"
                                                        {{ old('file_id', $caseList->file_id) == $caseFile->id ? 'selected' : '' }}>
                                                        {{ $caseFile->fileName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အမှုတွဲလက်ရှိအခြေအနေ</label>
                                            <select name="status" class="form-control">
                                                <option value="Pending"
                                                    {{ old('status', $caseList->status) == 'Pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="Progress"
                                                    {{ old('status', $caseList->status) == 'Progress' ? 'selected' : '' }}>
                                                    In Progress</option>
                                                <option value="Completed"
                                                    {{ old('status', $caseList->status) == 'Completed' ? 'selected' : '' }}>
                                                    Completed</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာပါရက်စွဲ</label>
                                            <input name="inLetterDate"
                                                class="datepicker-default form-control form-control-lg" id="datepicker"
                                                placeholder="Choice Date"
                                                value="{{ old('inLetterDate', $caseList->inLetterDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="inLetterNumber"
                                                value="{{ old('inLetterNumber', $caseList->inLetterNumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="inLetterContent" cols="30" rows="5"
                                                value="{{ old('inLetterContent', $caseList->inLetterContent) }}">{{ $caseList->inLetterContent }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာပေးပို့သည့်ဌာန</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ဝန်ကြီးဌာန (သို့မဟုတ်) တပ်ဖွဲ့/ဦးစီးဌာန" name="fromDeptName"
                                                value="{{ old('inLetterToDps', $caseList->fromDeptName) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာတင်သည့်ရက်စွဲ</label>
                                            <input name="inLetterToDps"
                                                class="datepicker-default form-control form-control-lg" id="datepicker"
                                                placeholder="Choice Date"
                                                value="{{ old('inLetterToDps', $caseList->inLetterToDps) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာတင်ပြရာတွင်
                                                ရေးသားသည့်မှတ်ချက်</label>
                                            <textarea class="form-control" name="inLetterRemark" cols="30" rows="10"
                                                value="{{ old('inLetterRemark', $caseList->inLetterRemark) }}">{{ $caseList->inLetterRemark }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာပြန်ကျသည့်ရက်စွဲ</label>
                                            <input name="inLetterReturnDate"
                                                class="datepicker-default form-control form-control-lg" id="datepicker"
                                                placeholder="Choice Date"
                                                value="{{ old('inLetterReturnDate', $caseList->inLetterReturnDate) }}">
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
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဒုတိယအမြဲတမ်းအတွင်းဝန်
                                                မှတ်ချက်</label>
                                            <textarea class="form-control" name="dpsRemark" cols="30" rows="5"
                                                value="{{ old('dpsRemark', $caseList->dpsRemark) }}">{{ $caseList->dpsRemark }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အမြဲတမ်းအတွင်းဝန် မှတ်ချက်</label>
                                            <textarea class="form-control" name="psRemark" cols="30" rows="5"
                                                value="{{ old('psRemark', $caseList->psRemark) }}">{{ $caseList->psRemark }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဒုတိယဝန်ကြီး မှတ်ချက်</label>
                                            <textarea class="form-control" name="dmRemark" cols="30" rows="5"
                                                value="{{ old('dmRemark', $caseList->dmRemark) }}">{{ $caseList->dmRemark }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြည်ထောင်စုဝန်ကြီး မှတ်ချက်</label>
                                            <textarea class="form-control" name="umRemark" cols="30" rows="5"
                                                value="{{ old('umRemark', $caseList->umRemark) }}">{{ $caseList->umRemark }}</textarea>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">လက်အောက်ဌာနများသို့
                                                စာထွက်သည့်ရက်</label>
                                            <input name="outLetterDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('outLetterDate', $caseList->outLetterDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="outLetterContent" cols="30" rows="5"
                                                value="{{ old('outLetterContent', $caseList->outLetterContent) }}">{{ $caseList->outLetterContent }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ထွက်စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="outLetterNumber"
                                                value="{{ old('outLetterNumber', $caseList->outLetterNumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ထွက်စာပေးပို့သည့် ဌာနများ</label>
                                            <select name="toChildDeptName[]" class="form-control" multiple>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->deptShortName }}"
                                                        {{ in_array($department->deptShortName, $caseList->toChildDeptName ?? []) ? 'selected' : '' }}>
                                                        {{ $department->deptName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အရောက်တောင်းသည့်နေ့ရက်</label>
                                            <input name="deadlineDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('deadlineDate', $caseList->deadlineDate) }}">
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
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">နရခမှ ပြန်လည်တင်ပြသည့်နေ့ရက်</label>
                                            <input name="fromMPFReturnDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('fromMPFReturnDate', $caseList->fromMPFReturnDate) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="fromMPFLetterNumber"
                                                value="{{ old('fromMPFLetterNumber', $caseList->fromMPFLetterNumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="fromMPFLetterContent" cols="30" rows="5"
                                                value="{{ old('fromMPFLetterContent', $caseList->fromMPFLetterContent) }}">{{ $caseList->fromMPFLetterContent }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အထဥမှ ပြန်လည်တင်ပြသည့်နေ့ရက်</label>
                                            <input name="fromGADReturnDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('fromGADReturnDate', $caseList->fromGADReturnDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="fromGADLetterNumber"
                                                value="{{ old('fromGADLetterNumber', $caseList->fromGADLetterNumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="fromGADLetterContent" cols="30" rows="5"
                                                value="{{ old('fromGADLetterContent', $caseList->fromGADLetterContent) }}">{{ $caseList->fromGADLetterContent }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စစစမှ ပြန်လည်တင်ပြသည့်နေ့ရက်</label>
                                            <input name="fromBSIReturnDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('fromBSIReturnDate', $caseList->fromBSIReturnDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="fromBSILetterNumber"
                                                value="{{ old('fromBSILetterNumber', $caseList->fromBSILetterNumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="fromBSILetterContent" cols="30" rows="5"
                                                value="{{ old('fromBSILetterContent', $caseList->fromBSILetterContent) }}">{{ $caseList->fromBSILetterContent }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကစမှ ပြန်လည်တင်ပြသည့်နေ့ရက်</label>
                                            <input name="fromPDReturnDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('fromPDReturnDate', $caseList->fromPDReturnDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="fromPDLetterNumber"
                                                value="{{ old('fromPDLetterNumber', $caseList->fromPDLetterNumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="fromPDLetterContent" cols="30" rows="5"
                                                value="{{ old('fromPDLetterContent', $caseList->fromPDLetterContent) }}">{{ $caseList->fromPDLetterContent }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အသဥမှ ပြန်လည်တင်ပြသည့်နေ့ရက်</label>
                                            <input name="fromFSDReturnDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('fromFSDReturnDate', $caseList->fromFSDReturnDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="fromFSDLetterNumber"
                                                value="{{ old('fromFSDLetterNumber', $caseList->fromFSDLetterNumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="fromFSDLetterContent" cols="30" rows="5"
                                                value="{{ old('fromFSDLetterContent', $caseList->fromFSDLetterContent) }}">{{ $caseList->fromFSDLetterContent }}</textarea>
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
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">လက်အောက်မှဝင်စာများ
                                                စုစည်းတင်ပြသည့်နေ့ရက်</label>
                                            <input name="processToDps"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('processToDps', $caseList->processToDps) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဝင်စာတင်ပြရာတွင်ရေးသားသည့်မှတ်ချက်</label>
                                            <textarea class="form-control" name="processCaseRemark" cols="30" rows="5" 
                                            value="{{ old('processCaseRemark', $caseList->processCaseRemark) }}">{{ $caseList->processCaseRemark }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဒုတိယအမြဲတမ်းအတွင်းဝန်
                                                မှတ်ချက်</label>
                                            <textarea class="form-control" name="processCaseDpsRemark" cols="30" rows="5"
                                                value="{{ old('processCaseDpsRemark', $caseList->processCaseDpsRemark) }}">{{ $caseList->processCaseDpsRemark }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဒုတိယဝန်ကြီး မှတ်ချက်</label>
                                            <textarea class="form-control" name="processCaseDmRemark" cols="30" rows="5"
                                                value="{{ old('processCaseDmRemark', $caseList->processCaseDmRemark) }}">{{ $caseList->processCaseDmRemark }}</textarea>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">တင်ပြခဲ့သည့်အမှုတွဲ
                                                ပြန်ကျသည့်နေ့ရက်</label>
                                            <input name="processReturnDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('processReturnDate', $caseList->processReturnDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အမြဲတမ်းအတွင်းဝန် မှတ်ချက်</label>
                                            <textarea class="form-control" name="processCasePsRemark" cols="30" rows="5"
                                                value="{{ old('processCasePsRemark', $caseList->processCasePsRemark) }}">{{ $caseList->processCasePsRemark }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြည်ထောင်စုဝန်ကြီး မှတ်ချက်</label>
                                            <textarea class="form-control" name="processCaseUmRemark" cols="30" rows="5"
                                                value="{{ old('processCaseUmRemark', $caseList->processCaseUmRemark) }}">{{ $caseList->processCaseUmRemark }}</textarea>
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
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">သက်ဆိုင်ရာ ဌာန/အဖွဲ့အစည်းသို့
                                                စာထွက်သည့်နေ့ရက်</label>
                                            <input name="toRelevantDeptOutLetterDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('toRelevantDeptOutLetterDate', $caseList->toRelevantDeptOutLetterDate) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာအမှတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="စာအမှတ်" name="letterNumberOfRelevantDept"
                                                value="{{ old('letterNumberOfRelevantDept', $caseList->letterNumberOfRelevantDept) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အကြောင်းအရာ</label>
                                            <textarea class="form-control" name="letterContentOfRelevantDept" cols="30" rows="5"
                                                value="{{ old('letterContentOfRelevantDept', $caseList->letterContentOfRelevantDept) }}">{{ $caseList->letterContentOfRelevantDept }}</textarea>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleFormControlSelect1">ပေးပို့သည့်သက်ဆိုင်ရာဌာန/အဖွဲ့အစည်းအမည်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                name="toRelevantDeptName"
                                                value="{{ old('toRelevantDeptName', $caseList->toRelevantDeptName) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အခြားဆောင်ရွက်ထားရှိမှု</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                name="otherAction"
                                                value="{{ old('otherAction', $caseList->otherAction) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">အမှုတွဲနောက်ဆုံး
                                                ပြီးပြတ်သည့်နေ့ရက်</label>
                                            <input name="caseCompletedDate"
                                                class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('caseCompletedDate', $caseList->caseCompletedDate) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>အမှုတွဲဖိုင်များတွဲရန်</label>
                                            <div class="input-group">
                                                <input type="text" id="fileInput" class="form-control" placeholder="Select files" name="relatedCaseFile" readonly>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary" onclick="openFileManager()">Browse</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Prepopulate the input field with existing file paths -->
                                        <input type="text" id="inputId" class="form-control"
                                            placeholder="Select files" name="relatedCaseFile"
                                            value="{{ implode(', ', $caseList->relatedCaseFile ?? []) }}" />

                                        <!-- Browse button to open file manager -->
                                        <button class="btn btn-primary mt-2"
                                            onclick="openFileManager(event, 'inputId')">Browse</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-lg btn-success p-3" type="submit">Update Case List</button>
                    <a class="btn btn-lg btn-secondary p-3" href="{{ route('caseList.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function openFileManager(event, inputId) {
        // Prevent the page from refreshing when the button is clicked
        event.preventDefault();

        // Open the file manager with the target input ID
        var fmWindow = window.open(
            '{{ route('elfinder.popup') }}/' + inputId,
            'FileManager',
            'width=800,height=600'
        );
    }

    window.processSelectedFiles = function(filePaths, inputId) {
        const targetInput = document.getElementById(inputId);
        if (targetInput) {
            const existingValue = targetInput.value;
            const combinedFiles = [...new Set([...existingValue.split(',').map(f => f.trim()), ...filePaths])];

            // Convert the file paths to JSON string
            const jsonValue = JSON.stringify(combinedFiles);

            // Set the value to the input field
            targetInput.value = jsonValue;
        } else {
            console.error(`No input field found with ID: ${inputId}`);
        }
    };


    window.addEventListener('focus', () => {
        const selectedFiles = JSON.parse(localStorage.getItem('selectedFiles'));
        if (selectedFiles && selectedFiles.length > 0) {
            const inputId = 'inputId'; // Replace with your actual input ID
            const targetInput = document.getElementById(inputId);

            if (targetInput) {
                // Combine existing values with newly selected files
                const existingValue = targetInput.value;
                const updatedValue = [...new Set([...
                    selectedFiles
                ])].join(', ');
                targetInput.value = updatedValue;
            } else {
                console.error(`No input field found with ID: ${inputId}`);
            }

            // Clear the selected files from localStorage
            localStorage.removeItem('selectedFiles');
        }
    });
</script>

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')
