// Cek posisi footer dan tambahin maring bottom untuk fixed top navbar
window.addEventListener('load', function () {
    // ambil element footer dan ukuran footer
    var footer = document.querySelector('footer');
    var footerPosition = footer.offsetTop;
    var footerSizeHeight = footer.offsetHeight;
    var checkBottom = window.innerHeight - footerPosition;
    // tambahin fixed bottom kalau posisi buttom tidak dipaling bawah window screen
    if (checkBottom >= footerSizeHeight) {
        footer.classList.add('fixed-bottom');
    };
    // ambil element nav dan ukuran nav
    var nav = document.querySelector('nav');
    var navSizeHeight = nav.offsetHeight;
    var body = document.querySelector('body');
    body.style.paddingTop = navSizeHeight + 'px';
});