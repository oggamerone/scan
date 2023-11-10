document.addEventListener("DOMContentLoaded", function () {
    const mangaPage = document.getElementById("manga-page");
    const prevButton = document.getElementById("prev-page");
    const nextButton = document.getElementById("next-page");
    const totalPages = 10; // Ajuste para o número correto de páginas
    let currentPage = 1;

    function updatePage() {
        mangaPage.src = `manga1_page${currentPage}.jpg`;
    }

    prevButton.addEventListener("click", function () {
        if (currentPage > 1) {
            currentPage--;
            updatePage();
        }
    });

    nextButton.addEventListener("click", function () {
        if (currentPage < totalPages) {
            currentPage++;
            updatePage();
        }
    });

    // Carregue a primeira página
    updatePage();
});
