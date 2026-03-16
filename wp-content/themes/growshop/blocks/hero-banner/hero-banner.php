<?php
/**
 * Hero Banner Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="hero-v0"';

// ACF Fields
$heading           = get_field( 'hero_heading' ) ?: 'AI Growth System dla <span style="white-space: nowrap">biznesu</span>';
$description       = get_field( 'hero_description' ) ?: 'Grow Group skaluje sprzedaż firm poprzez AI, reklamy, UX/UI, automatyzacje i SEO — z gwarantowanymi wynikami.';
$scroll_text       = get_field( 'hero_scroll_text' ) ?: 'Dowiedz się jak skalujemy sprzedaż firm z gwarantowanymi wynikami.';
$scroll_link       = get_field( 'hero_scroll_link' ) ?: '#jak-dzialamy';
$cta_text          = get_field( 'hero_cta_text' ) ?: 'Umów konsultację';
$cta_link          = get_field( 'hero_cta_link' ) ?: '#kontakt';
$youtube_video_id  = get_field( 'hero_youtube_video_id' ) ?: 'P68V3iH4TeE';
$reviewer_count    = get_field( 'hero_reviewer_count' ) ?: '100+';
$reviewer_label    = get_field( 'hero_reviewer_label' ) ?: 'zadowolonych klientów';
$reviewer_avatars  = get_field( 'hero_reviewer_avatars' );
$stats             = get_field( 'hero_stats' );

// Default avatars
$theme_uri = get_template_directory_uri();
$default_avatars = array(
    $theme_uri . '/assets/images/avatar-1.png',
    $theme_uri . '/assets/images/avatar-2.png',
    $theme_uri . '/assets/images/avatar-3.png',
);

// Default stats
$default_stats = array(
    array( 'prefix' => '+', 'value' => '34', 'suffix' => '%', 'label' => 'długości sesji', 'bold' => false ),
    array( 'prefix' => '+', 'value' => '28', 'suffix' => '%', 'label' => 'oglądanych produktów', 'bold' => false ),
    array( 'prefix' => '+', 'value' => '36', 'suffix' => '%', 'label' => 'transakcji', 'bold' => false ),
    array( 'prefix' => '+', 'value' => '1100', 'suffix' => '%', 'label' => 'średni ROAS', 'bold' => true ),
);
?>

<div class="section-banner"<?php echo $anchor; ?>>
    <div class="banner-video-container keep-dark animate-box animated animate__animated" data-animate="animate__fadeInUp">
        <div id="banner-video-background" data-video-id="<?php echo esc_attr( $youtube_video_id ); ?>"></div>
        <div class="hero-container position-relative">
            <div class="d-flex flex-column gspace-2">
                <h1 class="title-heading-banner animate-box animated animate__animated" data-animate="animate__fadeInLeft"><?php echo wp_kses_post( $heading ); ?></h1>
                <div class="banner-heading">
                    <div class="banner-video-content order-xl-1 order-2 animate-box animated animate__animated" data-animate="animate__fadeInUp">
                        <div class="d-flex flex-column flex-xl-row text-xl-start text-center align-items-center gspace-5">
                            <a href="<?php echo esc_url( $scroll_link ); ?>" class="scroll-down-btn" aria-label="Przewiń w dół">
                                <i class="fa-solid fa-arrow-down"></i>
                            </a>
                            <p><?php echo esc_html( $scroll_text ); ?></p>
                        </div>
                    </div>
                    <div class="banner-content order-xl-2 order-1 animate-box animated animate__animated" data-animate="animate__fadeInRight">
                        <p><?php echo esc_html( $description ); ?></p>
                        <div class="d-flex flex-md-row flex-column justify-content-center justify-content-xl-start align-self-center align-self-xl-start gspace-3">
                            <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn-accent">
                                <div class="btn-title">
                                    <span><?php echo esc_html( $cta_text ); ?></span>
                                </div>
                                <div class="icon-circle">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                            <div class="banner-reviewer">
                                <div class="d-flex flex-row align-items-center">
                                    <?php
                                    if ( $reviewer_avatars ) :
                                        foreach ( $reviewer_avatars as $avatar ) :
                                            ?>
                                            <img src="<?php echo esc_url( $avatar['url'] ); ?>" alt="<?php echo esc_attr( $avatar['alt'] ?: 'Klient' ); ?>" class="avatar">
                                            <?php
                                        endforeach;
                                    else :
                                        foreach ( $default_avatars as $avatar_url ) :
                                            ?>
                                            <img src="<?php echo esc_url( $avatar_url ); ?>" alt="Klient" class="avatar">
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                                <div class="detail">
                                    <span><?php echo esc_html( $reviewer_count ); ?></span>
                                    <span><?php echo esc_html( $reviewer_label ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="row row-cols-2 row-cols-md-4 g-4 mt-5 animate-box animated animate__animated" data-animate="animate__fadeInUp">
                    <?php
                    $stats_data = $stats ?: $default_stats;
                    foreach ( $stats_data as $stat ) :
                        $is_bold = ! empty( $stat['bold'] );
                        $prefix  = $stat['prefix'] ?? '+';
                        $value   = $stat['value'] ?? '0';
                        $suffix  = $stat['suffix'] ?? '%';
                        $label   = $stat['label'] ?? '';
                    ?>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter-detail text-white"><?php echo esc_html( $prefix ); ?></span>
                                <span class="counter text-white fs-2 fw-bold" data-target="<?php echo esc_attr( $value ); ?>">0</span>
                                <span class="counter-detail text-white"><?php echo esc_html( $suffix ); ?></span>
                            </div>
                            <p class="text-white <?php echo $is_bold ? 'fw-bold opacity-100 mt-2' : 'opacity-75'; ?>"><?php echo esc_html( $label ); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
