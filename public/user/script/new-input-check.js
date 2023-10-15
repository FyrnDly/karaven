// Menjalankan function jika ada input pada form input new-genre
document.getElementById('new-genre-input').addEventListener('input', function () {
    var radio = document.getElementById('new-genre-radio');
    if (this != '') {
        radio.checked = true;
        radio.value = this.value;
    } else {
        radio.checked = false;
    }
});

// Menjalankan function jika ada input pada form input new-artist
document.getElementById('new-artist-input').addEventListener('input', function() {
    var radio = document.getElementById('new-artist-radio');
    if (this != '') {
        radio.checked = true;
        radio.value = this.value;
    } else {
        radio.checked = false;
    }
});