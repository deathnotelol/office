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
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ ဌာနများပြင်ဆင်သတ်မှတ်ရန်</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('department.update', $department->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဌာနအမှတ်</label>
                                            <input 
                                            type="text" 
                                            class="form-control form-control-lg input-default"
                                            placeholder="e.g - D001" 
                                            name="deptNo" 
                                            value="{{ old('deptNo', $department->deptNo) }}"
                                            >
                                            @error('deptNo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဌာနအမည်အတိုကောက်</label>
                                            <input type="deptShortName" class="form-control form-control-lg input-default "
                                                placeholder="e.g - နရခ" name="deptShortName" 
                                                value="{{ old('deptShortName', $department->deptShortName) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဌာနအမည်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ဌာနအမည်" name="deptName"
                                                value="{{ old('deptName', $department->deptName) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">မှတ်ချက်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="မှတ်ချက်" name="remark"
                                                value="{{ old('remark', $department->remark) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-success p-3" type="submit">Update</button>
                    <a class="btn btn-lg btn-secondary p-3" href="{{ route('department.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')

