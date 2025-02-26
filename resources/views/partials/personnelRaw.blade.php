    @foreach ($personnels as $key => $personnel)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>Image</td>
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