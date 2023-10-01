<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <div class="d-flex w-100 justify-content-between align-items-center" id="navItems">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('user/assets/icon/karaven_txt.svg') }}" alt="KaraVen Logo"></a>
            <form action="{{ route('search') }}" method="POST" class=" search">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari nama lagu favoritmu" aria-label="cari lagu" aria-describedby="searchLagu" name="key">
                    <button class="btn" type="submit" id="searchLagu"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</nav>

