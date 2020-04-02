@extends('layouts.app')

@section('content')
    <h1>
        All Employees
    </h1>
    <a href="{{ route('employee.create') }}" class="btn btn-primary my-4">Add new Employee</a><br/>
    <table class="table table-bordered" id="employee-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('script')
    <script defer>
        $(document).ready($(function() {
            $('#employee-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route ('api.employees.index') }}',
                columns: [
                    { data: 'first_name'},
                    { data: 'last_name'},
                    { data: 'email'},
                    { data: 'phone'},
                    { data: 'company_name' },
                    { data: 'show' },
                ]
            });
        }));
    </script>
@endsection





