<?php get_header();?>
<div class="banner-wrapper p-rel">
          <div class="image-wrapper">
		  <img class="pc" id="site-banner-image" src="<?php echo esc_url(get_theme_mod('hero_image', '')); ?>" alt="Banner Image">
           <!--  <img src="<?php echo get_template_directory_uri();?>/image/banner.png" alt="" class="pc"> -->
            <img src="<?php echo get_template_directory_uri();?>/image/Frame 313 (1).png" alt="" class="laptop">
            <img src="<?php echo get_template_directory_uri();?>/image/Frame 311.png" alt="" class="mobile">
          </div>
          <div class="banner-text p-rel z-1">
			<?php 
			$banner_text1 = get_theme_mod('hero_1_text','ARCHITECTURE & INTERIOR DESIGN');
            $banner_heading=get_theme_mod('hero_heading_text','The Forum Advaita Let Our Family Bring Your Home');
            $banner_text2 = get_theme_mod('hero_2_text','We turn your empty house to a lovely home, making the compact spaces  with sapce saving furnitures. Making the unique tastes of yours into reality!');
			?>
            <p class="small-faded-banner-text m-0 mb-10"><?php echo $banner_text1;?></p>
            <h1 class="largest-banner-text m-0 mb-20"><?php echo $banner_heading?></h1>
            <p class="normal-banner-text m-0 mb-30"><?php echo $banner_text2;?></p>
            <button class="primary-button">Let's Work Together</button>
            <img src="<?php echo get_template_directory_uri();?>/image/line.svg" alt="" class="line">
          </div>
          
        </div>
        

        <div class="img-text-container extra-margin">
          <div class="mobile-heading center-small-div p-rel">
            <div class="bullet-div m-0 mb-10">
              <div></div>
              <?php 
			$el_image1 = get_theme_mod('el_image1',);
            $el_image2 = get_theme_mod('el_image2',);
            $el_text1=get_theme_mod('el_text1','OUR SPACES FURTHER ENHANCES');
            $el_text2=get_theme_mod('el_text2','ELEGANCE IN SIMPLICITY');
            $el_text3=get_theme_mod('te_text3_p1','At forumadvaita the natural sunlight is used to render the spaces within. such spaces satisfy psychological and physical function of a space and offer memories.spaces under the influence of natural sunlight give a very theatrical experience to the user and eventually become one with the space');
            $el_text4=get_theme_mod('te_text3_p2','The play of levels in our spaces further enhances this experience and one is completely disconnected from the outside world and begins to belong to a world of its own');
			?>
              <h4 class="small-heading m-0">OUR SPACES FURTHER ENHANCES </h4>
            </div>
            <h2 class="heading-text m-0 w-full">ELEGANCE IN SIMPLICITY</h2>
            <img src="<?php echo get_template_directory_uri();?>/image/line (1).svg" alt="" class="line2">
          </div>
          <div class="inner-container">
           
            <div class="img-container">
              <div class="img1">
                <img src="<?php echo $el_image1;?>" alt="">
              </div>
              <div class="img1">
                <img src="<?php echo $el_image2;?>" alt="">
              </div>
            </div>
            <div class="text-container">
              <div class="bullet-div m-0 mb-10">
                <div></div>
                <h4 class="small-heading m-0"><?php echo $el_text1;?> </h4>
              </div>

              <div class="heading p-rel">
                <h2 class="heading-text m-0 w-full"><?php echo $el_text2;?></h2>
                <img src="<?php echo get_template_directory_uri();?>/image/line (1).svg" alt="" class="line2">
              </div>
              <p class="normal-text m-0 mb-10"><?php echo $el_text3;?></p>
              <p class="normal-text m-0 mb-30">The play of levels in our spaces further enhances this experience and one is completely disconnected from the outside world and begins to belong to a world of its own </p>
              <button class="primary-button">Let's Work Together</button>
            </div>
          </div>
        </div>

        <div class="img-text-container gray-background">
          <div class="mobile-heading p-rel">
            <div class="bullet-div m-0 mb-10">
              <div></div>
              <h4 class="small-heading m-0">OUR SPACES FURTHER ENHANCES </h4>
            </div>
            <h2 class="heading-text m-0 w-full">THEATRICAL EXPERIENCES</h2>
            <img src="<?php echo get_template_directory_uri();?>/image/line (2).svg" alt="" class="line4">
          </div>
          <div class="inner-container">
            
            <div class="text-container">
              <div class="bullet-div m-0 mb-10">
                <div></div>
                <?php 
			      $te_image1 = get_theme_mod('te_image1',);
            $te_image2 = get_theme_mod('te_image2',);
            $te_text1=get_theme_mod('te_text1','OUR SPACES FURTHER ENHANCES');
            $te_text2=get_theme_mod('te_text2','THEATRICAL EXPERIENCES');
            $te_text3=get_theme_mod('te_text3_p1','At forumadvaita the natural sunlight is used to render the spaces within. such spaces satisfy psychological and physical function of a space and offer memories.spaces under the influence of natural sunlight give a very theatrical experience to the user and eventually become one with the space');
            $te_text4=get_theme_mod('te_text3_p2','The play of levels in our spaces further enhances this experience and one is completely disconnected from the outside world and begins to belong to a world of its own');
			?>
                <h4 class="small-heading m-0"><?php echo $te_text1;?>" </h4>
              </div>

              <div class="heading p-rel">
                <h2 class="heading-text m-0 w-full"><?php echo $te_text2;?></h2>
                <img src="<?php echo get_template_directory_uri();?>/image/line (2).svg" alt="" class="line4">
              </div>

              <p class="normal-text destop-content m-0 mb-10"><?php echo $te_text3;?></p>
              <p class="normal-text destop-content m-0 mb-30"><?php echo $te_text4;?></p>
              <button class="primary-button destop-content">View Details</button>

              
            </div>

            <div class="img-container">
              <div class="img2">
                <img src="<?php echo $te_image1?>" alt="">
              </div>
              <div class="img2">
                <img src="<?php echo $te_image2?>" alt="">
              </div>
            </div>
          </div>

        </div>

        <div class="img-text-container">
          <div class="mobile-heading p-rel">
            <div class="bullet-div m-0 mb-10">
              <div></div>
              <?php 
		      	$sa_image1 = get_theme_mod('sa_image1',);
            
            $sa_text1=get_theme_mod('sa_text1','OUR SPACES FURTHER ENHANCES');
            $sa_text2=get_theme_mod('sa_text2','ELEGANCE IN SIMPLICITY');
            $sa_text3=get_theme_mod('sa_text3_p1','At forumadvaita the natural sunlight is used to render the spaces within. such spaces satisfy psychological and physical function of a space and offer memories.spaces under the influence of natural sunlight give a very theatrical experience to the user and eventually become one with the space');
            $sa_text4=get_theme_mod('sa_text3_p2','The play of levels in our spaces further enhances this experience and one is completely disconnected from the outside world and begins to belong to a world of its own');
            //echo $sa_text3;
			?>
              <h4 class="small-heading m-0">OUR SPACES FURTHER ENHANCES </h4>
            </div>
            <h2 class="heading-text m-0 w-full">STORIES IN ARCHITECTURE</h2>
            <img src="<?php echo get_template_directory_uri();?>/image/line (1).svg" alt="" class="line3">
          </div>
          <div class="inner-container">
            <div class="img-container">
              <div class="library">
                <img src="<?php echo $sa_image1;?>" alt="">
              </div>
            </div>
            <div class="text-container">
              <div class="bullet-div m-0 mb-10">
                <div></div>
                
                <h4 class="small-heading m-0"><?php echo $sa_text1;?> </h4>
              </div>

              <div class="heading p-rel">
                <h2 class="heading-text m-0 w-full"><?php echo $sa_text2;?></h2>
                <img src="<?php echo get_template_directory_uri();?>/image/line (1).svg" alt="" class="line3">
              </div>

              <p class="normal-text m-0 mb-10"><?php echo $sa_text3; ?></p>
              <p class="normal-text m-0 mb-30"><?php echo $sa_text4; ?></p>
              <button class="primary-button">View Details</button>
            </div>
          </div>
        </div>

        <div class="img-text-container gray-background">
          <div class="mobile-heading p-rel">
            <div class="bullet-div m-0 mb-10">
              <div></div>
              <?php 
		      	$sc_image1 = get_theme_mod('sc_image1',);
            
            $sc_text1=get_theme_mod('sc_text1','OUR SPACES FURTHER ENHANCES');
            $sc_text2=get_theme_mod('sc_text2','ELEGANCE IN SIMPLICITY');
            $sc_text3=get_theme_mod('sc_text3_p1','At forumadvaita the natural sunlight is used to render the spaces within. such spaces satisfy psychological and physical function of a space and offer memories.spaces under the influence of natural sunlight give a very theatrical experience to the user and eventually become one with the space');
            $sc_text4=get_theme_mod('sc_text3_p2','The play of levels in our spaces further enhances this experience and one is completely disconnected from the outside world and begins to belong to a world of its own');
            //echo $sa_text3;
			?>
              <h4 class="small-heading m-0">OUR SPACES FURTHER ENHANCES </h4>
            </div>
            <h2 class="heading-text m-0 w-full">THEATRICAL EXPERIENCES</h2>
            <img src="<?php echo get_template_directory_uri();?>/image/line (2).svg" alt="" class="line4">
          </div>
          <div class="inner-container">
            <div class="text-container">
              <div class="bullet-div m-0 mb-10">
                <div></div>
                <h4 class="small-heading m-0"><?php echo  $sc_text1;?> </h4>
              </div>

              <div class="heading p-rel">
                <h2 class="heading-text m-0 w-full"><?php echo  $sc_text2;?></h2>
                <img src="<?php echo get_template_directory_uri();?>/image/line (2).svg" alt="" class="line4">
              </div>

              <p class="normal-text destop-content m-0 mb-10"><?php echo $sc_text3; ?></p>
              <p class="normal-text destop-content m-0 mb-30"><?php echo $sc_text4; ?> </p>
              <button class="primary-button destop-content">View Details</button>

             
            </div>

            <div class="img-container">
              <div class="img2">
                <img src="<?php echo get_template_directory_uri();?>/image/image (23).svg" alt="">
              </div>
              <div class="img2">
                <img src="<?php echo get_template_directory_uri();?>/image/jean-philippe-delberghe-xrjusFfOksI-unsplash.svg" alt="">
              </div>
            </div>
          </div>
        </div>
		<?php

get_footer();