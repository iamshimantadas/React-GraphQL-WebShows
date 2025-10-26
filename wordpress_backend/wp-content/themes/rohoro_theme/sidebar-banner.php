<?php 
$post_id = get_the_ID();
if(is_front_page()){ ?>
  <!-- BANNER START -->
  <section class="hero-section padding-common light-bg">
      <div class="container">
         <div class="info-wraper text-center position-relative">
            <h1>
               <?php echo get_field('banner_title', $post_id); ?>
            </h1>
            <?php if (get_field('banner_lighting_image', $post_id)) { ?>
               <div class="banner-lightning">
                  <img src="<?php echo get_field('banner_lighting_image', $post_id); ?>" alt="">
               </div>
            <?php } ?>
            <?php if (get_field('banner_image', $post_id)) { ?>
               <div class="man-image"><img src="<?php echo get_field('banner_image', $post_id); ?>" alt="">
               </div>
            <?php } ?>
         </div>
         <div class="slider-wraper">
            <div class="marquee-slider">
               <?php
               if (have_rows('banner_slider_options', $post_id)):
                  while (have_rows('banner_slider_options', $post_id)):
                     the_row();
                     ?>
                     <div class="slider-col">
                        <div class="title">
                           <p><?php echo get_sub_field('banner_slider_options_option_name'); ?></p>
                        </div>
                     </div>
                  <?php
                  endwhile;
               else:
               endif;
               ?>

            </div>
         </div>
      </div>
   </section>
   <!-- BANNER END  -->
<?php }else{ ?>
    <section class="inner-banner-section light-bg">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6">
                     <div class="info-wraper">
                        <h1>
                            <?php echo get_field('inner_banner_title', $post_id); ?>
                        </h1>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="image-outer text-end position-relative">
                        <?php if(get_field('inner_banner_image', $post_id)){ ?>
                        <div class="man-image">
                            <img src="<?php echo get_field('inner_banner_image', $post_id); ?>" alt="">
                        </div>
                        <?php } ?>
                        <?php if(get_field('inner_banner_lightning_image', $post_id)){ ?>
                        <div class="element-design banner-lightning">
                           <img src="<?php echo get_field('inner_banner_lightning_image', $post_id); ?>" alt="">
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </section>
<?php } ?>