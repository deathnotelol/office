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
        <a class="btn btn-primary" href="{{ route('caseFile.edit', $caseFile->id) }}">Edit</a>
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
