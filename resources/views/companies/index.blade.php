@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Companies</h2>
        <a href="{{ route('companies.create') }}" class="btn btn-success">Add New Company</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table id="companiesTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
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
            $('#companiesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("companies.index") }}', 
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'website', name: 'website' },
                    { 
                        data: 'logo', 
                        name: 'logo',
                        render: function(data) {
                            return data ? '<img src="/storage/' + data + '" width="50">' : '';
                        },
                        orderable: false,
                        searchable: false
                    },
                    { 
                        data: 'actions', 
                        name: 'actions', 
                        orderable: false, 
                        searchable: false
                    }
                ],
                pageLength: 10
            });
        });
    </script>
@endsection