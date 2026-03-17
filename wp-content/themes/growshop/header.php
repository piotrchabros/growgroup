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
$logo         = get_field( 'site_logo', 'option' );
$phone        = get_field( 'contact_phone', 'option' ) ?: '+48 789 354 695';
?>

<header>
    <div class="navbar-wrapper">
        <nav class="navbar navbar-expand-xl">
            <div class="navbar-container">
                <div class="logo-container">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
                        <?php if ( $logo ) : ?>
                            <img src="<?php echo esc_url( $logo['url'] ); ?>" class="site-logo site-logo-wordmark img-fluid" alt="<?php echo esc_attr( $logo['alt'] ?: get_bloginfo( 'name' ) ); ?>">
                        <?php else : ?>
                            <?php bloginfo( 'name' ); ?>
                        <?php endif; ?>
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
                    <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>" class="navbar-phone-link">
                        <span class="navbar-phone-icon">
                            <i class="fa-solid fa-phone-volume"></i>
                        </span>
                        <h6><?php echo esc_html( $phone ); ?></h6>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Sidebar -->
<div class="sidebar-overlay"></div>
<div class="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
            <?php if ( $logo ) : ?>
                <img src="<?php echo esc_url( $logo['url'] ); ?>" class="site-logo site-logo-wordmark img-fluid" alt="<?php echo esc_attr( $logo['alt'] ?: get_bloginfo( 'name' ) ); ?>">
            <?php else : ?>
                <span class="navbar-brand"><?php bloginfo( 'name' ); ?></span>
            <?php endif; ?>
        </a>
        <button class="close-btn" aria-label="Zamknij menu">✕</button>
    </div>
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'menu',
        'fallback_cb'    => false,
        'depth'          => 1,
        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
    ) );
    ?>
    <div class="sidebar-phone">
        <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>" class="navbar-phone-link" style="justify-content:flex-start; padding: 10px;">
            <span class="navbar-phone-icon" style="width:36px;height:36px;font-size:1rem;">
                <i class="fa-solid fa-phone-volume"></i>
            </span>
            <h6 style="margin:0;"><?php echo esc_html( $phone ); ?></h6>
        </a>
    </div>
</div>
