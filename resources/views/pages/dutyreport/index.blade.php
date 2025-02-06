    @include('components.layouts.header')
    @include('components.layouts.sidebar')


    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text text-center">
                        <h2>ပြည်ထဲရေးဝန်ကြီးဌာန၊ ဝန်ကြီးရုံး၊ e-Government ဌာန တာဝန်မှူး အစီရင်ခံစာ</h2>
                    </div>
                </div>
            </div>

            @if (auth()->user()->hasRole(['staff', 'super-admin']))
                <div class="d-flex justify-content-between mb-3">
                    <a class="btn btn-primary p-3 mb-2 text-white" href="{{ route('pages.dutyreport.create') }}">
                        တာဝန်မှူးအစီရင်ခံစာရေးရန်
                    </a>
            @endif
            @if ($reports->total() > 0)
                <div class="pagination-summery">
                    <p>
                        Showing <strong>{{ $reports->firstItem() }}</strong> to
                        <strong>{{ $reports->lastItem() }}</strong> of <strong>{{ $reports->total() }}</strong>
                        results.
                    </p>
                </div>
        </div>
        @endif

        <div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <!-- Temporary Duty Reports Table -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title font-weight-bold">ယာယီ တာဝန်မှူးအစီရင်ခံစာများ</h2>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-wrap text-center">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>စဉ်</th>
                                        <th>လက်ခံသူအမည်</th>
                                        <th>လွှဲပြောင်းသူအမည်</th>
                                        <th>လွှဲပြောင်းသည့်နေ့ရက်</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($temporaryReports as $key => $tempReport)
                                        <tr>
                                            <th>{{ $key + 1 }}</th>
                                            <td>{{ $tempReport->reciverName ?? 'Panding' }}</td>
                                            <td>{{ $tempReport->transferPersonName ?? 'Panding' }}</td>
                                            <td>{{ $tempReport->transferDate ?? 'Panding' }}
                                            </td>
                                            <td>
                                                {{-- Officer Role: Transfer and Receive Duty --}}

                                                @if (auth()->user()->hasAnyRole('officer', 'super-admin') && !auth()->user()->hasRole('deputy-director'))
                                                    {{-- Transfer Duty --}}
                                                    @if (is_null($tempReport->transferDate) && is_null($tempReport->receiverPersonName))
                                                        <a href="{{ route('temporary-duty-report.editTransfer', $tempReport->id) }}"
                                                            class="btn btn-warning">Transfer Duty</a>
                                                    @else
                                                        <button class="d-none"><button>
                                                    @endif

                                                    {{-- Receive Duty --}}
                                                    @if ($tempReport->transfer_user_id === auth()->user()->id)
                                                        <button class="d-none"></button>
                                                    @elseif ($tempReport->receiver_user_id === auth()->user()->id)
                                                        <button class="d-none"></button>
                                                    @else
                                                        <a href="{{ route('temporary-duty-report.editReceiver', $tempReport->id) }}"
                                                            class="btn btn-success">Receive Duty</a>
                                                    @endif

                                                    @if (auth()->user()->hasRole('super-admin'))
                                                        <a href="{{ route('temporary-duty-report.editTransfer', $tempReport->id) }}"
                                                            class="btn btn-info">Edit Transfer</a>
                                                        <a href="{{ route('temporary-duty-report.editReceiver', $tempReport->id) }}"
                                                            class="btn btn-success">Edit Receiver</a>
                                                    @endif
                                                @endif

                                                {{-- Deputy Director Role --}}
                                                @if (auth()->user()->hasRole('deputy-director'))
                                                    @if (is_null($tempReport->ddName))
                                                        <a href="{{ route('temporary-duty-report.editDeputyDirectorApprove', $tempReport->id) }}"
                                                            class="btn btn-primary">Approve</a>
                                                    @else
                                                        <button class="d-none">Approved</button>
                                                    @endif

                                                    <a href="{{ route('temporary-duty-report.editDeputyDirectorApprove', $tempReport->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                @endif

                                                {{-- Director Role --}}
                                                @if (auth()->user()->hasRole('director'))
                                                    <a href="{{ route('temporary-duty-report.editDirectorApprove', $tempReport->id) }}"
                                                        class="btn btn-primary">Approve</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No temporary
                                                reports found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Submitted Duty Reports Table -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title font-weight-bold">ရက်အလိုက် တာဝန်မှူးအစီရင်ခံစာများ</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-wrap text-center">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>စဉ်</th>
                                        <th>တာဝန်မှူးတာဝန်လက်ခံသူ အမည်</th>
                                        <th>ရာထူး</th>
                                        <th>လက်ခံသည့်နေ့ရက်</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reports as $key => $report)
                                        <tr>
                                            <th>{{ $key + 1 }}</th>
                                            <td>{{ $report->reciverName }}</td>
                                            <td>{{ $report->reciverRank }}</td>
                                            <td>{{ \Carbon\Carbon::parse($report->reciveDate)->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('pages.dutyreport.show', $report->id) }}"
                                                    class="btn btn-success">View</a>

                                                @if (Auth::user()->hasAnyRole('staff', 'officer', 'super-admin'))
                                                    <a href="{{ route('pages.dutyreport.edit', $report->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                @endif
                                                <form
                                                    @if (auth()->user()->hasRole('super-admin')) action="{{ route('pages.dutyreport.destroy', $report->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button> @endif
                                                    </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No duty reports
                                                found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $reports->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    @include('components.layouts.footer')
