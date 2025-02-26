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
                    <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ ဌာနများ</h2>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a class="btn btn-primary p-3 mb-2 text-white" href="{{ route('department.create') }}">
                ဌာနအသစ်ထည့်ရန်
            </a>
            {{-- @if ($departments->total() > 0)
                <div class="pagination-summery">
                    <p>
                        Showing <strong>{{ $departments->firstItem() }}</strong> to
                        <strong>{{ $departments->lastItem() }}</strong> of
                        <strong>{{ $departments->total() }}</strong>
                        results.
                    </p>
                </div>
            @endif --}}
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
                        <h2 class="card-title font-weight-bold">ဌာနများ</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-wrap text-center" id="departmentTable">
                                <thead class="design">
                                    <tr>
                                        <th>စဉ်</th>
                                        <th>ဌာနအမှတ်</th>
                                        <th>ဌာနအမည်အတိုကောက်</th>
                                        <th>ဌာနအမည်</th>
                                        <th>မှတ်ချက်</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody class="tableBody">
                                    @foreach ($departments as $key => $department)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $department->deptNo }}</td>
                                            <td>{{ $department->deptShortName }}</td>
                                            <td>{{ $department->deptName }}</td>
                                            <td>{{ $department->remark }}</td>
                                            <td>
                                                <a class="btn btn-success"
                                                    href="{{ route('department.show', $department->id) }}">View</a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('department.edit', $department->id) }}">Edit</a>
                                                <form
                                                    onsubmit="return confirm('Are you sure you want to delete this department?');"
                                                    action="{{ route('department.destroy', $department->id) }}"
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
        if ($('#departmentTable').length) {
            $('#departmentTable').DataTable({
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
            console.error("Error: Table with ID 'departmentTable' not found.");
        }
    });
</script>

@include('components.layouts.footer')
