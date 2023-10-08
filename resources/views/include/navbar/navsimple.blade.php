<nav class="navbar navbar-expand-md fixed-top navbar-dark">
    <div class="container">
        <a class="navbar-brand d-none d-md-block" href="{{ route('home') }}"><img src="{{ url('user/assets/icon/karaven_txt.svg') }}" alt="KaraVen Logo"></a>
        <a class="navbar-brand d-block d-md-none" href="{{ route('home') }}"><img src="{{ url('user/assets/icon/karaven.svg') }}" alt="KaraVen Logo"></a>
        @auth
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-md-center d-flex gap-2 flex-md-row-reverse" id="navItems">
                <li class="nav-item dropdown">
                    <button class="btn btn-black no-fill dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <p>Hai, <b>{{ Auth::user()->name }}</b></p>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @if(Auth::user()->role == 'admin' or Auth::user()->role == 'root')
                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin</a></li>
                        @endif
                        @if(Auth::user()->role == 'root')
                        <li><a class="dropdown-item" href="{{ route('dashboard.index') }}">Super Admin</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Keluar</button></li>
                    </ul>
                </li>
				<form action="{{ route('search') }}" method="POST" class="nav-item search">
			    @csrf
				    <div class="input-group">
				        <input type="text" class="form-control" placeholder="cari nama lagu favoritmu" aria-label="cari lagu" aria-describedby="searchLagu" name="key">
				        <button class="btn" type="submit" id="searchLagu"><i class="bi bi-search"></i></button>
				    </div>
				</form>
            </ul>
		</div>
	    @endauth

		@guest
		<form action="{{ route('search') }}" method="POST" class="ms-auto search">
	    @csrf
		    <div class="input-group">
		        <input type="text" class="form-control" placeholder="cari nama lagu favoritmu" aria-label="cari lagu" aria-describedby="searchLagu" name="key">
		        <button class="btn" type="submit" id="searchLagu"><i class="bi bi-search"></i></button>
            </div>
		</form>
		@endguest
    </div>
</nav>

@auth
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
