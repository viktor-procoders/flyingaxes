<?php
/**
 * Save acf-json to the stylesheet directory.
 *
 * @since 1.0.0
 * @link https://support.advancedcustomfields.com/forums/topic/acf-json-fields-not-loading-from-parent-theme/
 * @return string
 */

// register new Gutenberg blocks category
function add_custom_block_categories( $categories, $post ) {
	$custom_category_one = array(
		'slug' => 'flyingaxes',
		'title' => __( 'Flying Axes', 'flyingaxes' ),
		'icon'  => 'admin-appearance',
	);
	array_unshift( $categories, $custom_category_one);
	return $categories;
}
add_filter( 'block_categories_all', 'add_custom_block_categories', 10, 2 );

function em_acf_save_json_path() {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'em_acf_save_json_path' );


/**
 * Load acf-json from parent theme and child theme, if available.
 *
 * @since 1.0.0
 * @link https://support.advancedcustomfields.com/forums/topic/acf-json-fields-not-loading-from-parent-theme/
 * @param array $paths Array of acf-json paths.
 * @return array
 */
function em_acf_load_json_paths( $paths ) {
    $paths = array( get_template_directory() . '/acf-json' );

    if ( is_child_theme() ) {
        $paths[] = get_stylesheet_directory() . '/acf-json';
    }

    return $paths;
}
add_filter( 'acf/settings/load_json', 'em_acf_load_json_paths' );


// Setup acf gutenberg blocks
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_my_blocks');
}

function register_my_blocks() {
    $blocks = glob( STYLESHEETPATH . '/blocks/*');
    foreach ($blocks as $block){
        if ( is_dir( $block ) ) {
            register_block_type( $block );
        }
    }
}

//Theme General Settings
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
    // Check function exists.
    if( function_exists('acf_add_options_page') ) {
        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'post_id' => 'options',
            'redirect'    => false,
        ));
        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Global Blocks'),
            'menu_title'  => __('Global Blocks'),
            'parent_slug' => $parent['menu_slug'],
            'post_id' => 'global',
        ));

    }
}


// add rule Menu Depth for nav menu
function acf_location_rules_types($choices) {
    $choices['Menu']['menu_level'] = 'Menu Depth';
    return $choices;
}
add_filter('acf/location/rule_types', 'acf_location_rules_types');
add_filter('acf/location/rule_values/menu_level', 'acf_location_rule_values_level');
function acf_location_rule_values_level($choices) {
    $choices[0] = '0';
    $choices[1] = '1';
    $choices[2] = '2';

    return $choices;
}
add_filter('acf/location/rule_match/menu_level', 'acf_location_rule_match_level', 10, 4);
function acf_location_rule_match_level($match, $rule, $options, $field_group) {
    $current_screen = get_current_screen();
    if ($current_screen->base == 'nav-menus') {
        if ($rule['operator'] == "==") {
            $match = ($options['nav_menu_item_depth'] == $rule['value']);
        }
    }
    return $match;
}


// add default value for promo logos
 function default_trusted_logos( $field_logos ) {

    $logos = get_field('trusted_by_logos', 'global');
    $array = array();
    if ($logos) {
        foreach ($logos as $logo) {
            $id = $logo['ID'];
            array_push($array, $id);
        };

         $field_logos['default_value'] = $array;
         return $field_logos;
    }
}

add_filter('acf/load_field/name=trusted_logo_list', 'default_trusted_logos');


function my_acf_color_picker_palette_primary() {

?>
<script type="text/javascript">
(function($) {
    acf.add_filter('color_picker_args', function( args, $field ){
    // do something to args
    args.palettes = ['#FFF', '#06a7a4', '#bee0e1', '#002139', '#e6eaed', '#c7edeb', '#097985']
    // return
    return args;
});

})(jQuery);
</script>
<?php

}

add_action('acf/input/admin_footer', 'my_acf_color_picker_palette_primary');
