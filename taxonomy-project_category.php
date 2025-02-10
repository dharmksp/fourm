<?php get_header(); ?>

<div class="funnel-house-header">
        <div class="funnel-text-div third-page-text">
          <div class="text">
            <h2 class="funnel-text"><?php single_term_title(); ?></h2>
            <div class="imges">
              <p>Total Images</p>
              <img src="image/Image 2.svg" alt="" /> 
              <p>72</p>
            </div>
          </div>
          <p class="normal-text">
            We turn your empty house to a lovely home, making the compact spaces
            with sapce saving furnitures. Making the unique tastes of yours into
            reality!
          </p>
        </div>
      </div>

      <div class="grid-gallery">
      <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
        <div class="gallery-images">
        
        <?php the_post_thumbnail('medium'); ?>
          <div class="blur-div">
            <p><?php the_title(); ?></p>
            <span><a href="<?php the_permalink(); ?>" style="text-decoration: none; color:#fff; font-size: 14px;
    line-height: 17px;
    font-weight: 500;" >View project</a></span>
          </div>
          
        </div>
        <?php
            endwhile;
        else :
            echo '<p>No projects found.</p>';
        endif;
        ?>
      </div>

<!-- <main>
    <h1 class="page-title"></h1>

    <div class="project-grid">
        <?php
       /*  if (have_posts()) :
            while (have_posts()) : the_post(); */
        ?>
                <div class="project-item">
                    <a href="<?php //the_permalink(); ?>">
                        <?php //the_post_thumbnail('medium'); ?>
                        <div class="project-title"><?php //the_title(); ?></div>
                    </a>
                </div>
        <?php
         /*    endwhile;
        else :
            echo '<p>No projects found.</p>';
        endif; */
        ?>
    </div>
</main>
 -->
<?php get_footer(); ?>
