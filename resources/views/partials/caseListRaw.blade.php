@foreach ($caseLists as $key => $caseList)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $caseList->file_id }}</td>
    <td>{{ $caseList->status }}</td>
    <td>{{ $caseList->inLetterDate }}</td>
    <td class="text-justify">{{ $caseList->inLetterNumber }}</td>
    <td class="text-justify">{{ $caseList->inLetterContent }}</td>
    <td>{{ $caseList->inLetterToDps }}</td>
    <td>{{ $caseList->inLetterReturnDate }}</td>
    <td>
        <a class="btn btn-success" href="{{ route('caseList.show', $caseList->id) }}">View</a>
        <a class="btn btn-primary" href="{{ route('caseList.edit', $caseList->id) }}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this case list?');"
            action="{{ route('caseList.destroy', $caseList->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach