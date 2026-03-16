<?php
/**
 * Grow Group Theme Functions
 *
 * @package GrowShop
 */

// ============================================================
// Theme Setup
// ============================================================

add_action( 'after_setup_theme', 'growshop_setup' );
function growshop_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'editor-styles' );

    register_nav_menus( array(
        'primary' => 'Menu główne',
        'footer'  => 'Menu stopki',
    ) );
}

// ============================================================
// Enqueue Styles & Scripts
// ============================================================

add_action( 'wp_enqueue_scripts', 'growshop_enqueue' );
function growshop_enqueue() {
    $theme_uri = get_template_directory_uri();
    $theme_ver = wp_get_theme()->get( 'Version' );

    // --- Vendor CSS ---
    wp_enqueue_style( 'growshop-font', $theme_uri . '/assets/css/vendor/font-family-plus-jakarta-sans.css', array(), null );
    wp_enqueue_style( 'growshop-bootstrap', $theme_uri . '/assets/css/vendor/bootstrap.min.css', array(), '5.3' );
    wp_enqueue_style( 'growshop-animate', $theme_uri . '/assets/css/vendor/animate.min.css', array(), '4.1' );
    wp_enqueue_style( 'growshop-swiper', $theme_uri . '/assets/css/vendor/swiper-bundle.min.css', array(), '11.0' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

    // --- Global CSS ---
    wp_enqueue_style( 'growshop-global', $theme_uri . '/assets/css/global.css', array( 'growshop-bootstrap', 'growshop-animate' ), $theme_ver );

    // --- Vendor JS ---
    wp_enqueue_script( 'jquery' ); // WP built-in
    wp_enqueue_script( 'growshop-bootstrap-js', $theme_uri . '/assets/js/vendor/bootstrap.bundle.min.js', array( 'jquery' ), '5.3', true );
    wp_enqueue_script( 'growshop-swiper-js', $theme_uri . '/assets/js/vendor/swiper-bundle.min.js', array(), '11.0', true );

    // --- Global JS ---
    wp_enqueue_script( 'growshop-global-js', $theme_uri . '/assets/js/global.js', array( 'jquery' ), $theme_ver, true );

    // Pass theme URI to JS
    wp_localize_script( 'growshop-global-js', 'growshopData', array(
        'themeUrl' => $theme_uri,
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
    ) );

    // --- Per-block JS (conditional) ---
    if ( has_block( 'acf/hero-banner' ) ) {
        wp_enqueue_script( 'growshop-hero-banner', $theme_uri . '/blocks/hero-banner/hero-banner.js', array(), $theme_ver, true );
    }

    if ( has_block( 'acf/growth-dashboard' ) ) {
        wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
        wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array( 'gsap' ), '3.12.5', true );
        wp_enqueue_script( 'growshop-growth-dashboard', $theme_uri . '/blocks/growth-dashboard/growth-dashboard.js', array( 'gsap', 'gsap-scrolltrigger' ), $theme_ver, true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

// ============================================================
// Editor Styles & Scripts (Gutenberg)
// ============================================================

add_action( 'enqueue_block_editor_assets', 'growshop_editor_assets' );
function growshop_editor_assets() {
    $theme_uri = get_template_directory_uri();
    $theme_ver = wp_get_theme()->get( 'Version' );

    // Vendor CSS needed for block preview
    wp_enqueue_style( 'growshop-editor-font', $theme_uri . '/assets/css/vendor/font-family-plus-jakarta-sans.css', array(), null );
    wp_enqueue_style( 'growshop-editor-bootstrap', $theme_uri . '/assets/css/vendor/bootstrap.min.css', array(), '5.3' );
    wp_enqueue_style( 'growshop-editor-animate', $theme_uri . '/assets/css/vendor/animate.min.css', array(), '4.1' );
    wp_enqueue_style( 'font-awesome-editor', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

    // Global theme CSS
    wp_enqueue_style( 'growshop-editor-global', $theme_uri . '/assets/css/global.css', array( 'growshop-editor-bootstrap' ), $theme_ver );

    // Editor-specific overrides
    wp_enqueue_style( 'growshop-editor', $theme_uri . '/assets/css/editor.css', array( 'growshop-editor-global' ), $theme_ver );
}

// ============================================================
// ACF Blocks Registration
// ============================================================

add_action( 'acf/init', 'growshop_register_acf_blocks' );
function growshop_register_acf_blocks() {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    $blocks_dir = get_template_directory() . '/blocks';
    if ( ! is_dir( $blocks_dir ) ) {
        return;
    }

    foreach ( scandir( $blocks_dir ) as $block ) {
        if ( $block === '.' || $block === '..' ) {
            continue;
        }
        $block_json = $blocks_dir . '/' . $block . '/block.json';
        if ( file_exists( $block_json ) ) {
            register_block_type( $block_json );
        }
    }
}

// Custom block category
add_filter( 'block_categories_all', 'growshop_block_category' );
function growshop_block_category( $categories ) {
    array_unshift( $categories, array(
        'slug'  => 'growshop',
        'title' => 'Grow Group',
        'icon'  => 'chart-line',
    ) );
    return $categories;
}

// ============================================================
// Nav Menu: Bootstrap classes
// ============================================================

add_filter( 'nav_menu_css_class', 'growshop_nav_menu_li_class', 10, 4 );
function growshop_nav_menu_li_class( $classes, $item, $args ) {
    if ( $args->theme_location === 'primary' || $args->theme_location === 'footer' ) {
        $classes[] = 'nav-item';
    }
    return $classes;
}

add_filter( 'nav_menu_link_attributes', 'growshop_nav_menu_link_class', 10, 4 );
function growshop_nav_menu_link_class( $atts, $item, $args ) {
    if ( $args->theme_location === 'primary' ) {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}

// Footer menu fallback
function growshop_footer_fallback_menu() {
    echo '<ul class="footer-list">';
    echo '<li><a href="' . esc_url( home_url( '/#jak-dzialamy' ) ) . '">Jak działamy</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#efekty' ) ) . '">Efekty</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#case-studies' ) ) . '">Case Studies</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#zespol' ) ) . '">Zespół</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#blog' ) ) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#kontakt' ) ) . '">Kontakt</a></li>';
    echo '</ul>';
}

