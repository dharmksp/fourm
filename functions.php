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


