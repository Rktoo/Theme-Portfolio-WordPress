<!-- home-activities -->

<div class="max-w-6xl mx-auto px-10" id="activities">
    <h2 class="text-4xl font-bold text-center text-white">Mes Loisirs</h2>
    <p class="text-center text-[#f4f4f4] mt-4">Voici quelques-unes de mes activités et hobbies favoris.</p>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8">
        <?php
        // Tableau des loisirs/activités
        $args = [
            'post_type' => 'Activités',
        ];

        $activites = new WP_Query($args);


        // Boucle pour afficher les loisirs
        if ($activites->have_posts()) :
            while ($activites->have_posts()) : $activites->the_post();
        ?>
                <div class="text-center skills">
                    <span class="text-4xl text-teal-500"><?php echo esc_html(the_title()); ?></span>
                    <p class="mt-2 text-[#f4f4f4]"><?php echo esc_html(the_content()); ?></p>
                </div>
        <?php
            endwhile;
        endif; ?>
    </div>
    <div class="mt-10 w-full flex justify-center md:justify-center items-center">
        <a href="#contact" class="ml-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-900">Me contacter</a>
    </div>
</div>