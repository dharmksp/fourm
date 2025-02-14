
<?php

// Fetch project details dynamically
$project_title = get_the_title(); // Example title, replace dynamically
// Get the current project ID
$project_id = get_the_ID();
$gallery_images = get_post_meta($project_id, '_project_gallery_images', true);
// Get gallery images (assuming stored in a custom field)
if (is_serialized($gallery_images)) {
    $gallery_images = unserialize($gallery_images);
}

$gallery_images = is_array($gallery_images) ? $gallery_images : explode(',', $gallery_images);
$gallery_images = array_map('wp_get_attachment_url', $gallery_images);
// Count total images
$total_images = !empty($gallery_images) ? count($gallery_images) : 0;

 // Example, replace dynamically
 
 // Get the current category dynamically

 // Get the current term dynamically
 $current_category = get_queried_object();
 
 if ($current_category && isset($current_category->term_id)) {
     $args = [
         'post_type'      => 'projects', // Ensure 'projects' is the correct custom post type
         'posts_per_page' => -1, // Fetch all projects
         'tax_query'      => [
             [
                 'taxonomy' => 'project_category', // Make sure this is the correct taxonomy
                 'field'    => 'term_id',
                 'terms'    => $current_category->term_id,
             ],
         ],
     ];
 
     $query = new WP_Query($args);
     $total_projects = $query->found_posts;
     wp_reset_postdata();
 } else {
     $total_projects = 0;
 }
 
 
 
$project_description = "At Forumadvaita, the natural sunlight is used to render the spaces within. Such spaces satisfy psychological and physical functions of a space and offer memories. Spaces under the influence of natural sunlight give a very theatrical experience to the user and eventually become one with the space.";

// Example gallery images (fetch dynamically from the database)

get_header(); 
?>

<div class="funnel-house-header">
    <div class="funnel-text-div">
        <div class="text">
            <h2 class="funnel-text"><?php echo esc_html($project_title); ?></h2>
            <div class="imges">
                <p>Total Images</p>
                <img src="<?php echo get_template_directory_uri(); ?>/image/Image 2.svg" alt=""> 
                <p><?php echo esc_html($total_images); ?></p>
            </div>
        </div>
        <p class="normal-text"><?php echo esc_html($project_description); ?></p>
    </div>

    <div class="view-mobile">
        <p>Total Projects: <?php echo esc_html($total_projects); ?></p>
    </div>

    <div class="pagination-div">
    <?php
    // Get the current project's category
    $categories = wp_get_post_terms(get_the_ID(), 'project_category');
    $category_ids = [];

    if (!empty($categories)) {
        foreach ($categories as $category) {
            $category_ids[] = $category->term_id;
        }
    }

    // Get previous and next projects in the same category
    $prev_project = get_previous_post(true, '', 'project_category');
    $next_project = get_next_post(true, '', 'project_category');

    // If there's only one project in the category, disable navigation
    $is_single_project = !$prev_project && !$next_project;
    ?>

    <!-- Previous Project -->
    <?php if ($prev_project) : ?>
        <a href="<?php echo get_permalink($prev_project->ID); ?>" class="previous">
            <div class="prev">
                <img src="<?php echo get_template_directory_uri(); ?>/image/Arrow - Left.svg" alt="">
            </div>
            <p class="prev-text">Previous</p>
        </a>
    <?php else : ?>
        <div class="previous disabled">
            <div class="prev">
                <img src="<?php echo get_template_directory_uri(); ?>/image/Arrow - Left.svg" alt="">
            </div>
            <p class="prev-text">Previous</p>
        </div>
    <?php endif; ?>

    <!-- Page Count -->
    <div class="count">01</div>

    <!-- Next Project -->
    <?php if ($next_project) : ?>
        <a href="<?php echo get_permalink($next_project->ID); ?>" class="nextpage">
            <div class="next">
                <img src="<?php echo get_template_directory_uri(); ?>/image/Arrow - right.svg" alt="">
            </div>
            <p>Next Project</p>
        </a>
    <?php else : ?>
        <div class="nextpage disabled">
            <div class="next">
                <img src="<?php echo get_template_directory_uri(); ?>/image/Arrow - right.svg" alt="">
            </div>
            <p>Next Project</p>
        </div>
    <?php endif; ?>
</div>


</div>

<div class="view-project">
    <span class="view"><a>View all Projects</a></span>
    <span class="view2">Total Projects: <p><?php echo esc_html($total_projects); ?></p></span>
</div>

<div class="gallery-text-container">
    <?php foreach ($gallery_images as $index => $image_url): ?>
        <div class="gallery gallery<?php echo $index + 1; ?>">
           
                <div class="img-div">
                    <img src="<?php echo esc_url($image_url); ?>" alt="" class="clickable-image" data-index="0">
                </div>
            
            <div class="text-div">
                <h1>OUR SPACES FURTHER ENHANCE</h1>
                <p><?php echo esc_html($project_description); ?></p>
                <p><?php echo esc_html($project_description); ?></p>
            </div>
            
        </div>
    <?php endforeach; ?>
    <!-- Modal for Image Carousel -->
    <div id="carouselModal" class="modal">
            <div class="close">
              <span class="close-icon">
                <img src="image/Vector (17).svg" alt="">
              </span>
            </div>
            <div class="carousel-container">
              <div class="carousel">
                <img id="carousel-image" src="" class="p-rel">
                  
                <div class="arrow-container">
                  <div id="prev">
                    <img src="image/Arrow - Left1.svg" alt="">
                  </div>
              
                  <div id="next">
                    <img src="image/Arrow - right.svg" alt="">
                  </div>
                </div>
            
                <div class="imges">
                  <p>Total Images</p>
                  <img src="image/gallery-img.svg" alt=""> 
                  <p>72</p>
                </div>
                  
                <div class="like-share-div">
                  <div class="heart">
                    <img src="image/Heart.svg" alt="" class="heart1">
                    <img src="image/Heart1.svg" alt="" class="heart2">
                    <p>Like</p>
                  </div>
                  <div class="share">
                    <img src="image/Send.svg" alt="" class="send1">
                    <img src="image/Send1.svg" alt="" class="send2">
                    <p>Share</p>
                  </div>
                </div>
              </div>
              
              <div class="multiple-carousel-img mt-20">
                <img src="image/image (33).svg" alt="">
                <img src="image/image (32).svg" alt="">
                <img src="image/image.png" alt="">
                <img src="image/image (33).svg" alt="">
                <img src="image/image (32).svg" alt="">
                <img src="image/image.png" alt="">
                <img src="image/image (33).svg" alt="">
              </div>
            </div>
        </div>
</div>



<?php get_footer();?>
