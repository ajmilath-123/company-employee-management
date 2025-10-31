{{-- resources/views/partials/actions.blade.php --}}

<a href="{{ route('employees.show', $model->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('employees.edit', $model->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('employees.destroy', $model->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
