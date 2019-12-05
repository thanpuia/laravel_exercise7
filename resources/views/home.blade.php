@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="background-color:#f0f0f5;">
            @if (session('status_delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('status_delete') }}
            </div>
            @endif

            Welcome!

        </div>
    </div>
</div>
@endsection
