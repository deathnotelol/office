@include('components.layouts.header')
@include('components.layouts.sidebar')

<head>
    <style>


    </style>
    <!-- DataTables CSS -->
</head>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ e-Government ဌာန၊ စက်ပစ္စည်းအမျိုးအစားများ</h2>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a class="btn btn-primary p-3 mb-2 text-white" href="{{ route('inventoryCat.create') }}">
                စက်ပစ္စည်းအမျိုးအစားထည့်ရန်
            </a>
        </div>

        <div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        {{-- Case file table --}}
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title font-weight-bold">စက်ပစ္စည်းအမျိုးအစားများ</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-wrap text-center" id="inventoryCatTable">
                                <thead class="design">
                                    <tr>
                                        <th>စဉ်</th>
                                        <th>စက်ပစ္စည်းအမျိုးအစား</th>
                                        <th>မှတ်ချက်</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody class="tableBody">
                                    @foreach ($inventoryCategory as $key=>$inventoryCat)
                                        <tr>
                                            <td>{{ engToMyanmarNumber($key + 1) }}</td>
                                            <td style="text-align: justify">{{ $inventoryCat->inventoryCatName }}</td>
                                            <td>{{ $inventoryCat->inventoryCatRemark }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('inventoryCat.edit', $inventoryCat->id) }}">Edit</a>
                                                <form
                                                    onsubmit="return confirm('Are you sure you want to delete this department?');"
                                                    action="{{ route('inventoryCat.destroy', $inventoryCat->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                        {{ $departments->onEachSide(1)->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        console.log("Initializing DataTable...");

        // Check if the table exists before applying DataTable
        if ($('#inventoryCatTable').length) {
            $('#inventoryCatTable').DataTable({
                "processing": true, // Show processing indicator
                "serverSide": false, // Disable server-side processing
                "paging": true, // Enable pagination
                "searching": true, // Enable searching
                "ordering": true, // Enable column sorting
                "pageLength": 10, // Set the page length to 25
                "lengthMenu": [10, 25, 50, 100], // Options for the number of rows per page
                "order": [
                    [0, 'asc']
                ], // Default sorting (Column 0 ascending)
                "dom": 'l<"toolbar">frtip', // Customize the layout
            });
            console.log("DataTable initialized successfully.");
        } else {
            console.error("Error: Table with ID 'inventoryCatTable' not found.");
        }
    });
</script>

@include('components.layouts.footer')
