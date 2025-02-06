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
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ e-Government ဌာန အမှုတွဲဖိုင်များ ရေးသွင်းရန်</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('caseFile.update', $caseFile->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဖိုင်အမှတ်</label>
                                            <input 
                                            type="text" 
                                            class="form-control form-control-lg input-default"
                                            placeholder="e.g - F001" 
                                            name="fileNumber" 
                                            value="{{ old('fileNumber', $caseFile->fileNumber) }}"
                                            >
                                            @error('fileNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဘီရိုအမှတ်</label>
                                            <input type="cabinetName" class="form-control form-control-lg input-default "
                                                placeholder="e.g - e-Gov-1" name="cabinetName"
                                                value="{{ old('cabinetName', $caseFile->cabinetName) }}"
                                                >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဌာနစိတ်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="နည်းပညာ" name="subDeptName"
                                                value="{{ old('subDeptName', $caseFile->subDeptName) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဖိုင်အမည်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ဖိုင်အမည်" name="fileName"
                                                value="{{ old('fileName', $caseFile->fileName) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဖိုင်ဖွင့်သည့် နေ့ရက်</label>
                                            <input name="fileOpenDate" class="datepicker-default form-control form-control-lg"
                                                id="datepicker" placeholder="Choice Date"
                                                value="{{ old('fileOpenDate', $caseFile->fileOpenDate) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-success p-3" type="submit">Update</button>
                    <a class="btn btn-lg btn-secondary p-3" href="{{ route('caseFile.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')

