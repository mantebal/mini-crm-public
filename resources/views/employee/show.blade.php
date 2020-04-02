@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <h1> Showing {{ $employee->first_name . ' ' . $employee->last_name }}</h1>
            </div>
            @isset($employee->email)
                <div class="row">
                 <p>Email: {{ $employee->email }}</p>
                </div>
            @endisset
            @isset($employee->phone)
                <div class="row">
                    <p>Phone: {{ $employee->phone }}</p>
                </div>
            @endisset
            <div class="row">
                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning mr-4">Edit</a>
                <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection


