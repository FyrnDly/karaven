@guest

<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <div class="d-flex w-100 justify-content-around align-items-center" id="navItems">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('user/assets/icon/karaven_txt.svg') }}" alt="KaraVen Logo"></a>
        </div>
    </div>
</nav>
@endguest


@auth
<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <div class="d-flex w-100 justify-content-around align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('user/assets/icon/karaven_txt.svg') }}" alt="KaraVen Logo"></a>
            <div id="navItems"></div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button class="btn btn-black no-fill dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <p>Hai, <b>{{ Auth::user()->name }}</b></p>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Keluar</button></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logoutModalLabel">Keluar Sebagai {{ Auth::user()->name }}</h1>
                <button type="button" class="btn btn-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Keluar Sebagai {{ Auth::user()->name }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-white">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endauth
