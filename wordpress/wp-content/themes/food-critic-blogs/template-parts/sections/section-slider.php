<?php if( get_theme_mod( 'food_critic_blogs_slider_arrows',true ) ) : ?>
<?php $food_critic_blogs_default_image = get_stylesheet_directory_uri() . '/assets/images/slider1.png'; ?>
  <section id="main-post-slider">
    <div class="slider-post">
      <div id="sync1" class="owl-carousel owl-theme">
        <?php
        $food_critic_blogs_args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'category_name' => get_theme_mod('food_critic_blogs_main_post_slider_category_setting','Slider'),
          'order' => 'ASC'
        );
        $food_critic_blogs_query = new WP_Query($food_critic_blogs_args); 
        if ( $food_critic_blogs_query->have_posts() ) :  
          while ($food_critic_blogs_query->have_posts()) : $food_critic_blogs_query->the_post(); 
            
            if (has_post_thumbnail()) {
              $food_critic_blogs_slide_style = 'style="background-image:url(\'' . esc_url(get_the_post_thumbnail_url()) . '\')"';
              $food_critic_blogs_slide_class = '';
            } else {
              $food_critic_blogs_slide_style = 'style="background-image:url(\'' . esc_url($food_critic_blogs_default_image) . '\')"';
              $food_critic_blogs_slide_class = 'no-thumbnail-bg';
            }
        ?>
          <div class="main-news-box <?php echo esc_attr($food_critic_blogs_slide_class); ?>" <?php echo $food_critic_blogs_slide_style; ?>>
            <div class="container">
              <div class="main-news-inner">
                <div class="main-auther-details">
                  <div class="media">
                    <?php 
                      $food_critic_blogs_get_author_id = get_the_author_meta('ID');
                      echo get_avatar($food_critic_blogs_get_author_id);
                    ?>
                    <div class="media-body">
                      <p class="auther_name"><?php echo esc_html(get_the_author_meta('display_name', $food_critic_blogs_get_author_id)); ?></p>
                      <p class="first-cat">
                        <?php
                          $food_critic_blogs_categories = get_the_category();
                          if ( ! empty( $food_critic_blogs_categories ) ) {
                              // Display the first category with a link
                              echo '<a href="' . esc_url( get_category_link( $food_critic_blogs_categories[0]->term_id ) ) . '" class="category-link">' . esc_html( $food_critic_blogs_categories[0]->name ) . '</a>';
                          }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
                <h1 class="main-news-inner-box mt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <p class="main-news-content"><?php echo esc_html( wp_trim_words( get_the_content(), 25 ) );?></p>
                <div class="post-metabox">
                  <div class="post-time"><i class="fas fa-clock pe-2 mb-2"></i><?php echo esc_html(get_the_time()); ?></div>
                  <div class="post-date"><i class="far fa-calendar-alt pe-2"></i><?php echo esc_html(get_the_date()); ?></div>
                  <div class="post-comment"><i class="fas fa-comment pe-2 mb-2"></i><?php comments_number( __( '0 Comments','food-critic-blogs' ) ); ?></div>
                </div>
                <div class="more-btn">
                  <a class="theme_button2" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','food-critic-blogs'); ?><i class="fas fa-chevron-right px-2"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
      </div>
      <div class="navigation-thumbs-block">
        <div class="container">
          <div id="sync2" class="navigation-thumbs owl-carousel owl-theme">
            <?php
            $food_critic_blogs_query = new WP_Query($food_critic_blogs_args); 
            if ( $food_critic_blogs_query->have_posts() ) :  
              while ($food_critic_blogs_query->have_posts()) : $food_critic_blogs_query->the_post();
            ?>
              <div class="slide-box px-2">
                <div class="row">
                  <div class="col-lg-4 col-4 align-self-center">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" />
                    <?php else : ?>
                      <img src="<?php echo esc_url($food_critic_blogs_default_image); ?>" />
                    <?php endif; ?>
                  </div>
                  <div class="col-lg-8 col-8 align-self-center">
                    <h2 class="main-news-text my-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
