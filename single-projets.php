<?php get_header(); ?>

<div class="project-container">
    <h1><?php the_title(); ?></h1>

    <div class="project-thumbnail">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('large');
        } ?>
    </div>

    <div class="project-content">
        <?php wp_strip_all_tags(the_content(), true); ?>
    </div>

    <div class="project-meta">
        <p>Date de publication : <?php echo get_the_date(); ?></p>
        <?php
        if (!empty(get_theme_mod('user_name'))) :
        ?>
            <p>Auteur : <?php echo esc_html(get_theme_mod('user_name')); ?></p>
        <?php endif; ?>
    </div>
</div>


<?php
get_footer();
?>