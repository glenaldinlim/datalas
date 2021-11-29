@extends('layouts.app')

@section('content')
<section class="wrapper d-flex flex-column justify-content-center">
    <div class="container">
        <div class="publication-cover d-flex justify-content-center mb-5">
            <img src="{{ asset('storage/'.$publication->cover) }}" alt="{{ $publication->slug }}" class="img-fluid w-100">
        </div>
        <div class="publication-header">
            <h2 class="text-primary">{{ $publication->title }}</h2>
            <p class="m-0 text-muted">Diterbitkan pada {{ $publication->publish_time }} di <a href="{{ $publication->type == 'News' ? route('front.landing.publications.news.index') : route('front.landing.publications.articles.index') }}" class="font-weight-bold text-primary text-decoration-none">{{ $publication->type == 'News' ? 'Berita' : 'Artikel' }}</a>
            </p>
        </div>
        <div class="publication-body">
            {!! $publication->content !!}
        </div>
    </div>
</section>
@endsection