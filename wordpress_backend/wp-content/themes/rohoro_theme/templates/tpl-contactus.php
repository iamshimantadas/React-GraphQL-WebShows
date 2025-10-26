<?php
// Template Name: Contact Us
get_header();
?>


      <main>
      
      <?php get_sidebar('banner'); ?>

         <section class="contact-us-section padding-common">
            <div class="container">
               <div class="top-row mb-50">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <div class="title-wrap">
                           <h2><?php echo get_field('section_title', get_the_ID()); ?></h2>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="desc-wrap">
                           <p>
                           <?php echo get_field('short_description', get_the_ID()); ?>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="contact-form box-design">
                  <div class="arrow-wrap">
                     <div class="down-arrow right-down-arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/down-arrow.png" alt=""></div>
                     <div class="down-arrow left-down-arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/down-arrow-right.png" alt=""></div>
                  </div>
                  
                  
               <?php echo do_shortcode('[contact-form-7 id="dc801c4" title="Contact form"]'); ?>



               </div>
            </div>
         </section>
      </main>


<?php get_footer(); ?>