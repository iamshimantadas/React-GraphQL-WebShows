 <!-- footer section end -->
 <footer class="main-footer">
         <div class="container">
            <div class="top-footer padding-common">
               <div class="footer-row d-flex flex-wrap align-items-center justify-content-between">
                  <div class="logo-wrap">
                    <a href="<?php echo get_site_url(); ?>">
                        <img src="<?php echo get_field('footer_logo', 'option'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
                  </div>
                  <div class="fotter-right-col">
                  <div class="footer-menu">
                     <ul class="nav">
                     <?php wp_nav_menu(array(
                                    'menu' => 'Footer-Menu',
                                    'container' => false,
                                    'items_wrap' => '%3$s'
                                    ));
                                ?>
                     </ul>
                  </div>
                  <div class="footer-social">
                     <ul class="d-flex justify-content-end">
                        <?php if(get_field('meedium_url', 'option')){ ?> 
                        <li><a href="<?php echo get_field('meedium_url', 'option'); ?>" target="_blank"><i class="fa-brands fa-medium"></i></a></li>
                        <?php } ?>
                        <?php if(get_field('linkedin_url', 'option')){ ?> 
                        <li><a href="<?php echo get_field('linkedin_url', 'option'); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <?php } ?>
                        <?php if(get_field('portfolio_url', 'option')){ ?> 
                        <li><a href="<?php echo get_field('portfolio_url', 'option'); ?>" target="_blank"><i class="fa-solid fa-globe"></i></a></li>
                        <?php } ?>
                     </ul>
                  </div>
                  </div>
               </div>
            </div>
            <div class="bottom-footer text-center position-relative">
               <p>© <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?>. <?php echo get_field('copyright_text', 'option'); ?>
            </p>
            </div>
         </div>
      </footer>
      <!-- footer section end -->

      <?php wp_footer(); ?>

   </body>
</html>