<?php
get_header();
?>

<div class="">
    <?php

    // Les bg couleurs
    $bgs = [
        "from-green-100 to-green-300", // Vert
        "from-gray-400 to-gray-600", // Gris
        "from-blue-gray-500 to-blue-gray-700", // Gris bleu
        "from-teal-300 to-teal-500", // Teal
        "from-cyan-300 to-cyan-500", // Cyan
        "from-yellow-200 to-yellow-400", // Jaune
        "from-purple-300 to-purple-500" // Violet
    ];

    $ids = ["content", "skills", "projects", "activities", "contact"];
    // Les templates
    $templateParts = [
        'template-parts/home-content',
        'template-parts/home-skills',
        'template-parts/home-project',
        'template-parts/home-activities',
        'template-parts/home-contact'
    ];

    // Boucle sur le nombre de templates disponibles
    for ($i = 0; $i < count($templateParts); $i++) :
    ?>
        <section
            class=" md:flex md:justify-center md:items-center w-full md:min-h-screen bg-gradient-to-bl  <?php echo $bgs[$i]; ?>"
            id="<?php echo $ids[$i]; ?>">
            <div class="max-w-6xl mx-auto p-10 ">
                <?php
                get_template_part($templateParts[$i]);
                ?>
            </div>
        </section>
    <?php
    endfor;
    ?>
</div>

<?php
get_footer();
?>