<!-- home-project -->
<div id="projects" class="relative project-section w-full py-20 bg-gray-100">
    <div class="md:max-w-6xl mx-auto md:px-10">
        <h2 class="text-4xl font-bold text-center text-gray-800">Mes Projets</h2>
        <p class="text-center text-gray-600 mt-4">Découvrez quelques projets sur lesquels j'ai travaillé récemment.</p>

        <!-- Slider container -->
        <div class=" max-w-[600px] px-[0.7rem] md:px-[6.5rem] flex flex-row justify-between items-center flex-nowrap gap-8 mt-8 overflow-hidden scroll-smooth  " id="slider_">
            <!-- Boucle sur les projets -->
            <?php
            $args = ["post_type" => 'projets'];
            $projets = new WP_Query($args);

            if ($projets->have_posts()):
                while ($projets->have_posts()) : $projets->the_post();
                    $content = wp_strip_all_tags(get_the_content(), true);
                    $word_limit = 50;
                    $words;
                    $exercpt;
                    if ($content) :
                        $words = explode(' ', $content);
                        $exercpt = implode(' ', array_slice($words, 0, $word_limit));
                    endif;
            ?>
                    <div class=" relative flex-shrink-0 w-64 md:w-96 h-[30rem] scale-95 flex flex-col justify-start items-center bg-white shadow-md rounded-lg transition-all duration-200 ease-in-out animate-pulse overflow-hidden" id="extrait_">
                        <div class="absolute top-0 left-0 w-full h-[91%] bg-black/70 backdrop-blur-[2px]  opacity-70  z-30 blur_effect_">
                        </div>

                        <img src="<?php the_post_thumbnail_url(); ?>" alt="Project" class="w-full max-h-44 object-center">
                        <div class="p-6 flex flex-col justify-start items-start">
                            <h3 class="text-lg font-bold text-gray-800"><?php the_title(); ?></h3>
                            <p class="excerpts mt-2 text-gray-600"><?php echo $exercpt; ?></p>
                        </div>
                        <?php

                        // ===== effect sur les extraits
                        get_template_part('template-parts/project-excerpt-effect');
                        ?>


                        <div class="absolute bottom-0 left-0 w-full flex">
                            <a href="<?php the_permalink(); ?>" class="w-full px-4 py-2 text-center bg-sky-400 hover:bg-sky-600 text-white transition-colors duration-200 ease-in-out">Voir le projet</a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();

                // ===== Slider
                get_template_part('template-parts/project-slider');
            endif;
            ?>

        </div>

        <div class="mt-10 w-full flex flex-col md:flex-row justify-center md:justify-end items-center flex-wrap space-y-4 md:space-y-0">
            <a href="#projects" class="flex bg-teal-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-red-500">Voir tous les projets</a>
            <a href="#contact" class="ml-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-900">Me contacter</a>
        </div>
    </div>
</div>