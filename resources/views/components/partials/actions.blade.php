<a href="{{ route('companies.show', $model->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('companies.edit', $model->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('companies.destroy', $model->id) }}" method="POST" class="d-inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
