@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Details for {{ $employee->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('employee.update', $employee->id) }}" method="post">

                @method('PATCH')

                @include('partials.employee-form')

                <input type="submit" value="Edit Employee" class="btn btn-primary mt-4"/>
            </form>
        </div>
    </div>
@endsection
