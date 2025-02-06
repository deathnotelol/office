
@foreach ($departments as $key => $department)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $department->deptNo }}</td>
        <td>{{ $department->deptShortName }}</td>
        <td>{{ $department->deptName }}</td>
        <td>{{ $department->remark }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('department.edit', $department->id) }}">Edit</a>
            <form onsubmit="return confirm('Are you sure you want to delete this case file?');"
                action="{{ route('department.destroy', $department->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

