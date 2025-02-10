    @include('components.layouts.header')
    @include('components.layouts.sidebar')

    
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text text-center">
                        <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ e-Government ဌာန အမှုတွဲဖိုင်များ</h2>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-primary p-3 mb-2 text-white" href="{{ route('caseList.create') }}">
                    အမှုတွဲများရေးသွင်းရန်
                </a>
                @if ($caseLists->total() > 0)
                    <div class="pagination-summery">
                        <p>
                            Showing <strong>{{ $caseLists->firstItem() }}</strong> to
                            <strong>{{ $caseLists->lastItem() }}</strong> of <strong>{{ $caseLists->total() }}</strong>
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
                            <h2 class="card-title font-weight-bold">အမှုတွဲများ</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-wrap text-center">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>ဖိုင်အမည်</th>
                                            <th>Status</th>
                                            <th>ရက်စွဲ</th>
                                            <th>စာအမှတ်</th>
                                            <th>အကြောင်းအရာ</th>
                                            <th>ဝင်စာတင်သည့်မှတ်ချက်</th>
                                            <th>ဝင်စာတင်သည့်ရက်</th>
                                            <th>ဝင်စာပြန်ကျသည့်ရက်</th>
                                            <th>အမှုတွဲပြီးပြတ်သည့်နေ့</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="caseListTableBody">
                                        @foreach ($caseLists as $key => $caseList)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $caseList->caseFile ? $caseList->caseFile->fileName : 'N/A' }}</td>
                                                <td>
                                                    @if($caseList->status == 'Pending')
                                                        <label class="badge bg-warning mx-1">{{ $caseList->status }}</label>
                                                    @elseif($caseList->status == 'Progress')
                                                        <label class="badge bg-info mx-1">{{ $caseList->status }}</label>
                                                    @elseif($caseList->status == 'Completed')
                                                        <label class="badge bg-success mx-1">{{ $caseList->status }}</label>
                                                    @else
                                                        <label class="badge bg-secondary mx-1">{{ $caseList->status }}</label>
                                                    @endif
                                                </td>
                                                <td>{{ $caseList->inLetterDate }}</td>
                                                <td class="text-justify">{{ $caseList->inLetterNumber }}</td>
                                                <td class="text-justify">{{ $caseList->inLetterContent }}</td>
                                                <td class="text-justify">{{ $caseList->inLetterRemark }}</td>
                                                <td>{{ $caseList->inLetterToDps }}</td>
                                                <td>{{ $caseList->inLetterReturnDate }}</td>
                                                <td>{{ $caseList->caseCompletedDate }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Action buttons" style="display: flex; gap: 8px; align-items: center;">
                                                        <a class="btn btn-success" href="{{ route('caseList.show', $caseList->id) }}">View</a>
                                                        <a class="btn btn-primary" href="{{ route('caseList.edit', $caseList->id) }}">Edit</a>
                                                        <form
                                                            onsubmit="return confirm('Are you sure you want to delete this case list?');"
                                                            action="{{ route('caseList.destroy', $caseList->id) }}"
                                                            method="POST" style="display: inline; margin-bottom: 0;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="btn-group" role="group" aria-label="Action buttons">
                                                    <a href="{{route('caseList.show', $caseList->id)}}" class="btn btn-success mr-1 p-2">View</a>
                                                    <a href="{{ route('caseList.edit', $caseList->id) }}" class="btn btn-primary mr-1 p-2">Edit</a>
                                                    <a href="" class="btn btn-danger p-2"> Delete</a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $caseLists->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>   
         $(document).ready(function () {
    // Trigger the AJAX call on keyup
    $('#searchInput').on('keyup', function () {
        var keyword = $(this).val(); // Get the value from the input box

        // Make an AJAX request
        $.ajax({
            url: '{{ route('caseList.search') }}', // Your Laravel route for search
            method: 'GET',
            data: { keyword: keyword },
            success: function (response) {
                // Update the table body with the search results
                $('#caseListTableBody').html(response);

                // Highlight the matched text (excluding buttons)
                if (keyword.length > 0) {
                    $('#caseListTableBody').find('td:not(:has(button, a))').each(function () {
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
