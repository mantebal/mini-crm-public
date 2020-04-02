@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-12">
                <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                    @include('partials.form')
                    <input type="submit" value="submit" class="btn btn-primary mt-4"/>
                </form>
            </div>
        </div>
@endsection
