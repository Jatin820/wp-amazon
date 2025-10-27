<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Food Grocery Hub
 * @subpackage food_grocery_hub
 */
?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$food_grocery_hub_no_of_footer_col = get_theme_mod('food_grocery_hub_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$food_grocery_hub_col_lg_footer_class = 'col-lg-' . (12 / $food_grocery_hub_no_of_footer_col);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$food_grocery_hub_col_md_footer_class = 'col-md-' . (12 / $food_grocery_hub_no_of_footer_col);
?>
<div class="container">
    <aside class="widget-area row py-2 pt-3" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'food-grocery-hub' ); ?>">
        <?php
        $food_grocery_hub_default_widgets = array(
            1 => 'search',
            2 => 'archives',
            3 => 'meta',
            4 => 'categories'
        );

        for ($food_grocery_hub_i = 1; $food_grocery_hub_i <= $food_grocery_hub_no_of_footer_col; $food_grocery_hub_i++) :
            $food_grocery_hub_lg_class = esc_attr($food_grocery_hub_col_lg_footer_class);
            $food_grocery_hub_md_class = esc_attr($food_grocery_hub_col_md_footer_class);
            echo '<div class="col-12 ' . $food_grocery_hub_lg_class . ' ' . $food_grocery_hub_md_class . '">';

            if (is_active_sidebar('footer-' . $food_grocery_hub_i)) {
                dynamic_sidebar('footer-' . $food_grocery_hub_i);
            } else {
                // Display default widget content if not active.
                switch ($food_grocery_hub_default_widgets[$food_grocery_hub_i] ?? '') {
                    case 'search':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Search', 'food-grocery-hub'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Search', 'food-grocery-hub'); ?></h3>
                            <?php get_search_form(); ?>
                        </aside>
                        <?php
                        break;

                    case 'archives':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Archives', 'food-grocery-hub'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Archives', 'food-grocery-hub'); ?></h3>
                            <ul><?php wp_get_archives(['type' => 'monthly']); ?></ul>
                        </aside>
                        <?php
                        break;

                    case 'meta':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Meta', 'food-grocery-hub'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Meta', 'food-grocery-hub'); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
                        <?php
                        break;

                    case 'categories':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Categories', 'food-grocery-hub'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Categories', 'food-grocery-hub'); ?></h3>
                            <ul><?php wp_list_categories(['title_li' => '']); ?></ul>
                        </aside>
                        <?php
                        break;
                }
            }

            echo '</div>';
        endfor;
        ?>
    </aside>
</div>