// ============================================================
// ACF Options Page
// ============================================================

add_action( 'acf/init', 'growshop_acf_options_page' );
function growshop_acf_options_page() {
    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }

    acf_add_options_page( array(
        'page_title' => 'Ustawienia Grow Group',
        'menu_title' => 'Grow Group',
        'menu_slug'  => 'growshop-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-chart-line',
        'position'   => 2,
    ) );
}

// ============================================================
// ACF JSON Sync
// ============================================================

add_filter( 'acf/settings/save_json', 'growshop_acf_json_save' );
function growshop_acf_json_save() {
    return get_template_directory() . '/acf-json';
}

add_filter( 'acf/settings/load_json', 'growshop_acf_json_load' );
function growshop_acf_json_load( $paths ) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}

// ============================================================
// Blog URL helper
// ============================================================

function growshop_get_blog_url() {
    $posts_page_id = (int) get_option( 'page_for_posts' );
    if ( $posts_page_id > 0 ) {
        $posts_page_url = get_permalink( $posts_page_id );
        if ( $posts_page_url ) {
            return $posts_page_url;
        }
    }

    // Fallback when "Posts page" is not configured in Settings > Reading.
    return home_url( '/?post_type=post' );
}

// ============================================================
// Blog excerpts
// ============================================================

add_filter( 'excerpt_length', 'growshop_excerpt_length', 999 );
function growshop_excerpt_length() {
    return 20;
}

add_filter( 'excerpt_more', 'growshop_excerpt_more' );
function growshop_excerpt_more() {
    return '...';
}
