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

        let scrollAmount = 500;
        window.addEventListener("resize", setScrollAmount);
        const totalScrollWidth = slider.scrollWidth - slider.clientWidth;
        const projectElements = slider.children.length - 1;
        let xValue = 0;
        let isSliding = true;

        // ===== Fonction pour editer le scrollAmount suivant la taille de l'écran
        function setScrollAmount() {
            if (window.innerWidth < 768) {
                scrollAmount = 288;
            } else {
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
            } else {
                xValue -= 1;
                slider.scrollBy({
                    left: -scrollAmount,
                    behavior: "smooth"
                });
            }
        });



        // ===== Fonction pour slider vers la droite
        function slideToRight() {

            if (slider.scrollLeft + scrollAmount + 200 >= totalScrollWidth && xValue >= projectElements - 1) {
                slider.scrollBy({
                    left: scrollAmount,
                    behavior: "smooth"
                });

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


    }


});