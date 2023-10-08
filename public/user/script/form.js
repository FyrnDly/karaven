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
        formSearch.classList.add('ms-md-auto');
        // pindahin form ke navbar
        navForm.appendChild(formSearch);
    } else {
        // ubah class untuk lebar form navbar untuk header
        formSearch.classList.add('col-md-8', 'col-lg-6');
        formSearch.classList.remove('ms-md-auto');
        // pindahin form ke header kembali
        headerForm.appendChild(formSearch);
    }
}
// Menjalankan fungsi moveForm saat window di-scroll
window.addEventListener("scroll", moveForm);