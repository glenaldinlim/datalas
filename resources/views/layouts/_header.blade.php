<header class="d-flex flex-column" id="{{ $heroTitle == NULL ? 'hero' : 'hero-2' }}">
    <nav class="navbar navbar-white navbar-expand-md navigation-clean-button">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front.landing.index') }}"><img class="img-fluid" src="{{ asset('img/logo-white.png') }}" width="43px"></a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2">
                <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('front.landing.about') }}">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('front.landing.production') }}">Data Produksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('front.landing.publications.index') }}">Publikasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('front.landing.contact.index') }}">Kontak</a></li>
                </ul>
                @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->role_name == 'Bod' || Auth::user()->role_name == 'Admin' || Auth::user()->role_name == 'Webmaster')
                            <a href="{{ route('backend.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @elseif(Auth::user()->role_name == 'Community')
                            <a href="{{ route('front.community.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <a href="#" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @endif
                    @else
                        <span class="navbar-text actions ml-4">
                            <a class="btn btn-primary action-button" role="button" href="{{ route('login') }}">Login</a>
                        </span>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
    @if($heroTitle == NULL)
    <div class="container text-center mt-auto mb-auto">
        <div class="mb-5">
            <h1 class="display-4 text-white font-weight-bold">Welcome To</h1>
            <h1 class="display-4 text-primary font-weight-bold">Datalas</h1>
        </div>
        <div>
            <h6 class="text-white">Pusat informasi data komoditas Provinsi Jawa Barat</h6>
        </div>
    </div>
    @else
    <div class="container mt-auto mb-5">
        <div class="mb-5">
            <h1 class=" text-white font-weight-bold">{{ $heroTitle }}</h1>
        </div>
    </div>
    @endif
    
</header>