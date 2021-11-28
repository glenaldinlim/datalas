@extends('layouts.app')

@section('content')
<section class="wrapper d-flex flex-column justify-content-center">
    <div class=" container my-5">
        <div class="row">
            @foreach($publications as $publication)
                <x-publication-card :data="$publication" />
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $publications->links() }}
        </div>
    </div>
</section>
@endsection