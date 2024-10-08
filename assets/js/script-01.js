document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("progress-bar");
    const scrollBtn = document.getElementById("scroll-btn");
    const skills = document.querySelectorAll(".skills");
    // ===== Progress bar 
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

    // ===== Scroll
    function scrollDocument(progressBarWidth) {
        if (scrollBtn) {
            if (Number(progressBarWidth) < 10) {
                scrollBtn.style.opacity = 0;
                progressBar.classList.remove("animate-pulse");

            } else {
                scrollBtn.style.opacity = 1;
                progressBar.classList.add("animate-pulse");
            }
        }
    }

    // ===== Skills
    if (skills) {

        skills.forEach((skill, index) => {
            let competence = skill.firstElementChild.nextElementSibling.nextElementSibling;

            if (competence.textContent.length < 1) {
                competence.remove;
            }

            competence.classList.add("mt-2");
            competence.classList.add("text-[#f4f4f4]");
        })
    }
});