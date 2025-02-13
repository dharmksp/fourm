<?php
/*
Template Name: Contact Page
*/
get_header(); 
?>

<div class="funnel-house-header">
    <div class="funnel-text-div our-story-text">
        <div class="text">
            <h2 class="funnel-text"><?php echo esc_html(get_post_meta(get_the_ID(), '_contact_title', true)); ?></h2>
        </div>
        <p class="normal-text">
            <?php echo esc_html(get_post_meta(get_the_ID(), '_contact_description', true)); ?>
        </p>
    </div>
</div>
<?php 
global $post;
$post_id = $post->ID;

?>
<div class="contact-us-wrapper mt-40">
    <div class="contact-img">
        <img src="<?php echo get_template_directory_uri(); ?>/image/image 26 (3).svg" alt="Contact Image">
    </div>
    <div class="contact-us-detail">
        <h3 class="build-h3">Contact Details</h3>
        <div class="build-p mt-20"><img src="<?php echo get_template_directory_uri(); ?>/image/Location.svg" alt="">
            <?php echo esc_html(get_theme_mod( 'footer_address')); ?>
        </div>
        <div class="build-p mt-12"><img src="<?php echo get_template_directory_uri(); ?>/image/Message.svg" alt="">
            <a href="mailto:<?php echo esc_attr(get_post_meta($post_id, '_contact_email', true)); ?>">
            <?php echo esc_html(get_theme_mod( 'footer_email')); ?>
            </a>
        </div>
        <div class="build-p mt-12"><img src="<?php echo get_template_directory_uri(); ?>/image/Call.svg" alt="">
        <?php echo esc_html(get_theme_mod( 'footer_phone')); ?>
        </div>

        <form action="" method="post" class="mt-40 w-full">
            <div class="text">
                <input type="text" class="w-full" placeholder="Name" required>
            </div>
            <div class="text email mt-12">
                <input type="email" name="user_email" class="w-full" placeholder="Email" required>
            </div>
            <div class="text phone mt-12">
                <input type="tel" name="user_phone" class="w-full" placeholder="Phone" required>
            </div>
            <div class="text address mt-12">
                <input type="text" class="w-full" placeholder="Address">
            </div>
            <div class="text subject mt-12">
                <input type="text" class="w-full" placeholder="Subject">
            </div>
            <textarea rows="5" placeholder="Type your message here..." class="text textarea mt-12"></textarea>

            <button class="primary-button mt-20">Submit</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
