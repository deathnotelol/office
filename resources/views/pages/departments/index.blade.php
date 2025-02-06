    @include('components.layouts.header')
    @include('components.layouts.sidebar')

    <head>
        {{-- <style>
            .highlight {
                background-color: yellow;
                font-weight: bold;
            }
        </style> --}}
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
                @if ($departments->total() > 0)
                    <div class="pagination-summery">
                        <p>
                            Showing <strong>{{ $departments->firstItem() }}</strong> to
                            <strong>{{ $departments->lastItem() }}</strong> of
                            <strong>{{ $departments->total() }}</strong>
                            results.
                        </p>
                    </div>
                @endif
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
                    <form action="{{ route('department.index') }}" method="GET" class="row g-3">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cabinetName">ဌာနအမည်ဖြင့် ရှာရန်</label>
                                <select name="cabinetName" id="cabinetName" class="form-control">
                                    <option value="">All</option>
                                    @foreach ($deptNames as $deptName)
                                        <option value="{{ $deptName }}"
                                            {{ request('deptName') == $deptName ? 'selected' : '' }}>
                                            {{ $deptName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Buttons (Spanning Two Columns) -->
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                            <a href="{{ route('department.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            </div> --}}

            {{-- Case file table --}}
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">ဌာနများ</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-wrap text-center">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>ဌာနအမှတ်</th>
                                            <th>ဌာနအမည်အတိုကောက်</th>
                                            <th>ဌာနအမည်</th>
                                            <th>မှတ်ချက်</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="departmentTableBody">
                                        @foreach ($departments as $key => $department)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $department->deptNo }}</td>
                                                <td>{{ $department->deptShortName }}</td>
                                                <td>{{ $department->deptName }}</td>
                                                <td>{{ $department->remark }}</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('department.edit', $department->id) }}">Edit</a>
                                                    <form
                                                        onsubmit="return confirm('Are you sure you want to delete this case file?');"
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
                        <div class="d-flex justify-content-center">
                            {{ $departments->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // $(document).ready(function () {
        // // Trigger the AJAX call on keyup
        // $('#searchInput').on('keyup', function () {
        //     var keyword = $(this).val(); // Get the value from the input box

        //     // Make an AJAX request
        //     $.ajax({
        //         url: '{{ route('department.search') }}', // Your Laravel route for search
        //         method: 'GET',
        //         data: { keyword: keyword },
        //         success: function (response) {
        //             // Update the table body with the search results
        //             $('#departmentTableBody').html(response);
        //         },
        //         error: function (xhr) {
        //             console.error('Search failed: ', xhr);
        //         }
        //     });
        // });
        // });

        $(document).ready(function () {
    // Trigger the AJAX call on keyup
    $('#searchInput').on('keyup', function () {
        var keyword = $(this).val(); // Get the value from the input box

        // Make an AJAX request
        $.ajax({
            url: '{{ route('department.search') }}', // Your Laravel route for search
            method: 'GET',
            data: { keyword: keyword },
            success: function (response) {
                // Update the table body with the search results
                $('#departmentTableBody').html(response);

                // Highlight the matched text (excluding buttons)
                if (keyword.length > 0) {
                    $('#departmentTableBody').find('td:not(:has(button, a))').each(function () {
                        var content = $(this).text();
                        var highlighted = content.replace(
                            new RegExp(keyword, 'gi'),
                            function (match) {
                                return `<span class="highlight">${match}</span>`;
                            }
                        );
                        $(this).html(highlighted);
                    });
                }

                // Rebind event handlers for Edit and Delete buttons
                rebindButtonHandlers();
            },
            error: function (xhr) {
                console.error('Search failed: ', xhr);
            }
        });
    });

    // Rebind Edit and Delete button event handlers
    function rebindButtonHandlers() {
        // Attach any specific logic for Edit/Delete buttons if necessary
        console.log("Event handlers reattached.");
    }
});
    </script>
    @include('components.layouts.footer')
