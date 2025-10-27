<header class="main-header-top wow fadeInDown">
    <div class="head-img">
        <div class="top-head">
            <div class="container py-2">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4 align-self-center">
                        <div class="social-media">
                            <?php if (get_theme_mod('food_critic_blogs_facebook_url','#')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('food_critic_blogs_facebook_url','#')); ?>">
                                    <i class="fab fa-facebook-f me-2"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('food_critic_blogs_twitter_url','#')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('food_critic_blogs_twitter_url','#')); ?>">
                                    <i class="fab fa-twitter me-2"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('food_critic_blogs_instagram_url','#')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('food_critic_blogs_instagram_url','#')); ?>">
                                    <i class="fab fa-instagram me-2"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('food_critic_blogs_youtube_url','#')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('food_critic_blogs_youtube_url','#')); ?>">
                                    <i class="fab fa-youtube me-2"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-4 align-self-center">
                        <div class="logo text-center">
                            <?php 
                            if (has_custom_logo()) {
                                the_custom_logo();
                            } else {
                                // Check if both title and tagline settings are disabled
                                $food_critic_blogs_tagline_enabled = get_theme_mod('food_critic_blogs_tagline_setting', false);
                                $food_critic_blogs_title_enabled = get_theme_mod('food_critic_blogs_site_title_setting', false);

                                if (!$food_critic_blogs_tagline_enabled && !$food_critic_blogs_title_enabled) {
                                    // Display the default logo
                                    $food_critic_blogs_default_logo_url = get_template_directory_uri() . '/assets/images/logo.png'; // Replace with your default logo path
                                    echo '<a href="' . esc_url(home_url('/')) . '">';
                                    echo '<img src="' . esc_url($food_critic_blogs_default_logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                                    echo '</a>';
                                }

                                // Display tagline if the setting is enabled
                                if ($food_critic_blogs_tagline_enabled) :
                                    $food_critic_blogs_site_desc = get_bloginfo('description'); ?>
                                    <p class="site-description"><?php echo esc_html($food_critic_blogs_site_desc); ?></p>
                                <?php endif; ?>

                                <?php
                                // Display site title if the setting is enabled
                                if ($food_critic_blogs_title_enabled) : ?>
                                    <p class="site-title">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo esc_html(get_bloginfo('name')); ?>
                                        </a>
                                    </p>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div>
                   <div class="col-xl-2 col-lg-3 col-md-4 align-self-center d-flex justify-content-end search-box-col">
                    <div class="search_inner">
                        <?php get_search_form(); ?>
                    </div>
                   </div>
               </div>
            </div>
        </div>
        <div class="headerbox <?php if( get_theme_mod( 'food_critic_blogs_sticky_header', '0')) { ?>sticky-header<?php } else { ?>close-sticky<?php } ?>">
            <div class="header-main container">
                <div class="row">
                    <div class="col-lg-11 col-md-6 col-6 align-self-center ps-lg-0">
                        <div class="main-navhead">
                            <div class="menubox">
                                <div class="menu-content">
                                    <!-- Main menu -->
                                    <div class="navbar-menubar responsive-menu navigation_header">
                                        <div class="toggle-nav mobile-menu">
                                            <button onclick="food_critic_blogs_openNav()">
                                                <i class="fa-solid fa-bars"></i> <!-- Initial hamburger icon -->
                                            </button>
                                        </div>
                                        <div id="mySidenav" class="nav sidenav">
                                            <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'food-critic-blogs' ); ?>">
                                                <?php 
                                                    wp_nav_menu(
                                                        array(
                                                            'theme_location' => 'primary',
                                                            'container_class' => 'main-menu clearfix',
                                                            'menu_class' => 'clearfix menu',
                                                            'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                                                            'fallback_cb' => 'wp_page_menu',
                                                        )
                                                    );
                                                ?>
                                                <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="food_critic_blogs_closeNav()">
                                                    <i class="fa-solid fa-times"></i> <!-- Close icon for the menu -->
                                                </a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 col-6 align-self-center sidebar-toggle">
                        <div class="offcanvas-div align-items-center align-self-center">
                            <?php if(get_theme_mod('food_critic_blogs_header_sidebar',true)){ ?>
                              <button type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                                <i class="fas fa-bars"></i>
                              </button>
                              <div class="offcanvas offcanvas-end" id="demo">
                                <div class="offcanvas-header"> 
                                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="logo text-center mb-md-1 mb-3">
                                        <?php 
                                        if (has_custom_logo()) {
                                            the_custom_logo();
                                        } else {
                                            // Check if both title and tagline settings are disabled
                                            $food_critic_blogs_tagline_enabled = get_theme_mod('food_critic_blogs_tagline_setting', false);
                                            $food_critic_blogs_title_enabled = get_theme_mod('food_critic_blogs_site_title_setting', false);

                                            if (!$food_critic_blogs_tagline_enabled && !$food_critic_blogs_title_enabled) {
                                                // Display the default logo
                                                $food_critic_blogs_default_logo_url = get_template_directory_uri() . '/assets/images/logo.png'; // Replace with your default logo path
                                                echo '<a href="' . esc_url(home_url('/')) . '">';
                                                echo '<img src="' . esc_url($food_critic_blogs_default_logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                                                echo '</a>';
                                            }

                                            // Display tagline if the setting is enabled
                                            if ($food_critic_blogs_tagline_enabled) :
                                                $food_critic_blogs_site_desc = get_bloginfo('description'); ?>
                                                <p class="site-description"><?php echo esc_html($food_critic_blogs_site_desc); ?></p>
                                            <?php endif; ?>

                                            <?php
                                            // Display site title if the setting is enabled
                                            if ($food_critic_blogs_title_enabled) : ?>
                                                <p class="site-title">
                                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                                        <?php echo esc_html(get_bloginfo('name')); ?>
                                                    </a>
                                                </p>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </div>
                                  <div class="search_inner">
                                    <?php get_search_form(); ?>
                                    </div>
                                </div>
                              </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <div class="clearfix"></div>
</header>