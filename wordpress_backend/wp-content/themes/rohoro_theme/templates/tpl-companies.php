<?php
// Template Name: Companies
get_header();

$page_id = get_the_ID();
$no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
?>


<main>

   <?php echo get_sidebar('banner'); ?>

   <section class="company-section padding-common">
      <div class="container">
         <div class="top-row mb-50">
            <div class="row align-items-center">
               <div class="col-lg-6">
                  <div class="title-wrap">
                     <h2><?php echo get_field('company_section_title', $page_id); ?></h2>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="desc-wrap">
                     <p>
                        <?php echo get_field('company_right_side_short_description', $page_id); ?>
                     </p>
                  </div>
               </div>
            </div>
         </div>


         <div class="company-box-outer">
    <div class="row justify-content-center" id="company-container">
        <?php 
        if (have_rows('companies', $page_id)) :
            $total_companies = count(get_field('companies', $page_id));
            $limit = 6; 
            $i = 0;
            
            while (have_rows('companies', $page_id) && $i < $limit) : the_row();
        ?>
            <div class="col-lg-4 col-md-6 company-box-col">
                <div class="company-box position-relative">
                    <div class="company-box-inner position-relative">
                        <div class="icon-outer mb-50">
                            <div class="icon">
                                <img src="<?php echo get_sub_field('companies_company_logo') ? get_sub_field('companies_company_logo') : $no_image; ?>" alt="<?php echo get_sub_field('companies_company_name')," LOGO"; ?>">
                            </div>
                        </div>
                        <div class="company-title">
                            <h3><?php echo get_sub_field('companies_company_name'); ?></h3>
                        </div>
                        <div class="company-description">
                            <p><?php echo get_sub_field('companies_short_description'); ?></p>
                        </div>
                        <div class="company-button">
                            <a href="<?php echo get_sub_field('companies_button_url'); ?>" class="button__primary" target="_blank">
                                <span><?php echo get_sub_field('companies_button_title'); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            $i++;
            endwhile;
        endif;
        ?>
    </div>

    <div class="load-more-button-wrap text-center">
        <a href="#" id="load-more" class="button__primary button__primary-fill" data-offset="6" data-total="<?php echo $total_companies; ?>">
            <span>Load More</span>
        </a>
    </div>
</div>




      </div>
   </section>
</main>



<script>
   jQuery(document).ready(function ($) {
      $('#load-more').on('click', function (e) {
         e.preventDefault();

         var button = $(this),
            offset = parseInt(button.attr('data-offset')),
            total = parseInt(button.attr('data-total')),
            pageId = <?php echo $page_id; ?>;

         $.ajax({
            type: 'POST',
            url: ajax_params.ajax_url, // Use WordPress localized AJAX URL
            data: {
               action: 'load_more_companies',
               page_id: pageId,
               offset: offset
            },
            beforeSend: function () {
               button.html('<span>Loading...</span>');
            },
            success: function (response) {
               var data = JSON.parse(response);
               if (data.html) {
                  $('#company-container').append(data.html);
                  button.attr('data-offset', offset + 6); // Update offset
                  button.html('<span>Load More</span>');

                  // Hide button if no more posts
                  if (data.has_more == 0) {
                     button.hide();
                  }
               } else {
                  button.hide();
               }
            },
            error:function(res){
               console.error(res);
            }
         });
      });
   });

</script>

<?php get_footer(); ?>