@extends('layouts.app')

@section('content')
    <h2>Edit Company</h2>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $company->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" 
                   value="{{ old('email', $company->email) }}">
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" name="website" id="website" class="form-control" 
                   value="{{ old('website', $company->website) }}">
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control" onchange="previewLogo(event)">
            <img id="logo-preview" src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="100" class="mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

@section('script')
<script>
    function previewLogo(event) {
        const input = event.target;
        const preview = document.getElementById('logo-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result; // Set new image preview
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>