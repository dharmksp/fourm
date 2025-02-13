<?php


function register_projects_cpt() {
    $args = array(
        'labels'      => array(
            'name'          => __('Projects'),
            'singular_name' => __('Project')
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'menu_icon'   => 'dashicons-building',
        'rewrite'     => array('slug' => 'projects')
    );
    register_post_type('projects', $args);
}
add_action('init', 'register_projects_cpt');

function register_project_taxonomy() {
    $args = array(
        'labels' => array(
            'name'          => __('Project Categories'),
            'singular_name' => __('Project Category'),
        ),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array('slug' => 'project_category'),
    );
    register_taxonomy('project_category', 'projects', $args);
}
add_action('init', 'register_project_taxonomy');
function add_project_images_metabox() {
    add_meta_box(
        'project_images',
        __('Project Gallery'),
        'project_images_metabox_callback',
        'projects',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_project_images_metabox');

function custom_theme_setup() {
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    
}
add_action('after_setup_theme', 'custom_theme_setup');

function project_images_metabox_callback($post) {
    $gallery_images = get_post_meta($post->ID, '_project_gallery_images', true);
    ?>
    <div id="project-gallery-container">
        <ul id="project-gallery-list">
            <?php if (!empty($gallery_images)) : ?>
                <?php foreach ($gallery_images as $image_id) : ?>
                    <li>
                        <img src="<?php echo wp_get_attachment_image_url($image_id, 'thumbnail'); ?>" width="100">
                        <input type="hidden" name="project_gallery_images[]" value="<?php echo esc_attr($image_id); ?>">
                        <button class="remove-image">Remove</button>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <button id="upload_gallery_button" class="button">Add Images</button>
    </div>
    <script>
        jQuery(document).ready(function($){
            let frame;
            $('#upload_gallery_button').click(function(e){
                e.preventDefault();
                if (frame) {
                    frame.open();
                    return;
                }
                frame = wp.media({
                    title: 'Select Images for Project Gallery',
                    button: { text: 'Add to Gallery' },
                    multiple: true
                });
                frame.on('select', function(){
                    let selection = frame.state().get('selection');
                    let galleryList = $('#project-gallery-list');
                    selection.each(function(attachment){
                        let imageUrl = attachment.attributes.url;
                        let imageId = attachment.id;
                        galleryList.append(`
                            <li>
                                <img src="${imageUrl}" width="100">
                                <input type="hidden" name="project_gallery_images[]" value="${imageId}">
                                <button class="remove-image">Remove</button>
                            </li>
                        `);
                    });
                });
                frame.open();
            });
            $(document).on('click', '.remove-image', function(e){
                e.preventDefault();
                $(this).closest('li').remove();
            });
        });
    </script>
    <?php
}

function save_project_gallery($post_id) {
    if (isset($_POST['project_gallery_images'])) {
        update_post_meta($post_id, '_project_gallery_images', $_POST['project_gallery_images']);
    } else {
        delete_post_meta($post_id, '_project_gallery_images');
    }
}
add_action('save_post', 'save_project_gallery');

function our_story_customizer_settings($wp_customize) {
    // Section
    $wp_customize->add_section('meet_our_team_section', array(
        'title'    => __('Meet Our Team', 'yourtheme'),
        'priority' => 30,
    ));

    // Title Field
    $wp_customize->add_setting('meet_title', array(
        'default'   => 'Meet The Team',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('meet_title', array(
        'label'    => __('Title', 'yourtheme'),
        'section'  => 'meet_our_team_section',
        'type'     => 'text',
    ));

    // Description Field
    $wp_customize->add_setting('meet_description', array(
        'default'   => 'Your story description here...',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('meet_description', array(
        'label'    => __('Description', 'yourtheme'),
        'section'  => 'meet_our_team_section',
        'type'     => 'textarea',
    ));

    // Team Members (Repeater-like functionality)
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("team_member_{$i}_name", array(
            'default'   => "Member {$i}",
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("team_member_{$i}_name", array(
            'label'    => __("Team Member {$i} Name", 'yourtheme'),
            'section'  => 'meet_our_team_section',
            'type'     => 'text',
        ));

        $wp_customize->add_setting("team_member_{$i}_role", array(
            'default'   => "Role {$i}",
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("team_member_{$i}_role", array(
            'label'    => __("Team Member {$i} Role", 'yourtheme'),
            'section'  => 'meet_our_team_section',
            'type'     => 'text',
        ));

        $wp_customize->add_setting("team_member_{$i}_image", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "team_member_{$i}_image", array(
            'label'    => __("Team Member {$i} Image", 'yourtheme'),
            'section'  => 'meet_our_team_section',
        )));
    }
}

add_action('customize_register', 'our_story_customizer_settings');
add_action('after_setup_theme', function() {
    add_theme_support('customize-selective-refresh-widgets');
});

function custom_contact_meta_box() {
    add_meta_box(
        'contact_details',
        'Contact Page Details',
        'custom_contact_fields_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'custom_contact_meta_box');

function custom_contact_fields_callback($post) {
    // Retrieve stored values if available
    $contact_title = get_post_meta($post->ID, '_contact_title', true) ?: 'Contact Us';
    $contact_description = get_post_meta($post->ID, '_contact_description', true) ?: 'Feel free to reach out to us for any inquiries.';
    $contact_address = get_post_meta($post->ID, '_contact_address', true) ?: '123 Default Street, City, Country';
    $contact_email = get_post_meta($post->ID, '_contact_email', true) ?: 'contact@example.com';
    $contact_phone = get_post_meta($post->ID, '_contact_phone', true) ?: '+1 234 567 890';
    
    ?>
    <label for="contact_title">Title:</label>
    <input type="text" id="contact_title" name="contact_title" value="<?php echo esc_attr($contact_title); ?>" class="widefat">
    
    <label for="contact_description">Description:</label>
    <textarea id="contact_description" name="contact_description" class="widefat"><?php echo esc_textarea($contact_description); ?></textarea>
    
    <label for="contact_address">Address:</label>
    <input type="text" id="contact_address" name="contact_address" value="<?php echo esc_attr($contact_address); ?>" class="widefat">
    
    <label for="contact_email">Email:</label>
    <input type="email" id="contact_email" name="contact_email" value="<?php echo esc_attr($contact_email); ?>" class="widefat">
    
    <label for="contact_phone">Phone:</label>
    <input type="text" id="contact_phone" name="contact_phone" value="<?php echo esc_attr($contact_phone); ?>" class="widefat">
    <?php
}

// Save custom field values
function save_custom_contact_fields($post_id) {
    if (isset($_POST['contact_title'])) {
        update_post_meta($post_id, '_contact_title', sanitize_text_field($_POST['contact_title']));
    }
    if (isset($_POST['contact_description'])) {
        update_post_meta($post_id, '_contact_description', sanitize_textarea_field($_POST['contact_description']));
    }
    if (isset($_POST['contact_address'])) {
        update_post_meta($post_id, '_contact_address', sanitize_text_field($_POST['contact_address']));
    }
    if (isset($_POST['contact_email'])) {
        update_post_meta($post_id, '_contact_email', sanitize_email($_POST['contact_email']));
    }
    if (isset($_POST['contact_phone'])) {
        update_post_meta($post_id, '_contact_phone', sanitize_text_field($_POST['contact_phone']));
    }
}
add_action('save_post', 'save_custom_contact_fields');

function custom_page_images_metabox() {
    add_meta_box(
        'custom_page_images',
        'Upload Page Images',
        'custom_page_images_callback',
        'page',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'custom_page_images_metabox');

function custom_page_images_callback($post) {
    $images = get_post_meta($post->ID, '_custom_page_images', true);
    if (!is_array($images)) {
        $images = [];
    }
    ?>
    <div id="custom_images_preview">
        <?php foreach ($images as $image) : ?>
            <div class="custom-image-item" style="margin-bottom: 10px;">
                <img src="<?php echo esc_url($image); ?>" width="100%" />
                <input type="hidden" name="custom_page_images[]" value="<?php echo esc_attr($image); ?>" />
                <button class="remove_image_button button">Remove</button>
            </div>
        <?php endforeach; ?>
    </div>
    
    <button class="upload_images_button button">Upload Images</button>

    <script>
    jQuery(document).ready(function($){
        var frame;
        $('.upload_images_button').click(function(e){
            e.preventDefault();
            frame = wp.media({
                title: 'Select or Upload Images',
                button: { text: 'Use these images' },
                multiple: true
            });
            frame.open();
            frame.on('select', function(){
                var selection = frame.state().get('selection');
                selection.each(function(attachment){
                    var imageUrl = attachment.toJSON().url;
                    var newImage = '<div class="custom-image-item" style="margin-bottom: 10px;">' +
                        '<img src="'+imageUrl+'" width="100%" />' +
                        '<input type="hidden" name="custom_page_images[]" value="'+imageUrl+'" />' +
                        '<button class="remove_image_button button">Remove</button>' +
                        '</div>';
                    $('#custom_images_preview').append(newImage);
                });
            });
        });

        $(document).on('click', '.remove_image_button', function(e){
            e.preventDefault();
            $(this).parent().remove();
        });
    });
    </script>
    <?php
}

function save_custom_page_images($post_id) {
    if (isset($_POST['custom_page_images'])) {
        update_post_meta($post_id, '_custom_page_images', $_POST['custom_page_images']);
    } else {
        delete_post_meta($post_id, '_custom_page_images');
    }
}
add_action('save_post', 'save_custom_page_images');
