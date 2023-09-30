<header class="d-flex align-items-center">
    <div class="container">
        <div class="row flex-wrap text-center justify-content-center" id="headerForm">
            <h1>Temukan Berbagai Lagu Menarik</h1>
            <form action="{{ route('search') }}" method="POST" class="col-md-8 col-lg-6 search">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari nama lagu favoritmu" aria-label="cari lagu" aria-describedby="searchLagu" name="key">
                    <button class="btn" type="submit" id="searchLagu"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</header>

