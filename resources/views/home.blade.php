@extends('Template_Admin.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>xin chào {{Auth::user()->name}} !</h1></div>
            </div>
        </div>
    </div>
</div>
@endsection
