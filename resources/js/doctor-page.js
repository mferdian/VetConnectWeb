document.addEventListener("DOMContentLoaded", function () {
    const searchDoctor = document.getElementById("searchDoctor");
    const locationFilter = document.getElementById("locationFilter");
    const animalFilter = document.getElementById("animalFilter");
    const sortDoctor = document.getElementById("sortDoctor");
    const vetList = document.getElementById("vetList");

    document.getElementById("filterButton").addEventListener("click", function () {
        const search = searchDoctor.value.toLowerCase();
        const location = locationFilter.value.toLowerCase();
        const animal = animalFilter.value.toLowerCase();

        document.querySelectorAll(".doctor-card").forEach(card => {
            const name = card.getAttribute("data-name");
            const addr = card.getAttribute("data-location");
            const animals = card.getAttribute("data-animal");

            if (name.includes(search) && addr.includes(location) && (animal === "" || animals.includes(animal))) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });

    sortDoctor.addEventListener("change", function () {
        let cards = [...vetList.children];
        cards.sort((a, b) => b.getAttribute("data-rating") - a.getAttribute("data-rating"));
        vetList.innerHTML = "";
        cards.forEach(card => vetList.appendChild(card));
    });
});
