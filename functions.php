<?php
add_action( 'wp_enqueue_scripts', 'wp_enquue_child_parent_styles', 10, 1 );
function wp_enquue_child_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child_style_sheet', get_template_directory_uri() . '/style.css', array('parent-style') );
}

add_action( 'woocommerce_before_shop_loop_item_title', 'start_my_own_tag', 15);
add_action( 'woocommerce_after_shop_loop_item', 'end_my_own_tag', 15);
add_action('woocommerce_after_shop_loop_item_title', 'my_shop_page_excerpt', 5);
function start_my_own_tag(){
    echo "<figcaption>";
}
function end_my_own_tag(){
    echo "</figcaption>";
}
function my_shop_page_excerpt(){
    $text = get_the_excerpt();
    echo "<p>".substr($text, 0, 65)."</p>" ;
}

/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
/* add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
} */

// Or just remove them all in one line
//add_filter( 'woocommerce_enqueue_styles', '__return_false' ); 