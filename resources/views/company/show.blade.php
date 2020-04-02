@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <h1> Showing {{ $company->name }}</h1>
            </div>
            <div class="row">
            @isset($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" alt="logo" class="mb-2"/>
            @endisset
            </div>
            @isset($company->email)
                <div class="row">
                 <p>Email: {{ $company->email }}</p>
                </div>
            @endisset
            @isset($company->website)
                <div class="row">
                    <p>Website: <a href="{{ $company->website }}">{{ $company->website }}</a></p>
                </div>
            @endisset
            <div class="row my-2">
                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-warning mr-3">Edit</a>
                <form action="{{ route('company.destroy', $company->id) }}" method="post">
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection


