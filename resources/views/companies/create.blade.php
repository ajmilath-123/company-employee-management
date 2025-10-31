@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Company</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo (min 100x100)</label>
            <input type="file" name="logo" class="form-control" id="logo">
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" name="website" class="form-control" id="website" value="{{ old('website') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Company</button>
    </form>
</div>
@endsection
