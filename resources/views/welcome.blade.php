@extends('layouts.app')

@section('content')
<section id="statistic" class="wrapper bg-white">

</section>
<section id="news" class="wrapper d-flex flex-column justify-content-center">
    <div class=" container">
        <div id="news-header" class="d-flex flex-row justify-content-center align-items-center mb-3">
            <div id="news-header-title">
                <h2 class="text-primary m-0">Berita Terkini</h2>
                <hr class="hr-primary my-2 w-75">
                <p>Jelajahi berita komoditas terkini</p>
            </div>
            <div id="news-header-action" class="ml-auto">
                <button type="button" class="btn btn-primary news-prev "><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="btn btn-primary news-next "><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <div id="news-body">
            <div id="news-carousel" class="row">
                @foreach($news as $news)
                    <x-publication-card :data="$news" />
                @endforeach
            </div>
            <div class="text-center">
                <a href="" class="btn btn-primary text-white py-1 px-5">Lihat berita lainnya</a>
            </div>
        </div>
    </div>
</section>
<section id="article" class="wrapper bg-white d-flex flex-column justify-content-center">
    <div class="container">
        <div id="article-header" class="d-flex flex-row justify-content-center align-items-center mb-3">
            <div id="article-header-title">
                <h2 class="text-primary m-0">Artikel Terkini</h2>
                <hr class="hr-primary my-2 w-75">
                <p>Jelajahi artikel komoditas terkini</p>
            </div>
            <div id="article-header-action" class="ml-auto">
                <button type="button" class="btn btn-primary article-prev "><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="btn btn-primary article-next "><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <div id="article-body">
            <div id="article-carousel" class="row">
                @foreach($articles as $article)
                    <x-publication-card :data="$article" />
                @endforeach
            </div>
            <div class="text-center">
                <a href="" class="btn btn-primary text-white py-1 px-5">Lihat artikel lainnya</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css-lib')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endpush

@push('js-lib')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endpush

@push('js-additional')
<script>
    $(document).ready(function(){
        $('#news-carousel').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            prevArrow: $('.news-prev'),
            nextArrow: $('.news-next'),
        });
        $('#article-carousel').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            prevArrow: $('.article-prev'),
            nextArrow: $('.article-next'),
        });
    });
</script>
@endpush