<?php
/**
 * Theme Page
 *
 * @package Food Critic Blogs
 */

 if ( ! defined( 'FOOD_CRITIC_BLOGS_FREE_THEME_URL' ) ) {
	define( 'FOOD_CRITIC_BLOGS_FREE_THEME_URL', 'https://www.seothemesexpert.com/products/food-critic-blogs-theme' );
}
if ( ! defined( 'FOOD_CRITIC_BLOGS_PRO_THEME_URL' ) ) {
	define( 'FOOD_CRITIC_BLOGS_PRO_THEME_URL', 'https://www.seothemesexpert.com/products/food-blogger-website-template' );
}
if ( ! defined( 'FOOD_CRITIC_BLOGS_FREE_DOCS_THEME_URL' ) ) {
    define( 'FOOD_CRITIC_BLOGS_FREE_DOCS_THEME_URL', 'https://demo.seothemesexpert.com/documentation/food-critic-blogs/' );
}
if ( ! defined( 'FOOD_CRITIC_BLOGS_DEMO_THEME_URL' ) ) {
	define( 'FOOD_CRITIC_BLOGS_DEMO_THEME_URL', 'https://demo.seothemesexpert.com/food-critic-blogs/' );
}
if ( ! defined( 'FOOD_CRITIC_BLOGS_RATE_THEME_URL' ) ) {
    define( 'FOOD_CRITIC_BLOGS_RATE_THEME_URL', 'https://wordpress.org/support/theme/food-critic-blogs/reviews/#new-post' );
}
if ( ! defined( 'FOOD_CRITIC_BLOGS_SUPPORT_THEME_URL' ) ) {
    define( 'FOOD_CRITIC_BLOGS_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/food-critic-blogs/' );
}
if ( ! defined( 'FOOD_CRITIC_BLOGS_THEME_BUNDLE_URL' ) ) {
    define( 'FOOD_CRITIC_BLOGS_THEME_BUNDLE_URL', 'https://www.seothemesexpert.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function food_critic_blogs_menu() {
	add_theme_page( esc_html__( 'About Theme', 'food-critic-blogs' ), esc_html__( 'About Theme', 'food-critic-blogs' ), 'edit_theme_options', 'food-critic-blogs-about', 'food_critic_blogs_about_display' );
}
add_action( 'admin_menu', 'food_critic_blogs_menu' );

/**
 * Display About page
 */
function food_critic_blogs_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<h1 class="d-none"></h1>
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'food-critic-blogs' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'food-critic-blogs-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'food-critic-blogs-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'food-critic-blogs' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'food-critic-blogs-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'food-critic-blogs' ); ?></a>
		</nav>

		<?php
			food_critic_blogs_main_screen();

			food_critic_blogs_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'food-critic-blogs' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'food-critic-blogs' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'food-critic-blogs' ) : esc_html_e( 'Go to Dashboard', 'food-critic-blogs' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function food_critic_blogs_main_screen() {
	if ( isset( $_GET['page'] ) && 'food-critic-blogs-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'food-critic-blogs' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'food-critic-blogs' ) ?><span class="usecode"><?php esc_html_e( '" STEPRO10 "', 'food-critic-blogs' ); ?></span></p>
					<p><a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'food-critic-blogs' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Lite Documentation', 'food-critic-blogs' ); ?></h2>
					<p><?php esc_html_e( 'The free theme documentation can help you set up the theme.', 'food-critic-blogs' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_FREE_DOCS_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Lite Documentation', 'food-critic-blogs' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'food-critic-blogs' ); ?></h2>
					<p><?php esc_html_e( 'Know more about Food Critic Blogs.', 'food-critic-blogs' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'food-critic-blogs' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'food-critic-blogs' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'food-critic-blogs' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'food-critic-blogs' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'food-critic-blogs' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'food-critic-blogs' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'food-critic-blogs' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'food-critic-blogs' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'food-critic-blogs' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'food-critic-blogs' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $food_critic_blogs_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $food_critic_blogs_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'food-critic-blogs' ); ?>: <?php echo esc_html($food_critic_blogs_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'food-critic-blogs' ); ?></a>

						<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'food-critic-blogs' ); ?></a>

						<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy All Themes', 'food-critic-blogs' ); ?></a>

						<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'food-critic-blogs' ); ?></a>
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $food_critic_blogs_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function food_critic_blogs_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'food-critic-blogs' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'food-critic-blogs' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy All Themes', 'food-critic-blogs' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( FOOD_CRITIC_BLOGS_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'food-critic-blogs' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'food-critic-blogs' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'food-critic-blogs' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'food-critic-blogs' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'food-critic-blogs' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'food-critic-blogs' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(FOOD_CRITIC_BLOGS_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'food-critic-blogs' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}