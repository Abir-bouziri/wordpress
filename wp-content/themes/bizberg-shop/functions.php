<?php

/**
* Customizer Settings
*/

require get_stylesheet_directory() . '/customizer/woocommerce-category-menu.php';
require get_stylesheet_directory() . '/customizer/slider.php';
require get_stylesheet_directory() . '/customizer/services.php';
require get_stylesheet_directory() . '/customizer/sales-banner.php';
require get_stylesheet_directory() . '/customizer/categories.php';
require get_stylesheet_directory() . '/customizer/tab-products.php';
require get_stylesheet_directory() . '/customizer/product-repeater.php';
require get_stylesheet_directory() . '/customizer/blocks.php';
require get_stylesheet_directory() . '/customizer/clients.php';

add_action( 'wp_enqueue_scripts', 'bizberg_shop_chld_thm_parent_css' );
function bizberg_shop_chld_thm_parent_css() {

    $bizberg_shop_theme = wp_get_theme();
    $theme_version = $bizberg_shop_theme->get( 'Version' );

    wp_enqueue_style( 
    	'bizberg_shop_chld_css', 
    	trailingslashit( get_template_directory_uri() ) . 'style.css', 
    	array( 
    		'bootstrap',
    		'font-awesome-5',
    		'bizberg-main',
    		'bizberg-component',
    		'bizberg-style2',
    		'bizberg-responsive' 
    	),
        $theme_version
    );

    wp_enqueue_script( 'bizberg_shop_scripts', get_stylesheet_directory_uri() . '/script.js', array('jquery'), $theme_version );
    
}

add_action( 'customize_preview_init', 'bizberg_shop_customize_enqueue' );
function bizberg_shop_customize_enqueue() {
    $bizberg_shop_theme = wp_get_theme();
    $theme_version = $bizberg_shop_theme->get( 'Version' );
    wp_enqueue_script( 'bizberg_shop_customizer_js', get_stylesheet_directory_uri() . '/customizer.js' ,array('jquery') ,$theme_version ,false );
}

add_action( 'customize_register', 'bizberg_shop_customizer_css', 100 );
function bizberg_shop_customizer_css( $wp_customize ){

    $bizberg_shop_theme = wp_get_theme();
    $theme_version = $bizberg_shop_theme->get( 'Version' );
    wp_enqueue_style( 'bizberg_shop_customizer_css', get_stylesheet_directory_uri() . '/customizer.css' );

    /**
    * Remove sections/panels/control of parent theme
    */
    
    $wp_customize->remove_section("transparent_header");
    $wp_customize->remove_section("progress_bar");

    $wp_customize->remove_control("header_menu_color_hover_sticky_menu");
    $wp_customize->remove_control("header_menu_separator_sticky_menu");
    $wp_customize->remove_control("header_menu_text_color_sticky_menu");
    $wp_customize->remove_control("header_navbar_background_2_sticky_menu");
    $wp_customize->remove_control("header_navbar_background_1_sticky_menu");
    $wp_customize->remove_control("header_site_tagline_color_sticky_menu");
    $wp_customize->remove_control("header_site_title_color_sticky_menu");
    $wp_customize->remove_control("header_sticky_menu_options_heading");
    $wp_customize->remove_control("header_menu_child_menu_background_sticky_menu");
    $wp_customize->remove_control("header_menu_child_menu_border_sticky_menu");
    $wp_customize->remove_control("header_menu_child_menu_text_color_sticky_menu");
    $wp_customize->remove_control("header_button_color_sticky_menu");
    $wp_customize->remove_control("header_button_color_hover_sticky_menu");
    $wp_customize->remove_control("header_button_border_color_sticky_menu");
    $wp_customize->remove_control("header_menu_slide_in_animation");

}


