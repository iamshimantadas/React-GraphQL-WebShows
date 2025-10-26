<?php 
/*Template Name: Team */
 get_header();

 $no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
 ?>

<main>

<?php echo  get_sidebar('banner'); ?>

         <section class="team-section padding-common">
            <div class="container">
               <div class="team-box-outer">
                  <div class="row">
                     
                  <?php 
                  if( have_rows('members_sec_', get_the_ID()) ):
                    while( have_rows('members_sec_', get_the_ID()) ) :
                         the_row();
                  ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6 team-box-col">
                        <div class="team-box">
                           <div class="team-box-image image-adjustment">
                            <img src="<?php echo get_sub_field('members_sec_members_profile', get_the_ID()) ? get_sub_field('members_sec_members_profile',  get_the_ID()) : $no_image; ?>" alt="<?php echo get_sub_field('members_sec_members_name'); ?>">
                           </div>
                           <div class="team-box-info">
                              <h4>
                                <?php echo get_sub_field('members_sec_members_name'); ?>
                              </h4>
                              <p>
                              <?php echo get_sub_field('members_sec_short_description'); ?>
                              </p>
                           </div>
                        </div>
                     </div>
                     <?php 
                     endwhile;
                     else :
                     endif;
                     ?>
                     
                  </div>
               </div>
            </div>
         </section>
      </main>


<?php get_footer(); ?>