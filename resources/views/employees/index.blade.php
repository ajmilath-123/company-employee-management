@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Employees</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">Add Employee</a>
    </div>    

    <table class="table table-bordered" id="employees_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
         $('#employees_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("employees.index") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'company', name: 'company.name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ],
            pageLength: 10
        });
    });
</script>
@endsection
