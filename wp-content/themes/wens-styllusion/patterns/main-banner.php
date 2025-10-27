<?php
/**
 * Title: Main Banner
 * Slug: wens-styllusion/main-banner
 * Categories: wens-styllusion
 *
 * @package wens-styllusion
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"customOverlayColor":"#dfe7eb","isUserOverlayColor":true,"minHeight":630,"minHeightUnit":"px","contentPosition":"center right","isDark":false,"style":{"spacing":{"padding":{"right":"50px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-center-right" style="padding-right:50px;min-height:630px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim" style="background-color:#dfe7eb"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"left","placeholder":"Write title…","style":{"typography":{"fontSize":"18px"}}} -->
<p class="has-text-align-left" style="font-size:18px"><?php echo esc_html__( 'Your Fashion, Your Way', 'wens-styllusion' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"46px"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black"} -->
<h2 class="wp-block-heading has-black-color has-text-color has-link-color" style="font-size:46px"><?php echo esc_html__( 'Discover the Latest Trends ', 'wens-styllusion' ); ?><br><?php echo esc_html__( 'for Every Season', 'wens-styllusion' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontSize":"16px"}},"textColor":"black"} -->
<p class="has-black-color has-text-color has-link-color" style="font-size:16px"><?php echo esc_html__( 'We help you managing asset, provide financial advise. Leave ', 'wens-styllusion' ); ?><br><?php echo esc_html__( 'money issue with us and focus on your core business.', 'wens-styllusion' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontSize":"16px"}}} -->
<div class="wp-block-button has-custom-font-size" style="font-size:16px"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="#"><?php echo esc_html__( 'Shop Now', 'wens-styllusion' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/main-banner.jpg","id":651,"dimRatio":0,"minHeight":630,"isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:630px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-651" alt="" src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/main-banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
