<div class="row nav-list">
    <a href="{{ route('admin.index') }}" class="btn {{ isset($isHome) && $isHome ? 'btn-primary' : 'btn-black no-fill' }}">Dashboard</a>
    <a href="{{ route('admin.music.show') }}" class="btn {{ isset($isMusic) && $isMusic ? 'btn-primary' : 'btn-black no-fill' }}">Lagu</a>
    <a href="{{ route('admin.genre.show') }}" class="btn {{ isset($isGenre) && $isGenre ? 'btn-primary' : 'btn-black no-fill' }}">Genre</a>
    <a href="{{ route('admin.artist.show') }}" class="btn {{ isset($isArtist) && $isArtist ? 'btn-primary' : 'btn-black no-fill' }}">Artis</a>
    <a href="{{ route('admin.playlist.show') }}" class="btn {{ isset($isPlaylist) && $isPlaylist ? 'btn-primary' : 'btn-black no-fill' }}">Playlist</a>
</div>
