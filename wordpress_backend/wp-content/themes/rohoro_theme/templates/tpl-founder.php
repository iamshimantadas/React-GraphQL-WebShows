<?php
/*Template Name: Founder */
get_header();

$page_id = get_the_ID();
$no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
?>

<!-- body section start -->
<main>

   <?php echo get_sidebar('banner'); ?>


   <?php if (get_field('about_sec_section_image', $page_id)) { ?>
      <section class="team-about-section padding-common">
         <div class="container">
            <div class="box-design">
               <div class="arrow-wrap">
                  <div class="down-arrow right-down-arrow"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/down-arrow.png" ></div>
                  <div class="down-arrow left-down-arrow"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/down-arrow-right.png" ></div>
               </div>
               <div class="team-about-box text-center">
                  <div class="image-wraper">
                     <img
                        src="<?php echo get_field('about_sec_section_image', $page_id) ? get_field('about_sec_section_image', $page_id) : $no_image; ?>"
                        alt="Dr. Tony Jacob">
                  </div>
                  <div class="profile-wrap">
                     <p><?php echo get_field('about_sec_sub_title', $page_id); ?></p>
                     <h2><?php echo get_field('about_sec_title', $page_id); ?></h2>
                  </div>
                  <div class="profile-description">
                     <p>
                        <?php echo get_field('about_sec_short_description', $page_id); ?>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <?php } ?>

   <section class="team-tab-section padding-common light-bg">
      <div class="container">
         <div class="tab-wraper">
            <div class="tab-button-wrap mb-50">
               <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                  <?php
                  $categories = get_categories(array(
                     'taxonomy' => 'category',
                     'orderby' => 'name',
                     'parent' => 0,
                     'hide_empty' => 0,
                  ));
                  $i = 1;
                  foreach ($categories as $category) {
                     ?>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if ($i == 1) {
                           echo "active";
                        } ?>"
                           id="<?php echo strtoupper($category->name); ?>" data-bs-toggle="tab"
                           data-bs-target="#<?php echo strtoupper($category->name) . "-pane"; ?>" type="button" role="tab"
                           aria-controls="<?php echo strtoupper($category->name) . "-pane"; ?>"
                           aria-selected="true"><?php echo $category->name; ?></button>
                     </li>
                     <?php
                     $i++;
                  } ?>

               </ul>
            </div>

            <div class="tab-content" id="myTabContent">

               <?php
               $categories = get_categories(array(
                  'taxonomy' => 'category',
                  'orderby' => 'name',
                  'parent' => 0,
                  'hide_empty' => 0,
               ));
               $i = 1;
               foreach ($categories as $category) {
                  ?>
                  <div class="tab-pane fade <?php if ($i == 1) {
                     echo "show active";
                  } ?> "
                     id="<?php echo strtoupper($category->name) . "-pane"; ?>" role="tabpanel"
                     aria-labelledby="<?php echo strtoupper($category->name); ?>" tabindex="0">
                     <div class="tab-slider-wraper">
                        <div class="tab-title text-center mb-50">
                           <h2>Tony’s Latest <?php echo $category->name; ?></h2>
                        </div>
                        <div class="team-tab-slider">

                           <?php
                           $category_id = $category->term_id;

                           $args = array(
                              'cat' => $category_id,
                              'posts_per_page' => -1,
                              'orderby' => 'date',
                              'order' => 'DESC'
                           );

                           $category_posts = new WP_Query($args);
                           if ($category_posts->have_posts()) {
                              $vid_id = 1;
                              while ($category_posts->have_posts()) {
                                 $category_posts->the_post();

                                 $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                 $video_file = get_field('upload_video_file', get_the_ID());
									$youtube_video_link = get_field('youtube_video_link', get_the_ID());
                                 ?>

                                 <div class="slider-col">
                                    <div class="card-box">
                                       <?php if ($video_file) { ?>
                                          <div class="card-video card-image image-adjustment">
                                             <video controls id="<?php echo "video-".$vid_id; ?>" onplay="VideoFunc(<?php echo $vid_id; ?>)">
                                                <source src="<?php echo $video_file; ?>" type="video/mp4">
                                             </video>
                                          </div>
										<?php } elseif ($youtube_video_link) { ?>
										<iframe width="100%" height="240" src="<?php echo $youtube_video_link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                       <?php } else { ?>
                                          <div class="card-image image-adjustment">
                                             <img src="<?php echo $thumbnail[0] ? $thumbnail[0] : $no_image; ?>" alt="<?php echo get_the_title(); ?>">
                                          </div>
                                       <?php } ?>

                                       <div class="card-title mb-50">
                                          <h3><?php echo get_the_title(); ?></h3>
                                       </div>
                                       <div class="card-info">
                                          <p><?php echo get_the_excerpt(); ?></p>
                                       </div>
										<?php $external_article_link = get_field('external_article_link'); ?>
										<?php if(empty($youtube_video_link)) { ?>
                                       <div class="card-button">
										   <?php if(!empty($external_article_link)) { ?>
										   <a target="_blank" href="<?php echo $external_article_link; ?>" class="button__primary"><span>Read More</span></a>
										   <?php } else { ?>
										   <a href="<?php echo get_the_permalink(); ?>" class="button__primary"><span>Read More</span></a>
										   <?php } ?>
                                       </div>
										<?php } ?>
                                    </div>
                                 </div>

                              <?php 
                           $vid_id++;   
                           }
                           } ?>

                        </div>
                     </div>
                  </div>
                  <?php $i++;
               } ?>

            </div>
         </div>
      </div>
   </section>
</main>
<!-- body section end -->


<script>
   // pausing others videos except this....
   function VideoFunc(id){
        let i=1;
        while(i < 100){
            if(i == id){
                // skip
            }
            else{
                document.getElementById(`video-${i}`).pause();
            }
            
            i++;
        }
    }
</script>

<?php get_footer(); ?>