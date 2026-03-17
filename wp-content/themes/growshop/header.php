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
                <button class="navbar-toggler nav-btn" type="button"
                    aria-controls="mobileMenu" aria-expanded="false" aria-label="Menu">
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

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="mobile-menu-glow"></div>
    <div class="mobile-menu-inner">
        <div class="mobile-menu-header">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-menu-logo-link" aria-label="<?php bloginfo( 'name' ); ?>">
                <?php if ( $logo ) : ?>
                    <img src="<?php echo esc_url( $logo['url'] ); ?>" class="img-fluid" alt="<?php echo esc_attr( $logo['alt'] ?: get_bloginfo( 'name' ) ); ?>" style="height:36px;width:auto;">
                <?php else : ?>
                    <span class="navbar-brand"><?php bloginfo( 'name' ); ?></span>
                <?php endif; ?>
            </a>
            <button class="mobile-menu-close" aria-label="Zamknij menu">
                <span></span>
                <span></span>
            </button>
        </div>
        <nav class="mobile-menu-nav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'mobile-menu-list',
                'fallback_cb'    => false,
                'depth'          => 1,
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            ) );
            ?>
        </nav>
        <div class="mobile-menu-footer">
            <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>" class="mobile-menu-phone">
                <span class="mobile-menu-phone-icon">
                    <i class="fa-solid fa-phone-volume"></i>
                </span>
                <span><?php echo esc_html( $phone ); ?></span>
            </a>
        </div>
    </div>
</div>
