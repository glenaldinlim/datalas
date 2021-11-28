@extends('layouts.app')

@section('content')
<section class="wrapper">
    <div class="container d-flex flex-column justify-content-center align-items-center my-5">
        <img src="{{ asset('img/logo.png') }}" alt="datalas-logo" width="150px">
        <p class="text-dark mt-5">
            {!! $about !!}
        </p>
    </div>
</section>
@endsection