add_action( 'init' , 'bizberg_shop_customizer_sections' );
function bizberg_shop_customizer_sections(){

    Kirki::add_panel( 'bizberg_shop_frontpage_woocommerce', array(
        'title'          => esc_html__( 'Ecommerce Frontpage', 'bizberg-shop' ),
        'priority'       => 1,
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_slider', array(
        'title'          => esc_html__( 'Slider', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_services', array(
        'title'          => esc_html__( 'Services', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_sales_banners', array(
        'title'          => esc_html__( 'Sales Banner', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_top_categories', array(
        'title'          => esc_html__( 'Product Categories', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_tab_products', array(
        'title'          => esc_html__( 'Tab Products', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_repeater_products', array(
        'title'          => esc_html__( 'Products ( Repeater )', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_gutenberg_blocks', array(
        'title'          => esc_html__( 'Gutenberg Blocks', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

    Kirki::add_section( 'bizberg_shop_frontpage_woocommerce_clients_logo', array(
        'title'          => esc_html__( 'Clients Logo', 'bizberg-shop' ),
        'panel'          => 'bizberg_shop_frontpage_woocommerce'
    ) );

}

add_action( 'init', 'bizberg_shop_colors' );
function bizberg_shop_colors(){

    $options = array(
        'bizberg_read_more_background_color',
        'bizberg_theme_color', // Change the theme color
        'bizberg_header_menu_color_hover',
        'bizberg_header_button_color',
        'bizberg_link_color',
        'bizberg_background_color_2',
        'bizberg_link_color_hover',
        'bizberg_sidebar_widget_title_color',
        'bizberg_blog_listing_pagination_active_hover_color',
        'bizberg_heading_color',
        'bizberg_sidebar_widget_link_color_hover',
        'bizberg_footer_social_icon_color',
        'bizberg_footer_copyright_background',
        'bizberg_header_menu_color_hover_sticky_menu',
        'bizberg_shop_quick_view_background',
        'bizberg_shop_price_color',
        'bizberg_header_button_color',
        'bizberg_background_color_1',
        'bizberg_background_color_2'
    );

    foreach ( $options as $value ) {
        
        add_filter( $value , function(){
            return '#f5848c';
        });

    }

}

add_filter( 'bizberg_sticky_sidebar_margin_top_status', function(){
    return 30;
});

add_filter( 'bizberg_slider_banner_settings', function(){
    return 'none';
});

add_filter( 'bizberg_top_header_status', function(){
    return false;
});

add_filter( 'bizberg_sidebar_spacing_status', function(){
    return '0px';
});

add_filter( 'bizberg_sidebar_widget_background_color', function(){
    return 'rgba(251,251,251,0)';
});

add_filter( 'bizberg_sidebar_widget_border_color', function(){
    return 'rgba(251,251,251,0)';
});

add_filter( 'bizberg_primary_header_layout_bottom_border_color', function(){
    return '#f5848c';
});

add_filter( 'bizberg_primary_header_layout_bottom_border_size', function(){
    return 5;
});

add_filter( 'bizberg_last_item_html', function(){
    return '';
});

add_filter( 'bizberg_header_button_color_hover', function(){
    return '#f24955';
});

// Start Heading 1
add_filter( 'bizberg_body_typo_heading_1_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h1', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '48.83px',
        'line-height'    => '1.1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});

add_filter( 'bizberg_typography_h1_tablet', 'bizberg_shop_typography_h1_tablet' );
function bizberg_shop_typography_h1_tablet(){
    return 45.78;
}

add_filter( 'bizberg_typography_h1_mobile', 'bizberg_shop_typography_h1_mobile' );
function bizberg_shop_typography_h1_mobile(){
    return 39.67;
}

// Start Heading 2
add_filter( 'bizberg_body_typo_heading_2_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h2', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '39.06px',
        'line-height'    => '1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});

add_filter( 'bizberg_typography_h2_tablet', 'bizberg_shop_typography_h2_tablet' );
function bizberg_shop_typography_h2_tablet(){
    return 36.62;
}

add_filter( 'bizberg_typography_h2_mobile', 'bizberg_shop_typography_h2_mobile' );
function bizberg_shop_typography_h2_mobile(){
    return 31.74;
}

// Start Heading 3
add_filter( 'bizberg_body_typo_heading_3_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h3', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '31.25px',
        'line-height'    => '1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});

add_filter( 'bizberg_typography_h3_tablet', 'bizberg_shop_typography_h3_tablet' );
function bizberg_shop_typography_h3_tablet(){
    return 29.30;
}

add_filter( 'bizberg_typography_h3_mobile', 'bizberg_shop_typography_h3_mobile' );
function bizberg_shop_typography_h3_mobile(){
    return 25.39;
}

// Start Heading 4
add_filter( 'bizberg_body_typo_heading_4_status', function(){
    return true;
});
add_filter( 'bizberg_typography_h4', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '500',
        'font-size'      => '25.00px',
        'line-height'    => '1.1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
});
add_filter( 'bizberg_typography_h4_tablet', 'bizberg_shop_typography_h4_tablet' );
function bizberg_shop_typography_h4_tablet(){
    return 23.44;
}
add_filter( 'bizberg_typography_h4_mobile', 'bizberg_shop_typography_h4_mobile' );
function bizberg_shop_typography_h4_mobile(){
    return 20.31;
}

add_filter( 'bizberg_woo_product_color_status', function(){
    return true;
});

add_filter( 'bizberg_last_item_header', function(){
    return 'text';
});

add_filter( 'bizberg_header_columns', function(){
    return 'col-sm-3|col-sm-9';
});

/** 
* Body Font
*/
add_filter( 'bizberg_body_content_typo_status', function(){
    return true;
});

add_filter( 'bizberg_typography_body_content', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => 'regular',
        'font-size'      => '15px',
        'line-height'    => '1.8'
    ];
});

/** 
* Enable Slick for this child theme
*/
add_filter( 'bizberg_slick_slider_status', function(){
    return true;
});

add_filter( 'bizberg_header_button_padding', function(){
    return array(
        'top'  => '4px',
        'bottom'  => '4px',
        'left' => '14px',
        'right' => '14px'
    );
});

add_filter( 'bizberg_site_title_font', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '600',
        'font-size'      => '23px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'left'
    ];
});

add_filter( 'bizberg_site_tagline_font', function(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '300',
        'font-size'      => '13px',
        'line-height'    => '1.8',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
        'text-align'     => 'left'
    ];
});

add_filter( 'bizberg_sticky_header_status', function(){
    return 'false';
});

add_filter( 'bizberg_primary_header_layout', function(){
	return 'center';
});

add_filter( 'bizberg_header_2_position', function(){
	return 'left';
});

function bizberg_shop_get_menu_woocommerce_label(){

    ob_start();
    
    $woocommerce_category_menu_text = bizberg_get_theme_mod( 'woocommerce_category_menu_text' ); ?>

    <i class="fas fa-bars"></i> 
    <span><?php echo esc_html( $woocommerce_category_menu_text ); ?></span>
    <i class="fas fa-angle-down"></i>

    <?php

    return ob_get_clean();

}

add_filter('wp_nav_menu_items', 'bizberg_shop_add_woo_cat_on_menus', 10, 2);
function bizberg_shop_add_woo_cat_on_menus( $items, $args ){

    $bizberg_shop_woo_cat_main_menu_status = bizberg_get_theme_mod( 'bizberg_shop_woo_cat_main_menu_status' );

	if( $args->theme_location == 'menu-1' && class_exists( 'WooCommerce' ) && $bizberg_shop_woo_cat_main_menu_status == true ){ 

		ob_start(); 

        $exclude_categories_unfilter =  bizberg_get_theme_mod( 'woo_exclude_categories' , array() );
        $exclude_categories_filter   = wp_list_pluck( $exclude_categories_unfilter, 'link_text' ); ?>

		<li class="bizberg_shop_browse_cat <?php echo esc_attr( bizberg_get_theme_mod( 'default_woo_category_dropdown' ) ); ?>">
			
            <a href="javascript:void(0)" class="woo_cat_link">
                <?php echo wp_kses_post( bizberg_shop_get_menu_woocommerce_label() ); ?>
            </a>

            <?php
            $args1 = array(
                'taxonomy'   => 'product_cat',
                'title_li'   => '',
                'hide_empty' => 1,
                'show_count' => 0,
                'exclude'    => array_filter( $exclude_categories_filter ),
                'depth'      => bizberg_get_theme_mod( 'woocommerce_category_menu_depth' )
            );

            echo '<ul class="product_cats_menu">';
                wp_list_categories( $args1 );
            echo '</ul>'; ?>

		</li>

		<?php

		$content = ob_get_clean();
      	$content .= $items;
		return $content;

	}

    return $items;

}

add_filter( 'bizberg_theme_output_css', function( $css ){

    $css[] = array(
        'element'  => 'header .navbar-default .navbar-nav > li.bizberg_shop_browse_cat > a',
        'property'      => 'background',
        'value_pattern' => '$'
    );

    $css[] =  array(
        'element'  => 'header .navbar-default .navbar-nav > li.bizberg_shop_browse_cat > a',
        'property' => 'border-color',
        'sanitize_callback' => 'bizberg_adjustBrightness',
    );

    return $css;

});

function bizberg_shop_get_woocommerce_categories( $only_parent = false, $woo_default_shortcodes = false ){

    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true
    );

    if( $only_parent == true ){
        $args['parent'] = 0;
    }

    $terms = get_terms( $args );

    if( empty($terms) || !is_array( $terms ) ){
        return array();
    }

    $data = array();

    if( $woo_default_shortcodes ){
        $data['featured_products']     = '--- ' . esc_html__( 'FEATURED PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['sale_products']         = '--- ' . esc_html__( 'SALE PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['best_selling_products'] = '--- ' . esc_html__( 'BEST SELLING PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['recent_products']       = '--- ' . esc_html__( 'RECENT PRODUCTS', 'bizberg-shop' ) . ' ---';
        $data['top_rated_products']    = '--- ' . esc_html__( 'TOP RATED PRODUCTS', 'bizberg-shop' ) . ' ---';
    }

    foreach ( $terms as $key => $value) {
        $term_id = absint( $value->term_id );
        $data[$term_id] =  esc_html( $value->name );
    }

    $data[0] = esc_html__( 'None' , 'bizberg-shop' );

    return $data;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_product_cat' );
function bizberg_shop_add_inline_css_product_cat( $css ){

    $width = bizberg_get_theme_mod( 'woocommerce_category_menu_width' , 260 );

    $css .= '.navbar-nav .product_cats_menu ul {left:' . ( $width - 1 ) . 'px}';

    return $css;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_product_reapeater_title' );
function bizberg_shop_add_inline_css_product_reapeater_title( $css ){

    $data = bizberg_get_theme_mod( 'repeater_products_frontpage' );

    if( !empty( $data ) && is_array( $data ) ){

        foreach ( $data as $key => $value ) {
            
            if( !empty( $value['title_color'] ) ){

                $title_color = !empty( $value['title_color'] ) ? sanitize_text_field( $value['title_color'] ) : '';

                $css .= '.bs_repeater_product h3.product_title_' . absint( $key ) . '::before{ background : ' . $title_color . ' }';

            }

        }

    }

    return $css;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_slider_transform' );
function bizberg_shop_add_inline_css_slider_transform( $css ){

    $data = bizberg_get_theme_mod( 'woo_slider_pages' );

    if( !empty( $data ) && is_array( $data ) ){

        foreach ( $data as $key => $value ) {
            
            if( !empty( $value['page'] ) && !empty( $value['translate_x'] ) ){

                $translate_x = !empty( $value['translate_x'] ) ? sanitize_text_field( $value['translate_x'] ) . '%' : '0%';

                $css .= '.slide_id_' . absint( $value['page'] ) . '{ transform: translate( ' . $translate_x . ', -50%) }';

            }

        }

    }

    return $css;

}

add_filter( 'bizberg_inline_style', 'bizberg_shop_add_inline_css_category_font' );
function bizberg_shop_add_inline_css_category_font( $css ){

    $woo_icon_categories = bizberg_get_theme_mod( 'woo_icon_categories' );

    if( !empty( $woo_icon_categories ) && is_array( $woo_icon_categories ) ){

        foreach ( $woo_icon_categories as $key => $value ) {
            
            $category  = !empty( $value['category'] ) ? absint( $value['category'] ) : '';
            $icon_code = !empty( $value['icon_code'] ) ? sanitize_text_field( $value['icon_code'] ) : '';

            if( !empty( $category ) && !empty( $icon_code ) ){
                $css .= '.navbar-nav .product_cats_menu > li.cat-item-' . absint( $category ) . ' > a::before{
                content: "' . "\\" . esc_attr( $icon_code ) . '";
                font-family: "Font Awesome 5 Free";
                padding-right: 10px;
                font-size: 14px;
                font-weight: 900; }';
            }            

        }

    }

    return $css;

}

function bizberg_shop_get_slider_content(){ 

    ob_start();

    $bizberg_shop_woo_cat_main_menu_status = bizberg_get_theme_mod( 'bizberg_shop_woo_cat_main_menu_status' ); 
    $default_woo_category_dropdown         = bizberg_get_theme_mod( 'default_woo_category_dropdown' );

    $content_class = 'col-lg-12';
    if( $bizberg_shop_woo_cat_main_menu_status == true && $default_woo_category_dropdown == 'show' ){
        echo '<div class="col-lg-3"></div>';
        $content_class = 'col-lg-9';
    }

    $woo_slider_pages = bizberg_get_theme_mod( 'woo_slider_pages' , array() );

    $args = array(
        'post_type' => 'page',
        'post__in'  => wp_list_pluck( $woo_slider_pages, 'page' ),
        'orderby'  => 'post__in'
    );

    $slider_pages = new WP_Query( $args );

    if( $slider_pages->have_posts() ): ?>
    
        <div class="<?php echo esc_attr( $content_class ); ?> col-sm-12">

            <?php 
            do_action( 'bizberg_shop_before_slider_section' );
            ?>

            <div class="slider bizberg_shop_slider">

                <div class="swiper-container swiper-main">

                    <div class="swiper-wrapper">

                        <?php 

                        while( $slider_pages->have_posts() ): $slider_pages->the_post(); 

                            global $post; 

                            $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url( $post, 'large' ) : '';

                            $align         = bizberg_shop_get_slider_meta( $woo_slider_pages , 'align' , $post->ID , '' , '' ); 
                            $content_width = bizberg_shop_get_slider_meta( $woo_slider_pages , 'content_width' , $post->ID , '' , '' );
                            $content_width = is_numeric( $content_width ) ? absint( $content_width ) . '%' : '90%';

                            $color_title = bizberg_shop_get_slider_meta( $woo_slider_pages , 'color_title' , $post->ID , '' , '' ); 
                            $color_subtitle = bizberg_shop_get_slider_meta( $woo_slider_pages , 'color_subtitle' , $post->ID , '' , '' );
                            $color_content = bizberg_shop_get_slider_meta( $woo_slider_pages , 'color_content' , $post->ID , '' , '' ); ?>

                            <div class="swiper-slide">
                                <div class="slide-inner">
                                    <div class="slide-image"  
                                    style="background-image: url(<?php echo esc_url( $image_url ); ?>)">
                                    </div>
                                    <div 
                                    class="swiper-content <?php echo esc_attr( $align ) . ' slide_id_' . absint( $post->ID ); ?>"
                                    style="width: <?php echo esc_attr( $content_width ); ?>">
                                        <?php 
                                        echo wp_kses_post( bizberg_shop_get_slider_meta( $woo_slider_pages , 'subtitle' , $post->ID , '<h4 class="elementor-exclude" style="color:' . esc_attr( $color_subtitle ) . '">' , '</h4>' ) );
                                        ?>

                                        <h2 class="elementor-exclude" style="color: <?php echo esc_attr( $color_title ); ?>">
                                            <?php the_title(); ?>        
                                        </h2>

                                        <div style="color: <?php echo esc_attr( $color_content ); ?>;">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <?php
                                        $button_link = bizberg_shop_get_slider_meta( $woo_slider_pages , 'button_link' , $post->ID , '' , '' ); 
                                        $button_text = bizberg_shop_get_slider_meta( $woo_slider_pages , 'button_text' , $post->ID , '' , '' ); 

                                        if( !empty( $button_link ) && !empty( $button_text ) ) { ?>
                                            <a 
                                            href="<?php echo esc_url( $button_link ); ?>" 
                                            class="btn btn-primary menu_custom_btn woo_slider_button">
                                                <?php echo esc_html( $button_text ); ?>
                                            </a>
                                            <?php 
                                        } ?>

                                    </div>
                                    <div class="overlay"></div>
                                </div>
                            </div>

                            <?php 

                        endwhile; ?>

                    </div>

                </div>

            </div>

            <?php 
            do_action( 'bizberg_shop_after_slider_section' );
            ?>

        </div>

        <?php 

    endif; 

    return ob_get_clean();
}

function bizberg_shop_get_slider(){  ?>

    <section class="ecommerce-banner">

        <div class="container">

            <div class="row">

                <?php 
                echo wp_kses_post( bizberg_shop_get_slider_content() );
                ?>

            </div>

        </div>

    </section>
 
    <?php

}

function bizberg_shop_get_slider_meta( $data, $field, $post_id, $start_wrapper = '', $end_wrapper = '' ){

    if( !empty( $data ) && is_array( $data ) ){

        foreach ( $data as $key => $value ) {
            
            if( $value['page'] == $post_id && !empty( $value[$field] ) ){

                return $start_wrapper . $value[$field] . $end_wrapper;

            }

        }

    }

    return;

}

function bizberg_shop_get_services(){ 

    $bizberg_shop_services_status = bizberg_get_theme_mod( 'bizberg_shop_services_status' );

    if( empty( $bizberg_shop_services_status ) ){
        return;
    } ?>

    <section class="service bs_services">
        <div class="container">
            <?php echo wp_kses_post( bizberg_shop_get_services_content() ); ?>
        </div>
    </section>

    <?php
}

function bizberg_shop_get_services_content(){

    ob_start(); 

    $woo_services = bizberg_get_theme_mod( 'woo_services' );

    if( empty( $woo_services ) || !is_array( $woo_services ) ){
        return;
    } ?>

    <div class="service-inner">

        <div class="row">

            <?php 

            $columns = count( $woo_services );
            $class   = '';

            switch ( $columns ) {
                case '4':
                    $class = 'col-lg-3 col-md-6 col-sm-6 col-xs-6';
                    break;

                case '3':
                    $class = 'col-lg-4 col-md-6 col-sm-6 col-xs-6';
                    break;

                case '2':
                    $class = 'col-lg-6 col-md-6 col-sm-6 col-xs-6';
                    break;
                
                default:
                    $class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                    break;
            }

            foreach ( $woo_services as $key => $value ) {

                $title      = !empty( $value['title'] ) ? $value['title'] : '';
                $subtitle   = !empty( $value['subtitle'] ) ? $value['subtitle'] : ''; 
                $icon       = !empty( $value['icon'] ) ? $value['icon'] : ''; 
                $icon_color = !empty( $value['icon_color'] ) ? $value['icon_color'] : '#f5848c'; ?>

                <div class="<?php echo esc_attr( $class ); ?>">

                    <div class="services-item">
                        
                        <?php 
                        if( !empty( $icon ) ){ ?>
                            <i 
                            style="color: <?php echo esc_attr( $icon_color ); ?>" 
                            class="<?php echo esc_attr( $icon ); ?>"></i>
                            <?php 
                        } ?>

                        <div class="services-item-content">
                            <h4 class="elementor-exclude"><?php echo esc_html( $title ); ?></h4>
                            <p><?php echo esc_html( $subtitle ); ?></p>
                        </div>

                    </div>

                </div>

                <?php
            } ?>

        </div>
        
    </div>

    <?php

    return ob_get_clean();

}

function bizberg_shop_get_sales_banner(){

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $banner_status = bizberg_get_theme_mod( 'bs_sales_banner_status' );

    if( empty( $banner_status ) ){
        return;
    } ?>

    <section class="banner-listing bs_banner_sales">
        <div class="container">
            <?php 
            echo wp_kses_post( bizberg_shop_get_sales_banner_content() );
            ?>
        </div>
    </section>

    <?php
}

function bizberg_shop_get_sales_banner_content(){ 

    ob_start();

    $sale_slider = bizberg_get_theme_mod( 'woo_banner_sale_slider' );

    if( empty( $sale_slider ) || !is_array( $sale_slider ) ){
        return;
    } ?>

    <div class="row listing-slider banner_sale_slider">

        <?php 
        foreach ( $sale_slider as $key => $value ) { 

            $image_url = !empty( $value['image'] ) ? wp_get_attachment_url( $value['image'] ) : '';
            $link = !empty( $value['link'] ) ? $value['link'] : ''; ?>

            <div class="col-lg-4 slider-item">

                <?php 
                if( empty( $link ) ){ ?>
                    <div class="banner-listing-item" style="background-image:url( <?php echo esc_url( $image_url ); ?> );"></div>
                    <?php
                } else { ?>
                    <a href="<?php echo esc_url( $link ); ?>">
                        <div class="banner-listing-item" style="background-image:url( <?php echo esc_url( $image_url ); ?> );"></div>
                    </a> 
                    <?php 
                } ?>      

            </div>

            <?php
        } ?>
        
    </div>

    <?php

    return ob_get_clean();
}

function bizberg_shop_get_top_categories(){ 

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $bs_top_categories_status = bizberg_get_theme_mod( 'bs_top_categories_status' );

    if( empty( $bs_top_categories_status ) ){
        return;
    } ?>

    <div class="top-categories">
        <div class="container">
            <?php 
            echo wp_kses_post( bizberg_shop_get_top_categories_content() );
            ?>
        </div>
    </div>

    <?php
}

function bizberg_shop_get_top_categories_content(){

    ob_start();

    $top_categories_cat = bizberg_get_theme_mod( 'top_categories_cat' );

    $categories_title = bizberg_get_theme_mod( 'bs_top_categories_title' ); ?>

    <div class="title">
        <?php 
        if( !empty( $categories_title ) ){ ?>
            <h3 class="elementor-exclude">
                <?php 
                echo esc_html( $categories_title );
                ?>
            </h3>
            <?php 
        } ?>
    </div>

    <?php 
    if( !empty( $top_categories_cat ) && is_array( $top_categories_cat ) ){ ?>
        <div class="row attract-slider">
            <?php 
            foreach ( $top_categories_cat as $key => $value ) { 
                $image_id = !empty( $value['image'] ) ? $value['image'] : ''; 
                $category_id = !empty( $value['category'] ) ? $value['category'] : '';
                $term_obj = get_term( $category_id ); ?>
                <div class="col-sm-2">
                    <div class="categories-logo item">
                        <a href="<?php echo esc_url( get_term_link( absint( $category_id ) ) ); ?>">
                            <img src="<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>">
                            <h4 class="elementor-exclude">
                                <?php 
                                echo esc_html( !empty( $term_obj->name ) ? $term_obj->name : '' );
                                ?>
                            </h4>
                        </a>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <?php 
    } ?>

    <?php

    return ob_get_clean();

}

function bizberg_shop_get_homepage_products(){ 

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $products_status = bizberg_get_theme_mod( 'bs_tab_products_status' );

    if( empty( $products_status ) ){
        return;
    } ?>

    <section class="tabproduct">
        <div class="container">
            <?php 
            echo wp_kses_post( bizberg_shop_get_homepage_products_content() ); 
            ?>
        </div>
    </section>

    <?php
}

function bizberg_shop_get_homepage_products_content(){ 

    ob_start();

    $products_title = bizberg_get_theme_mod( 'bs_tab_products_title' );
    $product_categories = bizberg_get_theme_mod( 'tab_product_categories' );  ?>

    <div class="tabproduct-inner">
        <div class="tabproduct-box">

            <h3 class="elementor-exclude main_title">
                <?php 
                echo esc_html( $products_title );
                ?>
            </h3>

            <?php 
            if( !empty( $product_categories ) && is_array( $product_categories ) ){ ?>

                <div class="pro-navtab text-center mb-4">
                    <ul class="nav nav-tabs bs_desktop">

                        <?php 
                        foreach ( $product_categories as $key => $value ) {

                            $category_id = !empty( $value['category_id'] ) ? $value['category_id'] : '';
                            $category_obj = get_term( $category_id ); ?>
                            
                            <li class="<?php echo ( empty( $key ) ? 'active' : '' ); ?>">
                                <a data-toggle="tab" href="#bs_cat_id_<?php echo absint( $category_id ); ?>" class="bs_woo_listings_frontpage">
                                    <?php 
                                    echo esc_html( $category_obj->name );
                                    ?>
                                </a>
                            </li>

                            <?php
                        } ?>

                    </ul>
                    <div class="btn-group bs_tablet_mobile">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-plus"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php 
                            foreach ( $product_categories as $key => $value ) {

                                $category_id = !empty( $value['category_id'] ) ? $value['category_id'] : '';
                                $category_obj = get_term( $category_id ); ?>
                                
                                <li class="<?php echo ( empty( $key ) ? 'active' : '' ); ?>">
                                    <a data-toggle="tab" href="#bs_cat_id_<?php echo absint( $category_id ); ?>" class="bs_woo_listings_frontpage">
                                        <?php 
                                        echo esc_html( $category_obj->name );
                                        ?>
                                    </a>
                                </li>

                                <?php
                            } ?>
                      </ul>
                    </div>
                </div>
                <?php 
            } ?>

        </div>

        <?php 
        if( !empty( $product_categories ) && is_array( $product_categories ) ){ ?>

            <div class="tab-content">

                <?php 
                foreach ( $product_categories as $key => $value ) {

                    $category_id  = !empty( $value['category_id'] ) ? $value['category_id'] : ''; 
                    $limit        = !empty( $value['limit'] ) ? $value['limit'] : '4'; 
                    $columns      = !empty( $value['columns'] ) ? $value['columns'] : '4'; 
                    $category_obj = get_term( $category_id ); ?>

                    <div id="bs_cat_id_<?php echo absint( $category_id ); ?>" class="tab-pane <?php echo ( empty( $key ) ? 'in active' : '' ); ?>">
                        <?php 
                        echo do_shortcode( '[products category="' . esc_attr( $category_obj->slug ) . '" limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="frontpage_product_wrapper"]' );
                        ?>
                    </div>

                    <?php 
                } ?>

            </div>

            <?php 
        } ?>

    </div>

    <?php

    return ob_get_clean();

}

function bizberg_shop_get_repeater_products(){

    if( !class_exists( 'WooCommerce' ) ){
        return;
    }

    $repeater_products_frontpage = bizberg_get_theme_mod( 'repeater_products_frontpage' );

    if( empty( $repeater_products_frontpage ) || !is_array( $repeater_products_frontpage ) ){
        return;
    } ?>

    <section class="bs_repeater_product_wrapper">
        <div class="container">
            <?php 
            echo wp_kses_post( bizberg_shop_get_repeater_products_content() ); 
            ?>
        </div>
    </section>

    <?php
}

function bizberg_shop_get_repeater_products_content(){ 

    $repeater_products_frontpage = bizberg_get_theme_mod( 'repeater_products_frontpage' );

    foreach ( $repeater_products_frontpage as $key => $value ) { 

        $title_color = !empty( $value['title_color'] ) ? $value['title_color'] : '';
        $font_size = !empty( $value['font_size'] ) ? $value['font_size'] : '25'; ?>

        <div class="bs_repeater_product">
                
            <div class="tabproduct-inner">

                <div class="tabproduct-box">

                    <h3 class="elementor-exclude main_title <?php echo 'product_title_' . absint( $key ); ?>" style="color: <?php echo esc_attr( $title_color ); ?>;font-size: <?php echo esc_attr( $font_size ); ?>px">
                        <?php 
                        echo esc_html( !empty( $value['title'] ) ? $value['title'] : '' );
                        ?>
                    </h3>

                </div>

                <div class="tab-content">

                    <?php 

                    $category_id  = !empty( $value['category'] ) ? $value['category'] : ''; 
                    $category_obj = get_term( $category_id );
                    $limit        = !empty( $value['limit'] ) ? $value['limit'] : '4';
                    $columns      = !empty( $value['columns'] ) ? $value['columns'] : '4'; ?>

                    <div id="">
                        
                        <?php 

                        if( is_object( $category_obj ) && $category_id != 0 ){
                            echo do_shortcode( '[products category="' . esc_attr( $category_obj->slug ) . '" limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper"]' );
                        } else{

                            switch ( $category_id ) {

                                case 'featured_products':
                                    echo do_shortcode( '[featured_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_featured_products"]' );
                                    break;

                                case 'sale_products':
                                    echo do_shortcode( '[sale_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_sale_products"]' );
                                    break;

                                case 'best_selling_products':
                                    echo do_shortcode( '[best_selling_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_best_selling_products"]' );
                                    break;

                                case 'recent_products':
                                    echo do_shortcode( '[recent_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_recent_products"]' );
                                    break;

                                case 'top_rated_products':
                                    echo do_shortcode( '[top_rated_products limit="' . absint( $limit ) . '" columns="' . absint( $columns ) . '" class="repeater_frontpage_product_wrapper bs_top_rated_products"]' );
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }

                        }

                        ?>

                    </div>

                </div>

            </div>

        </div>

        <?php

    }

}

add_filter( 'bizberg_localize_scripts', function( $data ){

    $data['banner_sales_slidesToShowDesktop'] = bizberg_get_theme_mod( 'number_setting_desktop_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' );
    $data['banner_sales_slidesToShowTablet']  = bizberg_get_theme_mod( 'number_setting_tablet_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' );
    $data['banner_sales_slidesToShowMobile']  = bizberg_get_theme_mod( 'number_setting_mobile_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' );
    $data['tab_product_masnory_status']       = bizberg_get_theme_mod( 'tab_product_masnory_status' );

    return $data;

});

add_action( 'wp_loaded', 'bizberg_shop_get_page_content' );
function bizberg_shop_get_page_content(){

    $pages = bizberg_get_theme_mod( 'gutenberg_blocks_repeater' );

    if( empty( $pages ) || !is_array( $pages ) ){
        return;
    }

    foreach ( $pages as $key => $value ) {
        
        $location = !empty( $value['location'] ) ? $value['location'] : '';
        $width = !empty( $value['width'] ) ? $value['width'] : 'box_width';
        $page_id = !empty( $value['page_id'] ) ? $value['page_id'] : '';

        if( !empty( $location ) && !empty( $page_id ) ){

            switch ( $location ) {

                case 'before_slider':
                    $action_name = 'bizberg_shop_before_slider_section';
                    break;

                case 'after_slider':
                    $action_name = 'bizberg_shop_after_slider_section';
                    break;

                case 'before_services':
                    $action_name = 'bizberg_shop_before_services_section';
                    break;

                case 'before_sales_banner':
                    $action_name = 'bizberg_shop_before_sales_banner_section';
                    break;

                case 'before_top_categories':
                    $action_name = 'bizberg_shop_before_top_categories_section';
                    break;

                case 'before_woo_tab_products':
                    $action_name = 'bizberg_shop_before_woocommerce_tab_products';
                    break;

                case 'before_repeater_products':
                    $action_name = 'bizberg_shop_before_repeater_products';
                    break;

                case 'before_clients_logo':
                    $action_name = 'bizberg_shop_before_clients_logo';
                    break;

                case 'before_footer':
                    $action_name = 'bizberg_shop_before_footer';
                    break;
                
                default:
                    # code...
                    break;
            }

            add_action( $action_name , function() use ( $page_id, $action_name, $width ) {

                $args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
                    'post__in' => array( $page_id )
                );

                $block_query = new WP_Query( $args );

                if( $block_query->have_posts() ):

                    while( $block_query->have_posts() ): $block_query->the_post();

                        if( $action_name == 'bizberg_shop_before_slider_section' || $action_name == 'bizberg_shop_after_slider_section' ){
                            the_content();
                        } else {

                            if( $width == 'box_width' ){
                                echo '<div class="container">';
                                the_content();
                                echo '</div>';
                            } else {
                                the_content();
                            }
                        }

                    endwhile;

                endif;

                wp_reset_postdata();

            });

        }

    }

}

function bizberg_shop_get_clients_logo(){

    $clients_logo = bizberg_get_theme_mod( 'clients_logo' );
     
    if( empty( $clients_logo ) || !is_array( $clients_logo ) ){
        return;
    } ?>

    <div class="brands bs_brands">
        <div class="container">
            
                <?php 
                echo wp_kses_post( bizberg_shop_get_clients_logo_content() );
                ?>
            
        </div>
    </div>

    <?php
}

function bizberg_shop_get_clients_logo_content(){

    $clients_logo = bizberg_get_theme_mod( 'clients_logo' );

    ob_start(); 

    echo '<div class="row"><div class="bs_clients_logo">';

    foreach ( $clients_logo as $key => $value ) {

        $image_id = !empty( $value['image_id'] ) ? absint( $value['image_id'] ) : '';
        $link = !empty( $value['link'] ) ? $value['link'] : '';

        if( !empty( $image_id ) ){ ?>
                
            <div class="col-sm-2">

                <div class="client-logo item">

                    <?php 
                    if( !empty( $link ) ){ ?>
                        <a href="<?php echo esc_url( $link ); ?>" target="_blank">
                            <img src="<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>"/>
                        </a>
                        <?php
                    } else { ?>
                        <img src="<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>"/>
                        <?php
                    } ?>

                </div>

            </div>

            <?php
        } 

    } 

    echo '</div></div>';

    return ob_get_clean();

}

add_filter( 'bizberg_recommended_plugins', 'bizberg_shop_recommended_plugins' );
function bizberg_shop_recommended_plugins( $plugins ){

    $plugins = array(

        array(
            'name'     => esc_html__( 'One Click Demo Import', 'bizberg-shop' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'WooCommerce', 'bizberg-shop' ),
            'slug'     => 'woocommerce',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'bizberg-shop' ),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'YITH WooCommerce Quick View', 'bizberg-shop' ),
            'slug'     => 'yith-woocommerce-quick-view',
            'required' => false
        ),
        array(
            'name'     => esc_html__( 'YITH WooCommerce Compare', 'bizberg-shop' ),
            'slug'     => 'yith-woocommerce-compare',
            'required' => false
        ),
        array(
            'name'     => esc_html__( 'Cyclone Demo Importer', 'bizberg-shop' ),
            'slug'     => 'cyclone-demo-importer',
            'required' => false
        )

    );

    return $plugins;

}

add_filter( 'bizberg_plugins', function( $plugins ){

    $plugins = array(
        array(
            'slug' => 'one-click-demo-import/one-click-demo-import.php',
            'zip'  => 'one-click-demo-import'
        ),
        array(
            'slug' => 'woocommerce/woocommerce.php',
            'zip'  => 'woocommerce'
        ),
        array(
            'slug' => 'yith-woocommerce-compare/init.php',
            'zip'  => 'yith-woocommerce-compare'
        ),
        array(
            'slug' => 'yith-woocommerce-quick-view/init.php',
            'zip'  => 'yith-woocommerce-quick-view'
        ), 
        array(
            'slug' => 'yith-woocommerce-wishlist/init.php',
            'zip'  => 'yith-woocommerce-wishlist'
        ),  
        array(
            'slug' => 'cyclone-demo-importer/index.php',
            'zip'  => 'cyclone-demo-importer'
        )           
    );

    return $plugins;

},999);

add_filter( 'bizberg_sidebar_widget_heading_font_size_status', 'bizberg_shop_sidebar_widget_heading_font_size_status' );
function bizberg_shop_sidebar_widget_heading_font_size_status(){
    return true;
}
 
add_filter( 'bizberg_number_setting_desktop_sidebar_widget_heading_font_sizes', 'bizberg_shop_number_setting_desktop_sidebar_widget_heading_font_sizes' );
function bizberg_shop_number_setting_desktop_sidebar_widget_heading_font_sizes(){
    return 25;
}
 
add_filter( 'bizberg_number_setting_tablet_sidebar_widget_heading_font_sizes', 'bizberg_shop_number_setting_tablet_sidebar_widget_heading_font_sizes' );
function bizberg_shop_number_setting_tablet_sidebar_widget_heading_font_sizes(){
    return 23.44;
}
 
add_filter( 'bizberg_number_setting_mobile_sidebar_widget_heading_font_sizes', 'bizberg_shop_number_setting_mobile_sidebar_widget_heading_font_sizes' );
function bizberg_shop_number_setting_mobile_sidebar_widget_heading_font_sizes(){
    return 20.31;
}