<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php the_post_thumbnail('large'); ?>
        <div><?php the_content(); ?></div>

        <?php 
        $gallery_images = get_post_meta(get_the_ID(), '_project_gallery_images', true);
        if (!empty($gallery_images) && is_array($gallery_images)) { // Ensure it's an array
            echo '<div class="project-gallery">';
            foreach ($gallery_images as $image_id) {
                echo '<img src="' . esc_url(wp_get_attachment_image_url($image_id, 'large')) . '" alt="">';
            }
            echo '</div>';
        }
        ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
