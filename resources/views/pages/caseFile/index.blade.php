    @include('components.layouts.header')
    @include('components.layouts.sidebar')

    {{-- <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head> --}}
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
                <a class="btn btn-primary p-3 mb-2 text-white" href="{{ route('caseFile.create') }}">
                    အမှုတွဲဖိုင်အမည်များ သတ်မှတ်ရန်
                </a>
                @if ($caseFiles->total() > 0)
                    <div class="pagination-summery">
                        <p>
                            Showing <strong>{{ $caseFiles->firstItem() }}</strong> to
                            <strong>{{ $caseFiles->lastItem() }}</strong> of <strong>{{ $caseFiles->total() }}</strong>
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
            <div class="row my-3">
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
            </div>

            {{-- Case file table --}}
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">အမှုတွဲဖိုင် အမည်များ</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-wrap text-center">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>ဖိုင်အမှတ်</th>
                                            <th>ဘီရိုအမှတ်</th>
                                            <th>ဌာနစိတ်</th>
                                            <th>ဖိုင်အမည်</th>
                                            <th>ဖိုင်ဖွင့်သည့်နေ့ရက်</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($caseFiles as $key => $caseFile)
                                            <tr>
                                                <th>{{ $key + 1 }}</th>
                                                <th>{{ $caseFile->fileNumber }}</th>
                                                <th>{{ $caseFile->cabinetName }}</th>
                                                <th>{{ $caseFile->subDeptName }}</th>
                                                <th class="text-justify">{{ $caseFile->fileName }}</th>
                                                <th>{{ $caseFile->fileOpenDate }}</th>
                                                <th>
                                                    <a class="btn btn-success" href="">View Case List</a>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('caseFile.edit', $caseFile->id) }}">Edit</a>
                                                    <form
                                                        onsubmit="return confirm('Are you sure you want to delete this case file?');"
                                                        action="{{ route('caseFile.destroy', $caseFile->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                    <tbody id="caseFileTableBody" class="tableBody">
                                        @foreach ($caseFiles as $key => $caseFile)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $caseFile->fileNumber }}</td>
                                                <td>{{ $caseFile->cabinetName }}</td>
                                                <td>{{ $caseFile->subDeptName }}</td>
                                                <td class="text-justify">{{ $caseFile->fileName }}</td>
                                                <td>{{ $caseFile->fileOpenDate }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{route('caseFile.showCaseLists', $caseFile->id)}}">Case List</a>
                                                    <a class="btn btn-success" href="{{route('caseFile.show', $caseFile->id)}}">View</a>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('caseFile.edit', $caseFile->id) }}">Edit</a>
                                                    <form
                                                        onsubmit="return confirm('Are you sure you want to delete this case file?');"
                                                        action="{{ route('caseFile.destroy', $caseFile->id) }}"
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
                            {{ $caseFiles->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.layouts.footer')
