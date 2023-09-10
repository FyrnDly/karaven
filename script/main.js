// function untuk menukar form dari header ke nav
function moveForm() {
    // Manggil element
    var header = document.querySelector("#headerForm"); 
    var form = document.querySelector("form.search");
    var navbar = document.querySelector("#togglerNavbar");
    var navbarItems = document.querySelector("ul.navbar-nav");
    // ukur tinggi header
    var headerHeight = header.offsetHeight;
    // ukur posisi scroll user
    var scrollPosition = window.pageYOffset;
    if (scrollPosition > headerHeight) {
        // ubah class form header untuk navbar
        form.classList.remove('col-md-8','col-lg-6');
        form.classList.add('d-flex');
        // ubah posisi navbar-nav items dari pojok kanan ke kiri
        navbarItems.classList.remove('ms-auto');
        navbarItems.classList.add('me-auto');
        // pindahin form ke navbar
        navbar.appendChild(form);
    } else {
        // ubah class form header untuk navbar
        form.classList.remove('d-flex');
        form.classList.add('col-md-8', 'col-lg-6');
        // ubah posisi navbar-nav items dari pojok kiri ke kanan
        navbarItems.classList.add('ms-auto');
        navbarItems.classList.remove('me-auto');
        // pindahin form ke header kembali
        header.appendChild(form);
    }
}
// Menjalankan fungsi moveForm saat window di-scroll
window.addEventListener("scroll", moveForm);

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