<?php
/**
 * Onboarding Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="onboarding"';

// ACF Fields
$theme_uri        = get_template_directory_uri();
$sub_heading_icon = get_field( 'ob_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'ob_sub_heading_text' ) ?: 'Onboarding Process';
$heading          = get_field( 'ob_heading' ) ?: 'Jak wygląda start';
$description      = get_field( 'ob_description' ) ?: 'Prosty, przejrzysty proces współpracy. Od pierwszej rozmowy do konkretnego planu działania.';
$image            = get_field( 'ob_image' );
$cta_title        = get_field( 'ob_cta_title' ) ?: 'Gotowy na wzrost?';
$cta_link_text    = get_field( 'ob_cta_link_text' ) ?: 'Umów konsultację';
$cta_link_url     = get_field( 'ob_cta_link_url' ) ?: '#kontakt';
$steps            = get_field( 'ob_steps' );

// Default image
$image_url = $image ? $image['url'] : $theme_uri . '/assets/images/onboarding-section.png';
$image_alt = $image ? ( $image['alt'] ?: 'Onboarding Image' ) : 'Onboarding Image';

// Default steps
$default_steps = array(
    array( 'icon_class' => 'fa-solid fa-comments fa-2x text-white', 'title' => 'Konsultacja', 'description' => 'Bezpłatna rozmowa o Twoim sklepie i celach biznesowych.' ),
    array( 'icon_class' => 'fa-solid fa-magnifying-glass-chart fa-2x text-white', 'title' => 'Poznanie potrzeb', 'description' => 'Analiza aktualnej sytuacji i wyzwań Twojego biznesu.' ),
    array( 'icon_class' => 'fa-solid fa-list-check fa-2x text-white', 'title' => 'Audyt sklepu', 'description' => 'Ocena potencjału wzrostu i obszarów optymalizacji.' ),
);
$steps_data = $steps ?: $default_steps;
$anim_speeds = array( 'fast', '', 'slow' );
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="d-flex flex-column flex-xl-row gspace-5">
            <div class="chooseus-card-container">
                <div class="d-flex flex-column gspace-2">
                    <?php foreach ( $steps_data as $index => $step ) :
                        $speed = isset( $anim_speeds[ $index ] ) ? $anim_speeds[ $index ] : '';
                    ?>
                    <div class="card card-chooseus animate-box animated <?php echo esc_attr( $speed ); ?> animate__animated" data-animate="animate__fadeInLeft">
                        <div class="chooseus-icon-wrapper">
                            <div class="chooseus-spacer above"></div>
                            <div class="chooseus-icon-layout">
                                <div class="chooseus-icon">
                                    <i class="<?php echo esc_attr( $step['icon_class'] ); ?>"></i>
                                </div>
                            </div>
                            <div class="chooseus-spacer below"></div>
                        </div>
                        <div class="chooseus-content">
                            <h4 class="chooseus-title"><?php echo esc_html( $step['title'] ); ?></h4>
                            <p><?php echo esc_html( $step['description'] ); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="chooseus-content-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="d-flex flex-column gspace-2">
                        <div class="sub-heading animate-box animated animate__animated" data-animate="animate__fadeInDown">
                            <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                            <span><?php echo esc_html( $sub_heading_text ); ?></span>
                        </div>
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInDown"><?php echo esc_html( $heading ); ?></h2>
                        <p class="mb-0 animate-box animated animate__animated" data-animate="animate__fadeInDown"><?php echo esc_html( $description ); ?></p>
                    </div>
                    <div class="image-container">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="chooseus-img">
                        <div class="card-chooseus-cta-layout">
                            <div class="chooseus-cta-spacer"></div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="chooseus-cta-spacer"></div>
                                <div class="card-chooseus-cta-wrapper">
                                    <div class="card card-chooseus-cta animate-box animated animate__animated" data-animate="animate__fadeInUp">
                                        <h5><?php echo esc_html( $cta_title ); ?></h5>
                                        <div class="link-wrapper">
                                            <a href="<?php echo esc_url( $cta_link_url ); ?>"><?php echo esc_html( $cta_link_text ); ?></a>
                                            <i class="fa-solid fa-circle-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
