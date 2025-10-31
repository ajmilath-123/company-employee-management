@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employee Details</h2>
    <div class="card">
        <div class="card-header">
            {{ $employee->first_name }} {{ $employee->last_name }}
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
            <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
            <p><strong>Company:</strong> {{ $employee->company ? $employee->company->name : 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $employee->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone ?? 'N/A' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
