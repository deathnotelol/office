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
                <form action="{{ route('inventory.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပစ္စည်းအမျိုးအမည်</label>
                                            <input type="text" class="form-control form-control-lg input-default"
                                                name="inventoryName" value="{{ old('inventoryName') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inventory_category_id">စက်ပစ္စည်းအမျိုးအစားရွေးချယ်ရန်</label>
                                            <select name="inventory_category_id" id="inventory_category_id"
                                                class="form-control">
                                                <option value="">-- စက်ပစ္စည်းအမျိုးအစား --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->inventoryCatName }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">စာရင်းရှိ အရေအတွက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                name="instock" value="{{ old('instock') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြန်လည်သုံးစွဲနိုင်(ကောင်း)</label>
                                            <input type="number" id="good"
                                                class="form-control form-control-lg input-default " name="good"
                                                value="{{ old('good') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြုပြင်သုံးစွဲနိုင်(သင့်)</label>
                                            <input type="number" id="fair"
                                                class="form-control form-control-lg input-default " name="fair"
                                                value="{{ old('fair') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပြုပြင်သုံးစွဲ၍မရ(ညံ့)</label>
                                            <input type="number" id="bad"
                                                class="form-control form-control-lg input-default " name="bad"
                                                value="{{ old('bad') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ပေါင်း</label>
                                            <input type="number" class="form-control form-control-lg input-default"
                                                name="total" id="total" value="{{ old('total') }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">မှတ်ချက်</label>
                                            <input type="number" class="form-control form-control-lg input-default "
                                                name="remark" value="{{ old('remark') }}">
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

<script>
    function updateTotal() {
        const good = parseInt(document.getElementById('good').value) || 0;
        const fair = parseInt(document.getElementById('fair').value) || 0;
        const bad = parseInt(document.getElementById('bad').value) || 0;

        document.getElementById('total').value = good + fair + bad;
    }

    document.getElementById('good').addEventListener('input', updateTotal);
    document.getElementById('fair').addEventListener('input', updateTotal);
    document.getElementById('bad').addEventListener('input', updateTotal);
</script>

@include('components.layouts.footer')
