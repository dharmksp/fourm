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
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_contact_form"])) {
    $user_name    = sanitize_text_field($_POST["user_name"]);
    $user_email   = sanitize_email($_POST["user_email"]);
    $user_phone   = sanitize_text_field($_POST["user_phone"]);
    $user_address = sanitize_text_field($_POST["user_address"]);
    $subject      = sanitize_text_field($_POST["subject"]);
    $message      = sanitize_textarea_field($_POST["message"]);

    // Email to send the contact form submission
    $to = get_theme_mod('footer_email'); // Admin email from theme settings
    if (empty($to)) {
        $to = "singh.dharmksp@gmail.com"; // Fallback email if not set
    }

    // Email subject
    $email_subject = "New Contact Form Submission: " . $subject;

    // Email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $user_name\n";
    $email_body .= "Email: $user_email\n";
    $email_body .= "Phone: $user_phone\n";
    $email_body .= "Address: $user_address\n";
    $email_body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $user_name <$user_email>\r\n";
    $headers .= "Reply-To: $user_email\r\n";

    // Send the email using wp_mail()
    if (wp_mail($to, $email_subject, $email_body, $headers)) {
        echo '<p style="color:green;">Your message has been sent successfully!</p>';
    } else {
        echo '<p style="color:red;">There was an error sending your message. Please try again.</p>';
    }
}
?>

<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="mt-40 w-full">
    <input type="hidden" name="action" value="save_contact_form">
    <div class="text">
        <input type="text" name="user_name" class="w-full" placeholder="Name" required>
    </div>
    <div class="text email mt-12">
        <input type="email" name="user_email" class="w-full" placeholder="Email" required>
    </div>
    <div class="text phone mt-12">
        <input type="tel" name="user_phone" class="w-full" placeholder="Phone" required>
    </div>
    <div class="text address mt-12">
        <input type="text" name="user_address" class="w-full" placeholder="Address">
    </div>
    <div class="text subject mt-12">
        <input type="text" name="user_subject" class="w-full" placeholder="Subject">
    </div>
    <div class="text subject mt-12">
    <textarea name="user_message" rows="5" placeholder="Type your message here..." class="text textarea mt-12"></textarea>
    </div>
    <button type="submit" class="primary-button mt-20">Submit</button>
</form>


    </div>
</div>

<?php get_footer(); ?>
