<!doctype html>
<html <?php language_attributes(); ?>>
   <head>
      <!-- Required meta tags -->
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Required meta tags -->
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>


      <!-- header section start -->
      <header class="header__main">
         <div class="header-inner__wrapper">
            <div class="container">
               <div class="header-row d-flex align-items-center justify-content-between">
                  <div class="logo-wrap">
                    <a href="<?php echo get_site_url(); ?>">
                        <img src="<?php echo get_field('header_logo', 'option'); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
                  </div>
                  <div class="desktop-menu">
                     <ul class="nav">
                        <?php wp_nav_menu(array(
                                    'menu' => 'Desktop-Menu',
                                    'container' => false,
                                    'items_wrap' => '%3$s'
                                    ));
                                ?>

                     </ul>
                  </div>
                  <div class="right-col d-flex align-items-center">
                  <?php if(get_field('header_button_title', 'option')){ ?>    
                  <div class="buttom-wrap">
                        <a href="<?php echo get_field('header_button_url', 'option'); ?>" class="button__primary">
                           <span>
                           <?php echo get_field('header_button_title', 'option'); ?>
                           </span>
                        </a>
                     </div>
                     <?php } ?>
                     <div class="hamburger-nav">
                        <span></span>
                        <span></span>
                        <span></span>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="mobile-menu">
            <div class="top-row d-flex align-items-center justify-content-between">
               <div class="logo-wrap">
                  <a href="<?php echo get_site_url(); ?>">
                     <img src="<?php echo get_field('header_logo', 'option'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                  </a>
               </div>
               <div class="hamburger-nav-close">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
            </div>
            <div class="mobile-menubar">
               <ul>
               <?php wp_nav_menu(array(
                'menu' => 'Desktop-Menu',
                'container' => false,
                'items_wrap' => '%3$s'
                ));
               ?>
               </ul>
            </div>
         </div>
      </header>
      
      <!-- header section end -->