<section id="projects" class="projects-section w-full py-20 bg-gray-100">
    <div class="max-w-6xl mx-auto px-10">
        <h2 class="text-4xl font-bold text-center text-gray-800">Mes Projets</h2>
        <p class="text-center text-gray-600 mt-4">Découvrez quelques projets sur lesquels j'ai travaillé récemment.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            <!-- Boucle sur les projets -->
            <?php
            $args = ["post_type" => '"projets',];
            $projets = new WP_Query($args);

            if ($projets->have_posts()):
                while ($projets->have_posts()) : $projets->the_post();
            ?>
                    <div class="flex flex-col justify-between items-center bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="Project 1" class="w-full h-60 object-cover">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800"><?php the_title(); ?></h3>
                            <p class="excerpts mt-2 text-gray-600"><?php the_excerpt(); ?></p>
                        </div>
                        <div class=" w-full flex">
                            <a href="<?php the_permalink(); ?>" class="w-full px-4 py-2 text-center bg-sky-400 hover:bg-sky-600 text-white transition-colors duration-200 ease-in-out ">Voir le projet</a>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
        <div class="mt-10 flex justify-end items-center">
            <a href="#projects" class="bg-teal-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-red-500">Voir tous les projets</a>
            <a href="#contact" class="ml-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-900">Me contacter</a>
        </div>
    </div>
</section>