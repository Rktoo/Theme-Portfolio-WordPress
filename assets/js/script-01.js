document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("progress-bar");

    progressBar.style.width = "0%";
    document.addEventListener("scroll", updateProgressBar);

    function updateProgressBar() {
        const scrollTop = window.scrollY;
        const windowHeight = window.innerHeight;
        const documentHeight = document.body.clientHeight;
        const progressBarWidth = (scrollTop / (documentHeight - windowHeight)) * 100;
        progressBar.style.width = progressBarWidth + "%";
    }
});