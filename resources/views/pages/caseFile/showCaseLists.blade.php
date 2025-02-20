@include('components.layouts.header')
@include('components.layouts.sidebar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2>{{ $caseFile->fileName }} - အမှုတွဲများ</h2>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a class="btn btn-primary p-3 mb-2 text-white" href="{{ route('caseFile.index') }}">
                Back
            </a>
        </div>

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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caseLists as $key => $caseList)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $caseList->caseFile ? $caseList->caseFile->fileName : 'N/A' }}</td>
                                        <td>
                                            @if($caseList->status == 'Pending')
                                                <label class="badge bg-warning">{{ $caseList->status }}</label>
                                            @elseif($caseList->status == 'Progress')
                                                <label class="badge bg-info">{{ $caseList->status }}</label>
                                            @elseif($caseList->status == 'Completed')
                                                <label class="badge bg-success">{{ $caseList->status }}</label>
                                            @else
                                                <label class="badge bg-secondary">{{ $caseList->status }}</label>
                                            @endif
                                        </td>
                                        <td>{{ $caseList->inLetterDate }}</td>
                                        <td>{{ $caseList->inLetterNumber }}</td>
                                        <td>{{ $caseList->inLetterContent }}</td>
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

@include('components.layouts.footer')
