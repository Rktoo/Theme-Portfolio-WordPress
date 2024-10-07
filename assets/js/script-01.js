document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("progress-bar");
    const scrollBtn = document.getElementById("scroll-btn");

    // ======= Progress bar 
    if (progressBar) {
        progressBar.style.width = "0%";
        document.addEventListener("scroll", updateProgressBar);
    }

    function updateProgressBar() {
        const scrollTop = window.scrollY;
        const windowHeight = window.innerHeight;
        const documentHeight = document.body.clientHeight;
        const progressBarWidth = (scrollTop / (documentHeight - windowHeight)) * 100;
        progressBar.style.width = progressBarWidth + "%";
        scrollDocument(progressBarWidth);
    }

    // ====== Scroll
    function scrollDocument(progressBarWidth) {
        console.log(progressBarWidth)

        if (Number(progressBarWidth) < 10) {
            scrollBtn.style.opacity = 0;
        } else {
            scrollBtn.style.opacity = 1;
        }
    }

});