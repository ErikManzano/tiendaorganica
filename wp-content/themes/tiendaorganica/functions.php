<?php

/** CMB2 */
require_once dirname(__FILE__) . '/cmb2.php';

/** Añadir campos personalizados */
require_once dirname(__FILE__) . '/inc/custom-fields.php';

/** Opciones del Theme */
require_once dirname(__FILE__) . '/inc/opciones.php';


/** Imagenes destacadas para pages.php */
add_action('init', 'tiendaOrg_imagen_destacada');
function tiendaOrg_imagen_destacada($id) {
    $imagen = get_the_post_thumbnail_url($id, 'full');

    $html = '';
    $clase = false;
    if($imagen) {
        $clase = true;
        $html .= '<div>';
        $html .=    '<div class="row imagen-destacada"></div>';
        $html .= '</div>';

        // Agregar estilos linealmente
        wp_register_style('custom', false);
        wp_enqueue_style('custom');

        // CSS para el custom
        $imagen_destacada_css = "
            .imagen-destacada {
                background-image: url({$imagen});
            }
        ";
        wp_add_inline_style( 'custom', $imagen_destacada_css);
    }
    return array($html, $clase);
}


/** Funciones cargadas al activar el tema */
function tiendaOrg_setup() {

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support( 'woocommerce' );

    // Menú de navegación
    register_nav_menus( array (
        'menu_principal'  => esc_html__( 'Menu Principal', 'tiendaorganica'),
        'menu_secundario' => esc_html__( 'Menu Secundario', 'tiendaorganica')
    ) );
}
add_action( 'after_setup_theme', 'tiendaOrg_setup');


/** Añadir nav-link al menu principal */
function tiendaOrg_enlace_class($atts, $item, $args) {
    if($args->theme_location == 'menu_principal') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'tiendaOrg_enlace_class', 10, 3);
/* Scripts y CSS */

/* Styles */
function tiendaOrg_scripts() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '5.3.0');

    wp_enqueue_style( 'style', get_stylesheet_uri(), array('bootstrap-css') );
}
add_action('wp_enqueue_scripts', 'tiendaOrg_scripts');

/* Scripts */
function tiendaOrg_js() {
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'popper', 'https://unpkg.com/@popperjs/core@2', array('jquery'), '1.0', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('popper'), '5.3.0', true); 
}
add_action( 'wp_enqueue_scripts', 'tiendaOrg_js');


// Funciones modificadas de Woocommerce
function woocommerce_template_loop_product_title() {
    echo '<h2 class="'. esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title', 'titulo-producto' ) ) . '">' . get_the_title() . '</h2>'; 
}

// WooCommerce Cambiar titulo producto H2 -> H3
function wps_change_products_title() {
 
    echo '<h3 class="woocommerce-loop-product__title">'. get_the_title() . '</h3>';
 
}
 
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'wps_change_products_title', 10);

// Añadir clases a los productos
add_filter( 'woocommerce_product_loop_title_classes', 'custom_woocommerce_product_loop_title_classes' );
/**
 * Append custom class(es) to the default WooCommerce product title class.
 *
 * @param string $class Existing class(es).
 * @return string Modified class(es).
 */
function custom_woocommerce_product_loop_title_classes( $class ) {
	return $class . ' titulo-producto'; // set your additional class(es) here.
}