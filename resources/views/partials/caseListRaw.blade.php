@foreach ($caseLists as $key => $caseList)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $caseList->caseFile ? $caseList->caseFile->fileName : 'N/A' }}</td>
        <td>
            @if ($caseList->status == 'Pending')
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
            <div class="btn-group" role="group" aria-label="Action buttons">
                <a target="_blank" class="btn btn-success" style="margin-right: 8px;"
                    href="{{ route('caseList.show', $caseList->id) }}">View</a>
                <a class="btn btn-primary" style="margin-right: 8px;"
                    href="{{ route('caseList.edit', $caseList->id) }}">Edit</a>
                <form onsubmit="return confirm('Are you sure you want to delete this case list?');"
                    action="{{ route('caseList.destroy', $caseList->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </td>
    </tr>
@endforeach
