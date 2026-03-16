<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$theme_uri    = get_template_directory_uri();
$logo         = get_field( 'site_logo', 'option' );
$logo_url     = $logo ? $logo['url'] : $theme_uri . '/assets/images/growshop-logo-light.png';
$logo_alt     = $logo ? ( $logo['alt'] ?: 'Grow Group' ) : 'Grow Group';
$phone        = get_field( 'contact_phone', 'option' ) ?: '+48 789 354 695';
?>

<header>
    <div class="navbar-wrapper">
        <nav class="navbar navbar-expand-xl">
            <div class="navbar-container">
                <div class="logo-container">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
                        <img src="<?php echo esc_url( $logo_url ); ?>" class="site-logo site-logo-wordmark img-fluid" alt="<?php echo esc_attr( $logo_alt ); ?>">
                    </a>
                </div>
                <button class="navbar-toggler nav-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav mx-auto',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ) );
                    ?>
                </div>
                <div class="navbar-action-container">
                    <div class="navbar-icon-wrapper">
                        <div class="icon-circle">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <h6><?php echo esc_html( $phone ); ?></h6>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
