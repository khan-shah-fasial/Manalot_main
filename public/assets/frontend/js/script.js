// document.addEventListener("DOMContentLoaded", function () {
//     const action = document.querySelector(".action");
//     const dropdownWrapper = document.querySelector(".dropdown_wrapper");

//     // Toggle dropdown on click
//     action.addEventListener("click", function () {
//         dropdownWrapper.classList.toggle("show");
//     });

//     // Hide dropdown if clicked outside of it
//     document.addEventListener("click", function (event) {
//         if (!action.contains(event.target)) {
//             dropdownWrapper.classList.remove("show");
//         }
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    const searchBtn = document.querySelector(".mobile_search_btn");
    const closeBtn = document.querySelector(".mobile_search_input .close");
    const searchInputDiv = document.querySelector(".mobile_search_input");
    const searchForm = document.querySelector(".search_input");

    // Show search input when clicking the search button
    searchBtn.addEventListener("click", function (e) {
        e.preventDefault();
        searchInputDiv.style.display = "block";
    });

    // Hide search input when clicking the close button
    closeBtn.addEventListener("click", function (e) {
        e.preventDefault();
        searchInputDiv.style.display = "none";
    });

    // Handle form submission
    searchForm.addEventListener("submit", function (e) {
        const searchInput = searchInputDiv.querySelector("input[type='text']");
        if (!searchInput.value.trim()) {
            e.preventDefault(); // Prevent empty submissions
            alert("Please enter a search term.");
        } else {
            console.log("Search query submitted:", searchInput.value);
            // Add your search functionality here
        }
    });
});

