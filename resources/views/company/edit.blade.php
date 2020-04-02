@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Details for {{ $company->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('company.update', $company->id) }}" method="post" enctype="multipart/form-data">

                @method('PATCH')

                @include('partials.form')

                <input type="submit" value="Edit Company" class="btn btn-primary mt-4"/>
            </form>
        </div>
    </div>
@endsection
