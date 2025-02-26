    @include('components.layouts.header')
    @include('components.layouts.sidebar')

    
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text text-center">
                        <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ e-Government ဌာန ဝန်ထမ်းကိုယ်ရေးအချက်အလက်များ</h2>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-primary p-3 mb-2 text-white" href="{{ route('personnel.create') }}">
                    ကိုယ်ရေးအချက်အလက်ဖြည့်သွင်းရန်
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

            {{-- Filter Field --}}
            {{-- <div class="row my-3">
                <div class="col-xl-12 col-xxl-12">
                    <form action="{{ route('caseFile.index') }}" method="GET" class="row g-3">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cabinetName">ဘီရိုအမှတ်ဖြင့် ရှာရန်</label>
                                <select name="cabinetName" id="cabinetName" class="form-control">
                                    <option value="">All</option>
                                    @foreach ($cabinetNames as $cabinet)
                                        <option value="{{ $cabinet }}"
                                            {{ request('cabinetName') == $cabinet ? 'selected' : '' }}>
                                            {{ $cabinet }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subDeptName">ဌာနစိတ်အမည်ဖြင့် ရှာရန်</label>
                                <select name="subDeptName" id="subDeptName" class="form-control">
                                    <option value="">All</option>
                                    @foreach ($subDeptNames as $subDept)
                                        <option value="{{ $subDept }}"
                                            {{ request('subDeptName') == $subDept ? 'selected' : '' }}>
                                            {{ $subDept }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Buttons (Spanning Two Columns) -->
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                            <a href="{{ route('caseFile.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            </div> --}}

            {{-- Case file table --}}
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">ကိုယ်ရေးအချက်အလက်များ</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-wrap text-center" id="personnelTableBody" >
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>ဓာတ်ပုံ</th>
                                            <th>ကိုယ်ပိုင်အမှတ်</th>
                                            <th>အဆင့်</th>
                                            <th>အမည်</th>
                                            <th>လက်ရှိတာဝန်</th>
                                            <th>လက်ရှိတပ်ဖွဲ့/ဌာန</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                        @foreach ($personnels as $key => $personnel)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset('public/' . $personnel->profileImage) }}" alt="profileImage" width="100px" height="100px"></td>
                                                <td>{{ $personnel->personnelId }}</td>
                                                <td>{{ $personnel->personnelRank }}</td>
                                                <td>{{ $personnel->personnelName }}</td>
                                                <td>{{ $personnel->currentDuty }}</td>
                                                <td>{{ $personnel->currentDept }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Action buttons"
                                                        style="display: flex; gap: 8px; align-items: center;">
                                                        <a class="btn btn-success"
                                                            href="{{ route('personnel.show', $personnel->id) }}">View</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('personnel.edit', $personnel->id) }}">Edit</a>
                                                        <form
                                                            onsubmit="return confirm('Are you sure you want to delete this case list?');"
                                                            action="{{ route('personnel.destroy', $personnel->id) }}"
                                                            method="POST" style="display: inline; margin-bottom: 0;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            console.log("Initializing DataTable...");
    
            // Check if the table exists before applying DataTable
            if ($('#personnelTableBody').length) {
                $('#personnelTableBody').DataTable({
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
