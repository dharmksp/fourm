<?php 
get_header();

// Fetch image meta (assuming it's stored as an array of image URLs)
$gallery_images = get_post_meta(get_the_ID(), '_custom_page_images', true);

// Ensure $gallery_images is an array
if (!is_array($gallery_images)) {
    $gallery_images = [];
}
?>

<div class="funnel-house-header">
    <div class="funnel-text-div our-story-text">
        <div class="text">
            <h2 class="funnel-text">WITH THE MASTER</h2>
        </div>
        <p class="normal-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
</div>

<div class="founder1 mt-60">
    <h3 class="build-h3">Ar. Balkrishna Doshi</h3>
    <p class="build-p m-0 mt-10">It was a matter of great fortune to have worked with the Master himself for his project JDCA (Jatin Das Centre for Arts, Bhubaneswar).B.V. Doshi, one of modern Indian architecture's most celebrated practitioners. Nearly 90 years later, the Pritzker Prize jury chose Doshi as the 2018 Laureate. From 1951 to 1955, B.V. Doshi worked with Le Corbusier as an architectural apprentice in his Paris atelier. Doshi sir conceptualised the master plan for JDCA , on the natural outcrops of a land opposite Udaigiri and Khandagiri caves . The land had a natural terrain and the plan was to configure requirements Like exhibition spaces, collections of various crafts, Pankhas ,sculptures and other rare artifacts by Artist Jatin Das .</p>
</div>

<div class="master-grid-layout mt-20">
    <h3 class="build-h3">Working with the Master</h3>
    <div class="master-grid-gallery mt-30">

    <?php if (!empty($gallery_images)): ?>
    <?php foreach ($gallery_images as $index => $image_url): ?>
        <?php if ($index % 3 === 0): // Every 3rd image (0, 3, 6...) is a single image ?>
            <div class="master p-rel">
                <img src="<?php echo esc_url($image_url); ?>" alt="">
                <div class="overlay-master">
                    <div class="heart p-rel">
                        <img src="<?php echo get_template_directory_uri(); ?>/image/Heart.svg" alt="" class="heart1">
                        <img src="<?php echo get_template_directory_uri(); ?>/image/Heart1.svg" alt="" class="heart2">
                        <p>Like</p>
                    </div>
                    <div class="share p-rel">
                        <img src="<?php echo get_template_directory_uri(); ?>/image/Send.svg" alt="" class="send1">
                        <img src="<?php echo get_template_directory_uri(); ?>/image/Send1.svg" alt="" class="send2">
                        <p>Share</p>
                    </div>
                </div>
            </div>
        <?php elseif ($index % 3 === 1): // Start of two-image div ?>
            <div class="master master-div2 p-rel">
                <div class="div2">
                    <img src="<?php echo esc_url($image_url); ?>" alt="">
                    <div class="overlay-master">
                        <div class="heart p-rel">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Heart.svg" alt="" class="heart1">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Heart1.svg" alt="" class="heart2">
                            <p>Like</p>
                        </div>
                        <div class="share p-rel">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Send.svg" alt="" class="send1">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Send1.svg" alt="" class="send2">
                            <p>Share</p>
                        </div>
                    </div>
                </div>
        <?php else: // Second image in the two-image div ?>
                <div class="div2">
                    <img src="<?php echo esc_url($image_url); ?>" alt="">
                    <div class="overlay-master">
                        <div class="heart p-rel">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Heart.svg" alt="" class="heart1">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Heart1.svg" alt="" class="heart2">
                            <p>Like</p>
                        </div>
                        <div class="share p-rel">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Send.svg" alt="" class="send1">
                            <img src="<?php echo get_template_directory_uri(); ?>/image/Send1.svg" alt="" class="send2">
                            <p>Share</p>
                        </div>
                    </div>
                </div>
            </div> <!-- Close two-image div -->
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>No images available.</p>
<?php endif; ?>

    </div>
</div>

<?php 
get_footer();
?>
