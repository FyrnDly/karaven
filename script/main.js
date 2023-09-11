// function untuk menukar form dari header ke nav
function moveForm() {
    // Manggil element
    var headerForm = document.querySelector("#headerForm"); 
    var formSearch = document.querySelector("form.search");
    var navForm = document.querySelector("#navItems");
    // ukur tinggi header
    var headerHeight = headerForm.offsetHeight;
    // ukur posisi scroll user
    var scrollPosition = window.pageYOffset;
    if (scrollPosition > headerHeight) {
        // Ubah class untuk lebar form header untuk navbar
        formSearch.classList.remove('col-md-8', 'col-lg-6');
        // Ubah class untuk posisi logo dan form di navbar
        navForm.classList.remove('justify-content-around');
        navForm.classList.add('justify-content-between');
        // pindahin form ke navbar
        navForm.appendChild(formSearch);
    } else {
        // ubah class untuk lebar form navbar untuk header
        formSearch.classList.add('col-md-8', 'col-lg-6');
        // Ubah class untuk posisi logo di navbar
        navForm.classList.remove('justify-content-between');
        navForm.classList.add('justify-content-around');
        // pindahin form ke header kembali
        headerForm.appendChild(formSearch);
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