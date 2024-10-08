</main>

<footer class="bg-gradient-to-r from-blue-500 to-teal-500 text-white">
    <div class="max-w-6xl mx-auto p-10">
        <div class="flex flex-col items-center space-y-4 ">
            <!-- External links -->
            <section class="flex space-x-4" id="external-links">
                <?php

                use function PHPSTORM_META\type;

                $args = [
                    'post_type' => 'liens_externes'
                ];
                $links = new WP_Query($args);
                if ($links->have_posts()) :
                    while ($links->have_posts()): $links->the_post();
                        $url = wp_strip_all_tags(get_the_content(), true);
                        if (!empty($url)) :
                            $url = esc_url(trim($url));
                ?>
                            <div>
                                <a href="<?php echo $url; ?>"
                                    class="w-10 h-10 " target="_blank">
                                    <?php the_post_thumbnail('thumbnail', ['class' => "w-10 h-10 p-[0.1rem] border-black border-2 rounded-full hover:border-white transition-colors duration-200 ease-in"]) ?>
                                </a>
                            </div>
                <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </section>
            <div class=" w-1/2 h-[0.05rem] bg-[#f4f4f4]">
            </div>
            <p>&copy; <?php echo date("Y"); ?> Portfolio de <?php echo esc_html(get_theme_mod('user_name')); ?></p>
        </div>
    </div>

    <!-- bouton de scroll -->
    <div class="fixed bottom-10 right-[10%] opacity-0  " id="scroll-btn">
        <a href="#content" class="relative group w-8 h-8 opacity-75 hover:opacity-100 transition-opacity duration-150 ease-in-out animate-pulse hover:animate-none active:animate-none z-30 overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon" class=" w-8 h-8 text-[#f4f4f4] group-hover:text-white group-hover:scale-110 transition-all duration-200 ease-in-out z-20">
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1Zm-.75 10.25a.75.75 0 0 0 1.5 0V6.56l1.22 1.22a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0l-2.5 2.5a.75.75 0 0 0 1.06 1.06l1.22-1.22v4.69Z" clip-rule="evenodd" />

            </svg>
            <div class="absolute -top-2 -left-2 bg-gray-800 w-12 h-12 rounded-full -z-10"></div>
        </a>
    </div>

</footer>
<!-- Inclusion des styles et script dans le footer -->
<?php wp_footer(); ?>
</body>

</html>