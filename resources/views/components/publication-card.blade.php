<div class="col-md-4 col-sm-6 col-12 mb-3">
    <div class="card">
        <div class="position-absolute bg-primary text-white py-2 px-4">{{ $data->type == 'News' ? 'Berita' : 'Artikel' }}</div>
        <img src="{{ asset('storage/'.$data->cover) }}" alt="{{ $data->slug }}" class="card-img-top img-fluid">
        <div class="card-body">
            <div class="card-title">
                <a href="{{ $data->type == 'News' ? route('front.landing.publications.news.show', ['slug' => $data->slug]) : route('front.landing.publications.articles.show', ['slug' => $data->slug]) }}" class="font-weight-bold text-dark text-decoration-none">{{ $data->title }}</a>
            </div>
            <p class="m-0"><small class="text-muted">{{ $data->publish_time }}</small></p>
            <div class="card-text">{{ \Str::limit($data->content, 100, $end='...') }}</div>
        </div>
    </div>
</div>