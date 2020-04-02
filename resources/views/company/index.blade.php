@extends('layouts.app')

@section('content')
    <h1>
        All Companies
    </h1>
    <a href="{{ route('company.create') }}" class="btn btn-primary my-4">Add new Company</a><br/>
    <table class="table table-bordered" id="companies-table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
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
        $('#companies-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route ('api.companies.index') }}',
            columns: [
                { data: 'company_logo'},
                { data: 'name'},
                { data: 'email'},
                { data: 'website'},
                { data: 'show' },
            ]
        });
    }));
</script>
@endsection




