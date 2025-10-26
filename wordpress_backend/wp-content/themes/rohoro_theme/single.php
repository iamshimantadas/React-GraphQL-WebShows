<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); 

global $current_user;

$fname = get_the_author_meta('first_name', $current_user->ID);
$lname = get_the_author_meta('last_name', $current_user->ID);

$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
$no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
$video = get_field('upload_video_file', get_the_ID());
?>  

<main>
         <section class="details-section padding-common">
            <div class="container">
               <div class="details-inner">
                  <div class="title-wrap text-center">
                     <ul class="d-flex justify-content-center align-items-center">
                        <li><?php echo get_the_date('F j, Y'); ?></li>
                        <li>
                            <?php echo $fname." ".$lname; ?>
                        </li>
                     </ul>
                     <h1><?php echo get_the_title(); ?></h1>
                  </div>
                  
                  <?php if(! $video){ ?> 
                  <div class="image-wraper image-adjustment">
                     <img src="<?php echo $thumbnail[0] ? $thumbnail[0] : $no_image; ?>" alt="">
                  </div>
                  <?php }else{ ?> 
                  <div class="video-wraper image-adjustment">
                  <video width="800" controls>
                    <source src="<?php echo $video; ?>" type="video/mp4">
                    Your browser does not support HTML video.
                    </video>
                  </div>
                  <?php } ?>

                  <div class="details-info">
                     <?php echo the_content(); ?>
                     <div class="image-wraper image-adjustment">
                        <img src="<?php echo get_field('2nd_paragraph_image', $page_id) ? get_field('2nd_paragraph_image', $page_id) : $no_image; ?>" alt="">
                     </div>
                     <?php echo get_field('2nd_paragraph', $page_id); ?>
                  </div>
               </div>
               
            </div>
         </section>
      </main>


<?php endwhile; else: ?>
<h2><?php _e('Not Found')?></h2>
<p><?php _e('Sorry,no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>