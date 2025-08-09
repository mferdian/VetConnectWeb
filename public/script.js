document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("get-started-btn").addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah link langsung melompat tanpa animasi
        document.getElementById("service").scrollIntoView({
            behavior: "smooth", // Efek scroll halus
            block: "start" // Mulai dari atas elemen
        });
    });
});
