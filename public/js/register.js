document.getElementById("role").addEventListener("change", toggleinput);

function toggleinput() {
    var roleSelect = document.getElementById("role");
    var areaInput = document.getElementById("areaInput");
    var lkInput = document.getElementById("lkInput");
    var keeperInput = document.getElementById("keeperInput");
    var typeUPT = document.getElementById("typeUPT");

    var selectedOptionId = roleSelect.options[roleSelect.selectedIndex].id;

    areaInput.style.display = "none";
    lkInput.style.display = "none";
    keeperInput.style.display = "none";
    typeUPT.style.display = "none";

    if (selectedOptionId === "lembaga_konservasi") {
        lkInput.style.display = "block";
    } else if (selectedOptionId === "unit_pelaksana_teknis") {
        typeUPT.style.display = "block";
        areaInput.style.display = "block";
    } else if (selectedOptionId === "keeper") {
        keeperInput.style.display = "block";
    }
}

document
    .getElementById("kode_pos")
    .addEventListener("input", debounce(searchPostalCode, 1000));

function searchPostalCode() {
    var postalCode = document.getElementById("kode_pos").value;

    if (postalCode.length === 5) {
        fetch(`/api/search?postalCode=${postalCode}`)
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.data && data.data.length > 0) {
                    var locationData = data.data[0];
                    document.getElementById("provinsi").value =
                        locationData.province || "";
                    document.getElementById("kabupaten").value =
                        locationData.regency || "";
                    document.getElementById("kecamatan").value =
                        locationData.district || "";
                    document.getElementById("kelurahan").value =
                        locationData.village || "";
                } else {
                    clearLocationFields();
                }
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
                clearLocationFields();
            });
    } else {
        clearLocationFields();
    }
}

function clearLocationFields() {
    document.getElementById("provinsi").value = "";
    document.getElementById("kabupaten").value = "";
    document.getElementById("kecamatan").value = "";
    document.getElementById("kelurahan").value = "";
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

let lastQuery = "";
let isDropdownActive = false;
const speciesData = [];

function fetchSpeciesSuggest(query) {
    if (!query || query === lastQuery) {
        return;
    }

    lastQuery = query;
    isDropdownActive = true;

    const apiUrl = `https://api.api-ninjas.com/v1/animals?name=${query}`;

    fetch(apiUrl, {
        method: "GET",
        headers: { "X-Api-Key": "DqR2YddaIA15NuoL6zZOfQ==1E6L1sSbO56QQEXe" },
    })
        .then((response) => response.json())
        .then((data) => {
            isDropdownActive = false;
            speciesData.length = 0;
            data.forEach((animal) =>
                speciesData.push({
                    scientificName: animal.taxonomy.scientific_name,
                })
            );

            if (query === lastQuery) {
                console.log("Pencarian untuk:", query, speciesData);
                populateDropdown(speciesData);
            }
        })
        .catch((error) => {
            isDropdownActive = false;
            console.error("Error fetching species data:", error);
        });
}

function populateDropdown(species) {
    const dropdown = document.getElementById("keeper-dropdown");
    dropdown.innerHTML = "";

    if (species.length === 0) {
        hideDropdown();
        return;
    }

    species.forEach((speciesObj) => {
        const listItem = document.createElement("li");
        listItem.classList.add("cursor-pointer", "p-2", "hover:bg-gray-100");
        listItem.textContent = speciesObj.scientificName;
        listItem.addEventListener("click", function () {
            document.getElementById("keeper-search").value =
                speciesObj.scientificName;
            hideDropdown();
        });
        dropdown.appendChild(listItem);
    });

    dropdown.classList.remove("hidden");
}

document.getElementById("keeper-search").addEventListener("input", function () {
    const query = this.value.toLowerCase();
    if (query.length > 0) {
        fetchSpeciesSuggest(query);
    } else {
        hideDropdown();
    }
});

document.addEventListener("click", function (event) {
    const dropdown = document.getElementById("keeper-dropdown");
    const searchInput = document.getElementById("keeper-search");

    if (
        !isDropdownActive &&
        !dropdown.contains(event.target) &&
        event.target !== searchInput
    ) {
        hideDropdown();
    }
});

function hideDropdown() {
    const dropdown = document.getElementById("keeper-dropdown");
    dropdown.classList.add("hidden");
}

window.onload = function () {
    toggleinput();
};

fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
    .then((response) => response.json())
    .then((provinces) => {
        console.log(provinces);
        const select = document.querySelector("#areaInput select");

        select.innerHTML =
            '<option value="" disabled selected>Pilih Provinsi</option>';

        provinces.forEach((province) => {
            const option = document.createElement("option");
            option.value = province.name;
            option.textContent = province.name;
            select.appendChild(option);
        });
    })
    .catch((error) => console.error("Error fetching provinces:", error));
