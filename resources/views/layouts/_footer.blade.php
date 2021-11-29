<footer class="d-flex flex-column bg-primary" id="footer">
    <div class="container text-center my-auto" id="footer-container">
        <div class="row mb-3">
            <div class="col"><img src="{{ asset('img/logo-white.png') }}" height="90px"></div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <h6 class="text-white">Datalas adalah sebuah sistem informasi transparansi data produksi komoditas di Jawa Barat</h6>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <a class="text-decoration-none text-white" href="{{ route('front.landing.index') }}">Beranda</a>
            </div>
            <div class="col">
                <a class="text-decoration-none text-white" href="{{ route('front.landing.about') }}">Tentang</a>
            </div>
            <div class="col">
                <a class="text-decoration-none text-white" href="{{ route('front.landing.production') }}">Data produksi</a>
            </div>
            <div class="col">
                <a class="text-decoration-none text-white" href="{{ route('front.landing.publications.index') }}">Publikasi</a>
            </div>
            <div class="col">
                <a class="text-decoration-none text-white" href="{{ route('front.landing.contact.index') }}">Kontak</a>
            </div>
        </div>
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-auto">
                <a class="text-white" href="{{ $socialMedia->facebook_url }}"><i class="fab fa-facebook-f fa-2x"></i></a>
            </div>
            <div class="col-auto">
                <a class="text-white" href="{{ $socialMedia->twitter_url }}"><i class="fab fa-twitter fa-2x"></i></a>
            </div>
            <div class="col-auto">
                <a class="text-white" href="{{ $socialMedia->instagram_url }}"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
        </div>
    </div>
</footer>