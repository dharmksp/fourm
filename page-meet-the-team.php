<section class="funnel-house-header">
    <div class="funnel-text-div forth-page-text">
        <div class="text">
            <h2 class="funnel-text"><?php echo esc_html(get_theme_mod('meet_the_team_title', 'Meet The Team')); ?></h2>
            <div class="imges">
                <p><?php echo esc_html(get_theme_mod('meet_the_team_total_members_text', 'Total Members')); ?></p>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/3 User.svg" alt="" /> 
                <p><?php echo esc_html(get_theme_mod('meet_the_team_total_members', '04')); ?></p>
            </div>
        </div>
        <p class="normal-text">
            <?php echo wp_kses_post(get_theme_mod('meet_the_team_description', 'Lorem Ipsum has been the industry\'s standard dummy text...')); ?>
        </p>
    </div>
</section>

<div class="team-info-container">
    <?php 
    $team_members = get_theme_mod('team_members', []);
    if (!empty($team_members)) :
        foreach ($team_members as $member) :
    ?>
        <div class="team">
            <div class="img-of-member p-rel">
                <div class="oval p-rel z-0"></div>
                <?php if (!empty($member['image'])) : ?>
                    <img src="<?php echo esc_url($member['image']); ?>" alt="" class="team-img1 p-rel z-1">
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/default-avatar.svg" alt="" class="team-img1 p-rel z-1">
                <?php endif; ?>
            </div>
            <p class="name"><?php echo esc_html($member['name']); ?></p>
            <p class="designation"><?php echo esc_html($member['designation']); ?></p>
        </div>
    <?php endforeach; endif; ?>
</div>
