const myContainer = document.getElementById('my-container');
const langSwitcherAr = document.getElementById("langSwitcherAr");
const langSwitcherEn = document.getElementById("langSwitcherEn");

if (langSwitcherAr !== null) {
    langSwitcherAr.addEventListener('click', function () {
        myContainer.classList.add("active");
    });
}

if (langSwitcherEn !== null) {
    langSwitcherEn.addEventListener('click', function () {
        myContainer.classList.remove("active");
    });
}