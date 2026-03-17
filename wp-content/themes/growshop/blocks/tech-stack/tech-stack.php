<?php
/**
 * Tech Stack Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// ACF Fields
$heading     = get_field( 'ts_heading' ) ?: 'Technology Stack';
$description = get_field( 'ts_description' ) ?: 'Pracujemy z najlepszymi narzędziami na rynku. Generujemy wzrosty w Twoim sklepie dzięki sprawdzonym technologiom.';
$logos       = get_field( 'ts_logos' );

// Default logos
$theme_uri = get_template_directory_uri();
$default_logos = array(
    array( 'url' => $theme_uri . '/assets/images/tech-meta.png', 'alt' => 'Meta' ),
    array( 'url' => $theme_uri . '/assets/images/tech-google.png', 'alt' => 'Google' ),
    array( 'url' => $theme_uri . '/assets/images/tech-tiktok.png', 'alt' => 'TikTok' ),
    array( 'url' => $theme_uri . '/assets/images/tech-google-analytics.png', 'alt' => 'Google Analytics' ),
    array( 'url' => $theme_uri . '/assets/images/tech-shopify.png', 'alt' => 'Shopify' ),
    array( 'url' => $theme_uri . '/assets/images/tech-wordpress.png', 'alt' => 'WordPress' ),
    array( 'url' => $theme_uri . '/assets/images/tech-klaviyo.png', 'alt' => 'Klaviyo' ),
    array( 'url' => $theme_uri . '/assets/images/tech-hotjar.png', 'alt' => 'Hotjar' ),
);
?>

<div class="section-partner"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="card card-partner animate-box animated animate__animated" data-animate="animate__fadeIn">
            <div class="partner-spacer"></div>
            <div class="row row-cols-xl-2 row-cols-1 align-items-center px-5 position-relative z-2">
                <div class="col">
                    <div class="d-flex flex-column justify-content-start pe-xl-3 pe-0">
                        <h3 class="title-heading"><?php echo esc_html( $heading ); ?></h3>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex flex-column ps-xl-3 ps-0">
                        <p><?php echo esc_html( $description ); ?></p>
                    </div>
                </div>
            </div>
            <div class="tech-stack-grid">
                <?php
                if ( $logos ) :
                    foreach ( $logos as $logo ) :
                        $img_url = is_array( $logo['logo_image'] ) ? $logo['logo_image']['url'] : '';
                        $img_alt = is_array( $logo['logo_image'] ) ? ( $logo['logo_image']['alt'] ?: $logo['logo_image']['title'] ) : '';
                        if ( $img_url ) :
                ?>
                <div class="tech-stack-card">
                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" class="tech-stack-logo">
                </div>
                <?php
                        endif;
                    endforeach;
                else :
                    foreach ( $default_logos as $logo ) :
                ?>
                <div class="tech-stack-card">
                    <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="tech-stack-logo">
                </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
