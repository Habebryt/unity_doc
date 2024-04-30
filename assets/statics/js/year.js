function updateYear() {
    var currentYear = new Date().getFullYear();
    var yearSpan = document.querySelector("span a");
    yearSpan.textContent = "UnityDocs " + currentYear;
}