<?php 
/* Template Name: Blog Page */ 
get_header(); 
?>

<main>
    <h1><?php the_title(); ?></h1>
    
    <?php 
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 10,  // Change number of posts per page
        'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
    );

    $blog_query = new WP_Query($args);

    if ($blog_query->have_posts()) :
        while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_post_thumbnail('medium'); ?>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </article>
        <?php endwhile; ?>

        <!-- Pagination -->
        <div class="pagination">
            <?php 
            echo paginate_links(array(
                'total' => $blog_query->max_num_pages
            )); 
            ?>
        </div>

    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
