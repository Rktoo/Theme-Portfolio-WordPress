document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("progress-bar");
    const scrollBtn = document.getElementById("scroll-btn");
    const slider = document.getElementById("slider_");
    const leftArrow = document.getElementById("left-arrow_");
    const rightArrow = document.getElementById("right_arrow_");

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

    // ===== slider
    if (slider && leftArrow && rightArrow) {

        let scrollAmount = slider.firstElementChild.clientWidth + 30;
        window.addEventListener("resize", setScrollAmount);
        const totalScrollWidth = slider.scrollWidth - slider.clientWidth;
        const projectElements = slider.children.length - 1;
        let xValue = 0;
        let isSliding = true;

        // ===== Fonction pour editer le padding du slider et le scrollAmount suivant la taille de l'écran
        function setScrollAmount() {

            if (window.innerWidth < 362) {
                scrollAmount = slider.firstElementChild.clientWidth + 30;
            } else if (window.innerWidth < 391) {
                slider.classList.replace("px-[0.7rem]", "px-[1.7rem]");
                scrollAmount = slider.firstElementChild.clientWidth + 30;
            } else if (window.innerWidth < 413) {
                slider.classList.replace("px-[0.7rem]", "px-[2.5rem]");
                scrollAmount = slider.firstElementChild.clientWidth + 30;
            } else if (window.innerWidth < 431) {
                slider.classList.replace("px-[0.7rem]", "px-[3rem]");
                scrollAmount = slider.firstElementChild.clientWidth + 30;
            } else if (window.innerWidth < 768) {
                slider.classList.replace("px-[0.7rem]", "px-[10rem]");
                scrollAmount = slider.firstElementChild.clientWidth + 30;
            } else {
                // ===== pour les résolutions au dessus de 768px
                scrollAmount = 415;
            }
        }

        setScrollAmount();


        rightArrow.addEventListener("click", function () {
            if (isSliding) {
                stopAutoSlide();
            }
            slideToRight();
        });

        leftArrow.addEventListener("click", function () {
            if (isSliding) {
                stopAutoSlide();
            }

            if (slider.scrollLeft <= 0) {
                slider.scrollBy({
                    left: -scrollAmount,
                    behavior: "smooth"
                });
                setTimeout(() => {
                    slider.scrollTo({
                        left: totalScrollWidth,
                        behavior: "auto"
                    });
                    xValue = projectElements - 1;
                }, 200)
                addBackdropBlur(xValue = projectElements - 1);
            } else {
                xValue -= 1;
                slider.scrollBy({
                    left: -scrollAmount,
                    behavior: "smooth"
                });
                addBackdropBlur(xValue);
            }
        });



        // ===== Fonction pour slider vers la droite
        function slideToRight() {
            if (slider.scrollLeft + scrollAmount + 200 >= totalScrollWidth && xValue >= projectElements - 1) {
                slider.scrollBy({
                    left: scrollAmount,
                    behavior: "smooth"
                });

                addBackdropBlur(xValue = 0);
                setTimeout(() => {
                    slider.scrollTo({
                        left: 0,
                        behavior: "auto"
                    });
                    xValue = 0;
                }, 200);
            } else {
                xValue += 1;
                slider.scrollBy({
                    left: scrollAmount,
                    behavior: "smooth"
                });
                addBackdropBlur(xValue);
            }
        }

        // ===== Fonction pour le slide automatique
        let autoSlide;
        function startAutoSlide() {
            isSliding = true;
            autoSlide = setInterval(() => {
                slideToRight();

            }, 3000);
        }

        // ===== Fonction pour arrêter le slide automatique
        function stopAutoSlide() {
            clearInterval(autoSlide);
            isSliding = false;
            // ===== Redémarrage du slide automatique après un délai de 10s
            setTimeout(() => {
                startAutoSlide();
            }, 10000);
        }

        startAutoSlide();

        // ===== Fonction pour ajouter des flous autour du projet au milieu
        function addBackdropBlur(projectElements = 0) {
            document.querySelectorAll("#extrait_").forEach((project, index) => {
                const projectBlur = project.firstElementChild;

                if (projectElements === index) {
                    projectBlur.classList.replace("backdrop-blur-[2px]", "backdrop-blur-none");
                    project.classList.replace("animate-pulse", "animate-none");
                    project.classList.replace("scale-95", "scale-100");
                } else {
                    projectBlur.classList.replace("backdrop-blur-none", "backdrop-blur-[2px]");
                    project.classList.replace("animate-none", "animate-pulse");
                    project.classList.replace("scale-100", "scale-95");
                }
            });
        }
        addBackdropBlur();
    }


});