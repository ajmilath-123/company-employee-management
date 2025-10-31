@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Company Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>

            @if($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="150" class="mb-3">
            @endif

            <p><strong>Email:</strong> {{ $company->email ?? 'N/A' }}</p>
            <p><strong>Website:</strong> 
                @if($company->website)
                    <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                @else
                    N/A
                @endif
            </p>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
