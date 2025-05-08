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
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ စက်ပစ္စည်းအမျိုးအစားများထည့်သွင်းရန်</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('inventoryCat.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စက်ပစ္စည်းအမျိုးအစား</label>
                                            <input 
                                            type="text" 
                                            class="form-control form-control-lg input-default"
                                            name="inventoryCatName" 
                                            value="{{ old('inventoryCatName') }}"
                                            >
                                            @error('inventoryCatName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">မှတ်ချက်</label>
                                            <input type="text" class="form-control form-control-lg input-default "
                                            name="inventoryCatRemark">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-success p-3" type="submit">Submit</button>
                    <a class="btn btn-secondary btn-lg p-3" href="{{ route('inventoryCat.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')

