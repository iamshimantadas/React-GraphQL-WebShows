<?php

get_header();

$no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
$cat = get_the_category();
?>

<main>

    <section class="inner-banner-section light-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="info-wraper">
                        <h1>Our <?php echo $cat[0]->cat_name; ?></h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php
                    $category_image = get_field('category_image', 'category_' . $cat[0]->cat_ID);
                    ?>
                    <div class="image-outer text-end position-relative">
                        <div class="man-image">
                            <img src="<?php echo $category_image ? $category_image : $no_image; ?>" alt="">
                        </div>
                        <div class="element-design banner-lightning">
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-lightning-left.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  -->   
    <?php
    $wq = new WP_Query(array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $cat[0]->cat_ID,
            ),
        ),
        'posts_per_page' => -1,
        'orderBy' => 'DESC',
    ));

    if ($wq->have_posts()) {
        while ($wq->have_posts()) {
            $wq->the_post();
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            $no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";

            if (get_field('is_featured_post_', get_the_ID())) {

                $video_file = get_field('upload_video_file', get_the_ID());
				$youtube_video_link = get_field('youtube_video_link', get_the_ID());
                ?>
                <section class="featured-section padding-common">
                    <div class="container">
                        <div class="section-title">
                            <h2>Featured <?php echo $cat[0]->cat_name; ?></h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-6">
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
									</div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-wrap">
                                    <div class="date-wrap">
                                        <p><?php echo get_the_date(); ?></p>
                                    </div>
                                    <h3>
                                        <?php echo get_the_title(); ?>
                                    </h3>
                                    <p>
                                        <?php echo substr(get_the_content(), 0, 200); ?>
                                    </p>
                                    <?php $external_article_link = get_field('external_article_link', get_the_ID());
								  if(empty($youtube_video_link)) { ?>
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
                        </div>
                    </div>
                </section>
                <?php
                break;
            }

        }
    } ?>


    <section class="card-box-section padding-common light-bg">
        <div class="container">
            <div class="card-box-outer">
                <div class="row" id="posts-card">

                    <?php
                    $wq = new WP_Query(array(
                        'post_type' => 'post',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => $cat[0]->cat_ID,
                            ),
                        ),
                        'posts_per_page' => 4,
                        'orderBy' => 'DESC',
                    ));

                    $total_posts = $wq->found_posts;
                    $posts_displayed = $wq->post_count;


                    if ($wq->have_posts()) {
                        $vid_id = 1;
                        while ($wq->have_posts()) {
                            $wq->the_post();
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                            $no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
                            $video_file = get_field('upload_video_file', get_the_ID());
							$youtube_video_link = get_field('youtube_video_link', get_the_ID());
                                ?>
                                <div class="col-md-6 card-box-col">
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

                                        <div class="date-wrap">
                                            <p>
                                                <?php echo get_the_date(); ?>
                                            </p>
                                        </div>
                                        <div class="title">
                                            <h3><?php echo get_the_title(); ?></h3>
                                        </div>
                                        <div class="card-info-wrap">
                                            <p>
                                                <?php echo substr(get_the_content(), 0, 100)."..."; ?>
                                            </p>
                                        </div>
                                        <div class="card-button">
                                            <?php $external_article_link = get_field('external_article_link', get_the_ID());
								  if(empty($youtube_video_link)) { ?>
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
                                </div>
                            <?php
                            $vid_id++;
                        }
                    }
                    ?>



                </div>
                <div class="button-wrap text-center">
                    <a id="load-more" class="button__primary button__primary-fill"><span>Load More</span></a>
                </div>
            </div>

        </div>
    </section>


    <script type="text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var posts_per_page = 2;
    var total_posts = <?php echo $total_posts; ?>;
    var posts_displayed = <?php echo $posts_displayed; ?>;

    jQuery(document).ready(function ($) {
      var page = 1;
      var category = '<?php echo single_cat_title("", false); ?>';

      $('#load-more').on('click', function () {
        var button = $(this);
        var data = {
          'action': 'load_more_posts',
          'page': page,
          'category': category
        };

        $.ajax({
          url: ajaxurl,
          data: data,
          type: 'POST',
          beforeSend: function (xhr) {
            button.text('Loading...');
          },
          success: function (data) {
      
            if ($.trim(data)) {
              $('#posts-card').append(data);
              button.html('<span>Load More</span>');
            //   button.addClass('button__primary-fill');
              page++;
              posts_displayed += posts_per_page;

              if (posts_displayed >= total_posts) {
                button.prop('disabled', true).hide(); // Hide the button when all posts are loaded
              }
            } else {
              button.html('<span>No more posts to load</span>');
            //   button.addClass('button__primary-fill');
              button.prop('disabled', true).hide(); // Hide the button if no posts are returned
            }
          },
          error: function () {
            button.html('<span>Load More</span>');
            button.addClass('button__primary-fill');
            alert('An error occurred. Please try again.');
          }
        });
      });
    });
  </script>


<script>

    // pausing other videos except this... 
    function FeaturedVideoFunc(){
        let i=1;
        while(i < 100){
            document.getElementById(`video-${i}`).pause();
            i++;
        }
    }

    // pausing others videos except this....
    function VideoFunc(id){
        let i=1;
        document.getElementById('featured-video').pause();
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



</main>

<?php get_footer(); ?>