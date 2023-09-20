<div class="row nav-list">
    <a href="{{ route('home') }}" class="btn {{ isset($isHome) && $isHome ? 'btn-primary' : 'btn-black no-fill' }}">Daftar Lagu</a>
    <a href="{{ route('genre') }}" class="btn {{ isset($isGenre) && $isGenre ? 'btn-primary' : 'btn-black no-fill' }}">Genre</a>
    <a href="{{ route('playlist') }}" class="btn {{ isset($isPlaylist) && $isPlaylist ? 'btn-primary' : 'btn-black no-fill' }}">Playlist</a>
    <a href="{{ route('artist') }}" class="btn {{ isset($isArtist) && $isArtist ? 'btn-primary' : 'btn-black no-fill' }}">Artis</a>
</div>

