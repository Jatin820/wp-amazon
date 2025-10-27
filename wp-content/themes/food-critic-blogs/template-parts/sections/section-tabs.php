<?php $food_critic_blogs_default_image = get_template_directory_uri() . '/assets/images/slider1.png'; ?>
<?php if( get_theme_mod( 'food_critic_blogs_category_tab_enable',true ) != '') { ?>
    <section id="food-tabs-section" class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 mb-2 align-self-center">
            <div class="business-tab-head section_main_head pb-4 d-block">
              <div class="media">
                <div class="media-body">
                  <div class="row">
                    <?php if(get_theme_mod('food_critic_blogs_category_tab_heading') != '' || get_theme_mod('food_critic_blogs_category_tab_sub_heading')){ ?>
                      <div class="col-lg-2 col-md-3 col-3 align-self-center text-center">
                        <i class="fas fa-apple-alt"></i>
                      </div>
                      <div class="col-lg-10 col-md-9 col-9 align-self-center p-0">
                        <h3>
                          <?php echo esc_html(get_theme_mod('food_critic_blogs_category_tab_heading')); ?>
                        </h3>
                        <div class="section-text">
                          <?php echo esc_html(get_theme_mod('food_critic_blogs_category_tab_sub_heading')); ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 mb-2 align-self-center">
            <div class="tab-left-col">
              <div class="tab_list">
                <ul class="nav nav-tabs" role="tablist">
                  <?php 
                  for($food_critic_blogs_i=1; $food_critic_blogs_i<=4; $food_critic_blogs_i++ ) {?>
                    <li class="nav-item">
                      <?php if(get_theme_mod('food_critic_blogs_entertainment_tab_tab_title'.$food_critic_blogs_i)!=''){ ?>
                        <a class="nav-link <?php if($food_critic_blogs_i == 1){ echo 'active'; } ?>" href="javascript:void(0)" data-bs-toggle="tab" data-bs-target="#entertainment_tab<?php echo esc_attr($food_critic_blogs_i);?>" role="tab" aria-controls="entertainment_tab<?php echo esc_attr($food_critic_blogs_i);?>" aria-selected="true">
                          <?php echo esc_html(get_theme_mod('food_critic_blogs_entertainment_tab_tab_title'.$food_critic_blogs_i)); ?>
                        </a>
                      <?php } ?>
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <?php 
                $food_critic_blogs_header_button = get_theme_mod('food_critic_blogs_header_button', __('More', 'food-critic-blogs'));
                $food_critic_blogs_header_link = get_theme_mod('food_critic_blogs_header_link', '#');
                if (!empty($food_critic_blogs_header_button) && !empty($food_critic_blogs_header_link)) : ?>
                <div class="serv-btn text-center">
                  <a target="_blank" href="<?php echo esc_url($food_critic_blogs_header_link); ?>" class="offer-text" rel="noopener noreferrer">
                    <?php echo esc_html($food_critic_blogs_header_button); ?><i class="fas fa-chevron-down ps-1"></i>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="tab-content entertainment_tab_content">
          <?php 
          for($food_critic_blogs_i=1; $food_critic_blogs_i<=4; $food_critic_blogs_i++ ) {?>
            <div role="tabpanel" class="tab-pane <?php if($food_critic_blogs_i == 1){echo 'active';} ?>" id="entertainment_tab<?php echo esc_attr($food_critic_blogs_i);?>">
              <div class="row">
                <div class="col-lg-4 col-md-4">
                  <?php
                  $food_critic_blogs_k = 1;
                    $food_critic_blogs_args = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'category_name' => get_theme_mod('food_critic_blogs_entertainment_tab_category_one'.$food_critic_blogs_i),
                      'order' => 'ASC'
                    );  
                    $food_critic_blogs_query = new WP_Query($food_critic_blogs_args); 
                    if ( $food_critic_blogs_query->have_posts() ) :  while ($food_critic_blogs_query->have_posts()) : $food_critic_blogs_query->the_post(); 
                    ?>
                    <?php if($food_critic_blogs_k == 1){ ?>
                      <div class="food-tab-boxes first food-tab-box<?php echo esc_attr($food_critic_blogs_k); ?> overlay-post-box mb-3">
                        <div class="post-image-block-outer">
                          <div class="post-image-block first">
                            <?php if(has_post_thumbnail()){ ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($food_critic_blogs_default_image).'">'); } ?>
                            <div class="news-inner">
                              <?php
                                if((get_theme_mod('food_critic_blogs_toggle_date', true) != 0) || (get_theme_mod('food_critic_blogs_toggle_tags', true) != 0)){ ?>
                                <div class="post-metabox">
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_tags',true) != 0){?>
                                    <?php
                                      // Get the post tags (only need the first one)
                                      $food_critic_blogs_post_tags = get_the_tags();

                                      if ($food_critic_blogs_post_tags && isset($food_critic_blogs_post_tags[0])) {
                                          $food_critic_blogs_tag = $food_critic_blogs_post_tags[0]; // Get the first tag
                                          echo '<div class="post-author">';
                                          echo '<i class="fas fa-tag"></i>';
                                          echo '<div class="post-tags">';
                                          echo '<a href="' . esc_url(get_tag_link($food_critic_blogs_tag->term_id)) . '" class="tag-link">' . esc_html($food_critic_blogs_tag->name) . '</a>';
                                          echo '</div>';
                                          echo '</div>';
                                      }
                                    ?>
                                  <?php } ?>
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_date',true) != 0){?>
                                    <div class="post-date"><i class="far fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></div>
                                  <?php } ?>
                                </div>
                              <?php } ?>
                              <h4 class="p-0 royal"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } else { ?>
                      <div class="food-tab-boxes sec food-tab-box<?php echo esc_attr($food_critic_blogs_k); ?> mb-3" >
                        <div class="post-image-block-outer">
                          <div class="row">
                            <div class="post-image-block col-lg-3 col-3 col-md-3 pe-md-0 align-items-center"> 
                              <?php if(has_post_thumbnail()){ ?>
                              <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($food_critic_blogs_default_image).'">'); } ?>
                            </div>
                            <div class="col-lg-9 col-9 col-md-9 tab-in-center align-items-center">
                              <div class="news-inner">
                                <?php
                                  if((get_theme_mod('food_critic_blogs_toggle_date', true) != 0) || (get_theme_mod('food_critic_blogs_toggle_auther', true) != 0)){ ?>
                                  <div class="post-metabox">
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_tags',true) != 0){?>
                                    <?php
                                      // Get the post tags (only need the first one)
                                      $food_critic_blogs_post_tags = get_the_tags();

                                      if ($food_critic_blogs_post_tags && isset($food_critic_blogs_post_tags[0])) {
                                          $food_critic_blogs_tag = $food_critic_blogs_post_tags[0]; // Get the first tag
                                          echo '<div class="post-author">';
                                          echo '<i class="fas fa-tag"></i>';
                                          echo '<div class="post-tags">';
                                          echo '<a href="' . esc_url(get_tag_link($food_critic_blogs_tag->term_id)) . '" class="tag-link">' . esc_html($food_critic_blogs_tag->name) . '</a>';
                                          echo '</div>';
                                          echo '</div>';
                                      }
                                    ?>
                                  <?php } ?>
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_date',true) != 0){?>
                                    <div class="post-date"><i class="far fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></div>
                                  <?php } ?>
                                </div>
                                <?php } ?>
                                <h5 class="p-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  <?php $food_critic_blogs_k++; endwhile; endif; ?>
                </div>
                <div class="col-lg-4 col-md-4 education-middle-box">
                  <?php
                  $food_critic_blogs_k = 1;
                    $food_critic_blogs_args = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'category_name' => get_theme_mod('food_critic_blogs_entertainment_tab_category_two'.$food_critic_blogs_i),
                      'order' => 'ASC'
                    );  
                    $food_critic_blogs_query = new WP_Query($food_critic_blogs_args); 
                    if ( $food_critic_blogs_query->have_posts() ) :  while ($food_critic_blogs_query->have_posts()) : $food_critic_blogs_query->the_post(); 
                    ?>
                    <?php if($food_critic_blogs_k == 1){ ?>
                      <div class="food-tab-boxes food-tab-box<?php echo esc_attr($food_critic_blogs_k); ?> overlay-post-box mb-3">
                        <div class="post-image-block-outer">
                          <div class="post-image-block second">
                            <?php if(has_post_thumbnail()){ ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($food_critic_blogs_default_image).'">'); } ?>
                            <div class="news-inner">
                              <?php
                                if((get_theme_mod('food_critic_blogs_toggle_date', true) != 0) || (get_theme_mod('food_critic_blogs_toggle_auther', true) != 0)){ ?>
                                <div class="post-metabox">
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_tags',true) != 0){?>
                                    <?php
                                      // Get the post tags (only need the first one)
                                      $food_critic_blogs_post_tags = get_the_tags();

                                      if ($food_critic_blogs_post_tags && isset($food_critic_blogs_post_tags[0])) {
                                          $food_critic_blogs_tag = $food_critic_blogs_post_tags[0]; // Get the first tag
                                          echo '<div class="post-author">';
                                          echo '<i class="fas fa-tag"></i>';
                                          echo '<div class="post-tags">';
                                          echo '<a href="' . esc_url(get_tag_link($food_critic_blogs_tag->term_id)) . '" class="tag-link">' . esc_html($food_critic_blogs_tag->name) . '</a>';
                                          echo '</div>';
                                          echo '</div>';
                                      }
                                    ?>
                                  <?php } ?>
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_date',true) != 0){?>
                                    <div class="post-date"><i class="far fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></div>
                                  <?php } ?>
                                </div>
                              <?php } ?>
                              <h5 class="p-0 royal"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } else { ?>
                      <div class="food-tab-boxes food-tab-box<?php echo esc_attr($food_critic_blogs_k); ?> mb-3">
                        <div class="post-image-block-outer">
                          <div class="row">
                            <div class="post-image-block col-lg-3 col-md-3 col-3 pe-md-0 d-flex align-items-center"> 
                              <?php if(has_post_thumbnail()){ ?>
                              <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($food_critic_blogs_default_image).'">'); } ?>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 tab-in-center">
                              <div class="news-inner">
                                <?php
                                  if((get_theme_mod('food_critic_blogs_toggle_date', true) != 0) || (get_theme_mod('food_critic_blogs_toggle_auther', true) != 0)){ ?>
                                  <div class="post-metabox">
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_tags',true) != 0){?>
                                    <?php
                                      // Get the post tags (only need the first one)
                                      $food_critic_blogs_post_tags = get_the_tags();

                                      if ($food_critic_blogs_post_tags && isset($food_critic_blogs_post_tags[0])) {
                                          $food_critic_blogs_tag = $food_critic_blogs_post_tags[0]; // Get the first tag
                                          echo '<div class="post-author">';
                                          echo '<i class="fas fa-tag"></i>';
                                          echo '<div class="post-tags">';
                                          echo '<a href="' . esc_url(get_tag_link($food_critic_blogs_tag->term_id)) . '" class="tag-link">' . esc_html($food_critic_blogs_tag->name) . '</a>';
                                          echo '</div>';
                                          echo '</div>';
                                      }
                                    ?>
                                  <?php } ?>
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_date',true) != 0){?>
                                    <div class="post-date"><i class="far fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></div>
                                  <?php } ?>
                                </div>
                                <?php } ?>
                                <h5 class="p-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  <?php $food_critic_blogs_k++; endwhile; endif; ?>
                </div>
                <div class="col-lg-4 col-md-4">
                  <?php
                  $food_critic_blogs_k = 1;
                    $food_critic_blogs_args = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'category_name' => get_theme_mod('food_critic_blogs_entertainment_tab_category_three'.$food_critic_blogs_i),
                      'order' => 'ASC'
                    );  
                    $food_critic_blogs_query = new WP_Query($food_critic_blogs_args); 
                    if ( $food_critic_blogs_query->have_posts() ) :  while ($food_critic_blogs_query->have_posts()) : $food_critic_blogs_query->the_post(); 
                    ?>
                    <div class="food-tab-boxes food-tab-box<?php echo esc_attr($food_critic_blogs_k); ?> mb-3">
                      <div class="post-image-block-outer">
                        <div class="row">
                          <div class="post-image-block col-lg-3 col-md-3 col-3 pe-md-0 d-flex align-items-center"> 
                            <?php if(has_post_thumbnail()){ ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($food_critic_blogs_default_image).'">'); } ?>
                          </div>
                          <div class="col-lg-9 col-md-9 col-9 tab-in-center">
                            <div class="news-inner">
                              <?php
                                if((get_theme_mod('food_critic_blogs_toggle_date', true) != 0) || (get_theme_mod('food_critic_blogs_toggle_auther', true) != 0)){ ?>
                                <div class="post-metabox">
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_tags',true) != 0){?>
                                    <?php
                                      // Get the post tags (only need the first one)
                                      $food_critic_blogs_post_tags = get_the_tags();

                                      if ($food_critic_blogs_post_tags && isset($food_critic_blogs_post_tags[0])) {
                                          $food_critic_blogs_tag = $food_critic_blogs_post_tags[0]; // Get the first tag
                                          echo '<div class="post-author">';
                                          echo '<i class="fas fa-tag"></i>';
                                          echo '<div class="post-tags">';
                                          echo '<a href="' . esc_url(get_tag_link($food_critic_blogs_tag->term_id)) . '" class="tag-link">' . esc_html($food_critic_blogs_tag->name) . '</a>';
                                          echo '</div>';
                                          echo '</div>';
                                      }
                                    ?>
                                  <?php } ?>
                                  <?php if(get_theme_mod('food_critic_blogs_toggle_date',true) != 0){?>
                                    <div class="post-date"><i class="far fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></div>
                                  <?php } ?>
                                </div>
                              <?php } ?>
                              <h5 class="p-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php $food_critic_blogs_k++; endwhile; endif; ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
<?php }?>