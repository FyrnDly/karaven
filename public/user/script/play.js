// Membuat function untuk tinggi video scale 16:9
function frameHeight() {
    // Get element frame video
    var frameVideo = document.querySelector(".play-music iframe");
    // Set 100% width with container
    frameVideo.setAttribute('width', '100%');
    // Get size widht frame
    var frameVideoWidth = frameVideo.offsetWidth;
    // Count height frame (16:9/w:h)
    var frameVideoHeight = frameVideoWidth / 16 * 9;
    frameVideo.setAttribute('height', frameVideoHeight.toFixed(0)+'px');
    // Set height queue music
};
// Membuat function untuk tinggi queue music sama dengan tinggi play music
// Jalankan function
window.addEventListener('load', frameHeight());
// window.addEventListener('load', queueHeight());
