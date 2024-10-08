<!-- home-skills -->

<div class=" max-w-6xl mx-auto px-10">
    <h2 class="text-4xl font-bold text-center text-white">Compétences</h2>
    <p class="text-center text-[#f4f4f4] mt-4">Voici quelques-unes des technologies avec lesquelles je travaille.</p>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-8">
        <?php
        $args = [
            "post_type" => "competences",
            "order" => "DESC",
        ];
        $competences = new WP_Query($args);
        if ($competences->have_posts()) :
            while ($competences->have_posts()) : $competences->the_post();
        ?>
                <div class="text-center skills">
                    <span class="text-4xl text-teal-500"><?php esc_html(the_title()) ?></span>
                    <p class="mt-2 text-[#f4f4f4]"><?php the_content() ?></p>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
    <div class="mt-10 w-full flex flex-col md:flex-row justify-center items-center flex-wrap space-y-4 md:space-y-0">
        <a href="#projects" class="bg-teal-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-red-500">Voir mes projets</a>
        <a href="#contact" class="ml-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-900">Me contacter</a>
    </div>
</div>