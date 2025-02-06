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
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ ဌာနများသတ်မှတ်ရန်</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('department.store') }}" method="POST">
                    @csrf
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
                                            value="{{ old('deptNo') }}"
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
                                                placeholder="e.g - နရခ" name="deptShortName">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ဌာနအမည်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="ဌာနအမည်" name="deptName">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">မှတ်ချက်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                                placeholder="မှတ်ချက်" name="remark">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-success p-3" type="submit">Submit</button>
                    <a class="btn btn-secondary btn-lg p-3" href="{{ route('department.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')

