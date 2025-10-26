<?php get_header();
$post_id = get_the_ID();

$no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
?>


<!-- body section start -->
<main>

   <?php get_sidebar('banner'); ?>

   <?php if (get_field('about_us_sec_section_title', $post_id)) { ?>
      <section class="about-us-section padding-common pb-0" id="border-hit">
         <div class="container">
            <div class="about-box text-center position-relative">
               <div class="border-design"></div>
               <div class="border-top-design"></div>
               <div class="about-box-inner position-relative">
                  <h2><?php echo get_field('about_us_sec_section_title', $post_id); ?></h2>
                  <?php echo get_field('about_us_sec_description', $post_id); ?>
                  <?php if (get_field('about_us_sec_button_title', $post_id)) { ?>
                     <a href="<?php echo get_field('about_us_sec_button_url', $post_id); ?>" class="button__primary">
                        <span><?php echo get_field('about_us_sec_button_title', $post_id); ?></span>
                     </a>
                  <?php } ?>
               </div>
            </div>
         </div>
      </section>
   <?php } ?>

   <?php if (get_field('why_choose_sec_section_title', $post_id)) { ?>
      <section class="why-Choose-section padding-common">
         <div class="container">
            <div class="top-row">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="title-wrap">
                        <h2><?php echo get_field('why_choose_sec_section_title', $post_id); ?></h2>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="description-wrap">
                        <p>
                           <?php echo get_field('why_choose_sec_short_description', $post_id); ?>
                        </p>
                        <?php if (get_field('why_choose_sec_button_title', $post_id)) { ?>
                           <a href="<?php echo get_field('why_choose_sec_button_url', $post_id); ?>"
                              class="button__primary button__primary-fill">
                              <span>
                                 <?php echo get_field('why_choose_sec_button_title', $post_id); ?>
                              </span>
                           </a>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="why-Choose-box-wraper">
               <div class="row justify-content-center">
                  <?php
                  if (have_rows('why_choose_sec_boxes', $post_id)):
                     $count = 1;
                     while (have_rows('why_choose_sec_boxes', $post_id)):
                        the_row();
                        ?>
                        <div class="col-lg-4 col-md-6 why-Choose-box-col">
                           <div class="why-Choose-box">
                              <div class="number-wrap">0<?php echo $count; ?></div>
                              <div class="image-outer text-center">
                                 <div class="image-wrap">
                                    <img
                                       src="<?php echo get_sub_field('why_choose_sec_boxes_process_image') ? get_sub_field('why_choose_sec_boxes_process_image') : $no_image; ?>"
                                       alt="<?php echo get_sub_field('why_choose_sec_boxes_process_title'); ?>">
                                 </div>
                              </div>
                              <div class="why-Choose-box-title">
                                 <h3><?php echo get_sub_field('why_choose_sec_boxes_process_title'); ?></h3>
                              </div>
                           </div>
                        </div>
                        <?php
                        $count++;
                     endwhile;
                  else:
                  endif;
                  ?>

               </div>
            </div>
         </div>
      </section>
   <?php } ?>

   <?php if (get_field('process_sec_section_title', $post_id)) { ?>
      <section class="process-section padding-common">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-6">
                  <div class="info-wraper list-item">
                     <h2><?php echo get_field('process_sec_section_title', $post_id); ?></h2>
                     <ul>
                        <?php
                        if (have_rows('process_sec_options', $post_id)):
                           while (have_rows('process_sec_options', $post_id)):
                              the_row();
                              ?>
                              <li><?php echo get_sub_field('process_sec_options_processs_name'); ?></li>
                              <?php
                           endwhile;
                        else:
                        endif;
                        ?>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="process-time-box-wraper">
                     <?php
                     if (have_rows('process_boxes', $post_id)):
                        $count = 1;
                        while (have_rows('process_boxes', $post_id)):
                           the_row();
                           ?>
                           <div
                              class="process-time-box d-flex flex-wrap align-items-center justify-content-between position-relative">
                              <div class="number-wrap">0<?php echo $count; ?></div>
                              <div class="status-wrap">
                                 <p><?php echo get_sub_field('process_boxes_status_text'); ?></p>
                              </div>
                              <div class="time-wrap">
                                 <h3><?php echo get_sub_field('process_boxes_time'); ?></h3>
                              </div>
                           </div>
                           <?php
                           $count++;
                        endwhile;
                     else:
                     endif;
                     ?>

                  </div>
               </div>
            </div>
         </div>
      </section>
   <?php } ?>

   <?php if (get_field('investment_sec_section_title', $post_id)) { ?>
      <section class="investments-section padding-common pb-0">
         <div class="container">
            <div class="section title text-center mb-50">
               <h2><?php echo get_field('investment_sec_section_title', $post_id); ?></h2>
            </div>
            <div class="investments-box-wraper">
               <div class="row justify-content-center">

                  <?php
                  if (have_rows('investment_sec_boxes', $post_id)):
                     while (have_rows('investment_sec_boxes', $post_id)):
                        the_row();
                        ?>
                        <div class="col-lg-4 col-md-6 investments-box-col">
                           <div class="investments-box">
                              <div class="icon-wrap">
                                 <img src="<?php echo get_sub_field('investment_sec_boxes_image', $post_id) ? get_sub_field('investment_sec_boxes_image', $post_id) : $no_image; ?>"
                                    alt="<?php echo get_sub_field('investment_sec_boxes_title', $post_id); ?>"></div>
                              <div class="list-item">
                                 <h3><?php echo get_sub_field('investment_sec_boxes_title', $post_id); ?></h3>
                                 <ul>
                                    <?php echo get_sub_field('investment_sec_boxes_options', $post_id); ?>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     <?php
                     endwhile;
                  else:
                  endif;
                  ?>
               </div>
               <div class="button-row text-center">
                  <?php if (get_field('investment_sec_button_title')) { ?>
                     <a href="<?php echo get_field('investment_sec_button_url'); ?>" class="button__primary"><span>
                           <?php echo get_field('investment_sec_button_title'); ?>
                        </span></a>
                  <?php } ?>
               </div>
            </div>
         </div>
      </section>
   <?php } ?>

   <section class="who-we-help-section padding-common">
      <div class="container">
         <div class="top-row mb-50">
            <div class="row">
               <div class="col-lg-6">
                  <div class="title-wrap">
                     <h2>
                        <?php echo get_field('who_we_help_sec_title', $post_id); ?>
                     </h2>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="description-wrap">
                     <p>
                        <?php echo get_field('who_we_help_sec_description', $post_id); ?>
                     </p>
                     <?php if (get_field('who_we_help_sec_button_title', $post_id)) { ?>
                        <a href="<?php echo get_field('who_we_help_sec_button_url', $post_id); ?>"
                           class="button__primary button__primary-fill"><span>
                              <?php echo get_field('who_we_help_sec_button_title', $post_id); ?>
                           </span></a>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="help-box-wraper">
            <div class="row">

               <?php
               if (have_rows('who_we_help_sec_help_boxes', $post_id)):
                  $count = 1;
                  while (have_rows('who_we_help_sec_help_boxes', $post_id)):
                     the_row();
                     ?>
                     <div class="col-lg-3 col-md-4 col-sm-6 help-box-col">
                        <div class="help-box">
                           <div class="title-wrap">
                              <div class="number">
                                 <p>0<?php echo $count; ?></p>
                              </div>
                              <h3>
                                 <?php echo get_sub_field('who_we_help_sec_help_boxes_title'); ?>
                              </h3>
                           </div>
                           <div class="description-wrap">
                              <p>
                                 <?php echo get_sub_field('who_we_help_sec_help_boxes_short_description'); ?>
                              </p>
                           </div>
                        </div>
                     </div>
                     <?php
                     $count++;
                  endwhile;
               else:
               endif;
               ?>

            </div>
         </div>
      </div>
   </section>
   <section class="testimonial-section padding-common light-bg">
      <div class="container">
         <div class="title-wraper mb-50">
            <h2>
               <?php echo get_field('testimonial_sec_title', $post_id); ?>
            </h2>
         </div>
         <div class="testimonial-row d-flex flex-wrap">
            <div class="arrow-wrap d-flex">
               <div class="slider-prev-button"></div>
               <div class="slider-next-button"></div>
            </div>
            <div class="testimonial-slider-wraper">
               <div class="testimonial-slider">

                  <?php
                  if (have_rows('testimonial_sec_feedbacks', $post_id)):
                     while (have_rows('testimonial_sec_feedbacks', $post_id)):
                        the_row();
                        ?>
                        <div class="slider-col">
                           <div class="testimonial-box">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="review-wraper">
										<?php $company_logo = get_sub_field('testimonial_sec_feedbacks_company_logo'); 
											if(!empty($company_logo)) {
										?>
                                       <div class="logo-wrap">
                                          <img src="<?php echo $company_logo ; ?>" alt="<?php echo get_sub_field('testimonial_sec_feedbacks_clients_name'); ?>">
                                       </div>
										<?php } ?>
                                       <div class="profile-info">
                                          <h3><?php echo get_sub_field('testimonial_sec_feedbacks_clients_name'); ?></h3>
                                          <p><?php echo get_sub_field('testimonial_sec_feedbacks_designation'); ?></p>
                                       </div>
                                       <p><?php echo get_sub_field('testimonial_sec_feedbacks_clients_feedback'); ?></p>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="image-wraper image-adjustment">
                                       <img src="<?php echo get_sub_field('testimonial_sec_feedbacks_clients_profile_image') ? get_sub_field('testimonial_sec_feedbacks_clients_profile_image') : $no_image; ?>" alt="<?php echo get_sub_field('testimonial_sec_feedbacks_clients_name'); ?>">
                                    </div>
                                 </div>
                              </div>
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
      </div>
   </section>
</main>
<!-- body section end -->


<?php get_footer(); ?>