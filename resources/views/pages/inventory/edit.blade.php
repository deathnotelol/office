@include('components.layouts.header')
@include('components.layouts.sidebar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ စက်ပစ္စည်းအမျိုးအစားများ ပြင်ဆင်ရန်</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>ပစ္စည်းအမျိုးအမည်</label>
                                            <input type="text" name="inventoryName" 
                                                   class="form-control form-control-lg input-default"
                                                   value="{{ old('inventoryName', $inventory->inventoryName) }}">
                                        </div>

                                        <div class="form-group">
                                            <label>စက်ပစ္စည်းအမျိုးအစား</label>
                                            <select name="inventory_category_id" class="form-control">
                                                <option value="">-- စက်ပစ္စည်းအမျိုးအစား --</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                        {{ $category->id == $inventory->inventory_category_id ? 'selected' : '' }}>
                                                        {{ $category->inventoryCatName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>စာရင်းရှိ အရေအတွက်</label>
                                            <input type="number" name="instock" 
                                                   class="form-control form-control-lg input-default" 
                                                   value="{{ old('instock', $inventory->instock) }}">
                                        </div>

                                        <div class="form-group">
                                            <label>ပြန်လည်သုံးစွဲနိုင်(ကောင်း)</label>
                                            <input type="number" id="good" name="good"
                                                   class="form-control form-control-lg input-default"
                                                   value="{{ old('good', $inventory->good) }}">
                                        </div>

                                        <div class="form-group">
                                            <label>ပြုပြင်သုံးစွဲနိုင်(သင့်)</label>
                                            <input type="number" id="fair" name="fair"
                                                   class="form-control form-control-lg input-default"
                                                   value="{{ old('fair', $inventory->fair) }}">
                                        </div>

                                        <div class="form-group">
                                            <label>ပြုပြင်သုံးစွဲ၍မရ(ညံ့)</label>
                                            <input type="number" id="bad" name="bad"
                                                   class="form-control form-control-lg input-default"
                                                   value="{{ old('bad', $inventory->bad) }}">
                                        </div>

                                        <div class="form-group">
                                            <label>ပေါင်း</label>
                                            <input type="number" name="total" id="total" 
                                                   class="form-control form-control-lg input-default"
                                                   value="{{ old('total', $inventory->total) }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>မှတ်ချက်</label>
                                            <input type="text" name="remark"
                                                   class="form-control form-control-lg input-default"
                                                   value="{{ old('remark', $inventory->remark) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-lg btn-success p-3" type="submit">Update</button>
                    <a class="btn btn-secondary btn-lg p-3" href="{{ route('inventory.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Auto-calculate total -->
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
