</main>

<footer class="footer-gradient text-white">
    <div class="container">
        <div class="footer-content">
            <!-- External links -->
            <section class="external-links" id="external-links">
                <?php
                $args = ['post_type' => 'liens_externes'];
                $links = new WP_Query($args);
                if ($links->have_posts()) :
                    while ($links->have_posts()): $links->the_post();
                        $url = wp_strip_all_tags(get_the_content(), true);
                        if (!empty($url)) :
                            $url = esc_url(trim($url));
                ?>
                            <div class="link-item">
                                <a href="<?php echo $url; ?>" class="link-thumbnail" target="_blank">
                                    <?php the_post_thumbnail('thumbnail', ['class' => "thumbnail-image"]) ?>
                                </a>
                            </div>
                <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </section>
            <div class="divider"></div>
            <p>&copy; <?php echo date("Y"); ?> Portfolio de <?php echo esc_html(get_theme_mod('user_name')); ?></p>
        </div>
    </div>

    <!-- bouton de scroll -->
    <div class="scroll-btn-container" id="scroll-btn">
        <a href="#" class="scroll-btn group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="scroll-btn-icon group-hover:text-white group-hover:scale-110">
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1Zm-.75 10.25a.75.75 0 0 0 1.5 0V6.56l1.22 1.22a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0l-2.5 2.5a.75.75 0 0 0 1.06 1.06l1.22-1.22v4.69Z" clip-rule="evenodd" />
            </svg>
            <div class="scroll-btn-background"></div>
        </a>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>