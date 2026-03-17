<?php
/**
 * Process Steps Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="jak-dzialamy"';

// ACF Fields
$sub_heading_icon = get_field( 'ps_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'ps_sub_heading_text' ) ?: 'Growth Flow';
$heading          = get_field( 'ps_heading' ) ?: 'Jak działamy';
$description      = get_field( 'ps_description' ) ?: 'Budujemy jeden spójny system wzrostu, w którym każdy element wzmacnia pozostałe. Nie wdrażamy pojedynczych rozwiązań. Budujemy środowisko, które pracuje na wynik.';
$cta_text         = get_field( 'ps_cta_text' ) ?: 'Rozpocznij współpracę';
$cta_link         = get_field( 'ps_cta_link' ) ?: '#kontakt';
$steps            = get_field( 'ps_steps' );

// Default steps
$default_steps = array(
    array( 'icon_class' => 'fa-solid fa-bullhorn fa-3x text-white', 'number' => '01', 'title' => 'Reklamy & Ruch', 'description' => 'Pozyskujemy wartościowy ruch na stronę poprzez precyzyjnie targetowane kampanie.' ),
    array( 'icon_class' => 'fa-solid fa-wand-magic-sparkles fa-3x text-white', 'number' => '02', 'title' => 'AI & UX/UI', 'description' => 'Optymalizujemy doświadczenie użytkownika i konwersję przy użyciu AI.' ),
    array( 'icon_class' => 'fa-solid fa-gears fa-3x text-white', 'number' => '03', 'title' => 'Automatyzacje', 'description' => 'Skalujemy sprzedaż i odzyskujemy koszyki dzięki zaawansowanym automatyzacjom.' ),
    array( 'icon_class' => 'fa-solid fa-arrow-trend-up fa-3x text-white', 'number' => '04', 'title' => 'Wzrost Przychodu', 'description' => 'Budujemy stabilny i przewidywalny biznes oparty na danych.' ),
);
$steps_data = $steps ?: $default_steps;
$animations = array( 'animate__fadeIn', 'animate__fadeIn', 'animate__fadeIn', 'animate__fadeIn' );
?>

<div class="section-wrapper-digital-process"<?php echo $anchor; ?>>
    <div class="section digital-process-banner">
        <div class="hero-container">
            <div class="digital-process-content">
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                    <div class="col">
                        <div class="d-flex flex-column gspace-2 animate-box animated animate__animated" data-animate="animate__fadeIn">
                            <div class="sub-heading">
                                <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                                <span><?php echo esc_html( $sub_heading_text ); ?></span>
                            </div>
                            <h2 class="title-heading"><?php echo esc_html( $heading ); ?></h2>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column gspace-2 justify-content-end h-100 animate-box animated fast animate__animated" data-animate="animate__fadeIn">
                            <p><?php echo esc_html( $description ); ?></p>
                            <div class="link-wrapper">
                                <a href="<?php echo esc_url( $cta_link ); ?>"><?php echo esc_html( $cta_text ); ?></a>
                                <i class="fa-solid fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="digital-process-steps-wrapper">
                    <div class="digital-process-steps">
                        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
                            <?php foreach ( $steps_data as $index => $step ) :
                                $is_first = ( $index === 0 );
                                $anim = isset( $animations[ $index ] ) ? $animations[ $index ] : 'animate__fadeIn';
                            ?>
                            <div class="col">
                                <?php if ( $is_first ) : ?>
                                <div class="digital-process-step animate-box animated animate__animated" data-animate="<?php echo esc_attr( $anim ); ?>">
                                <?php else : ?>
                                <div class="d-flex flex-md-row flex-column gspace-2 animate-box animated animate__animated" data-animate="<?php echo esc_attr( $anim ); ?>">
                                    <div class="step-spacer"></div>
                                    <div class="digital-process-step">
                                <?php endif; ?>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <i class="<?php echo esc_attr( $step['icon_class'] ); ?>"></i>
                                        </div>
                                        <span class="fs-1 fw-bold text-white opacity-25"><?php echo esc_html( $step['number'] ); ?></span>
                                    </div>
                                    <div class="d-flex flex-column gspace-2">
                                        <h5><?php echo esc_html( $step['title'] ); ?></h5>
                                        <p><?php echo esc_html( $step['description'] ); ?></p>
                                    </div>
                                <?php if ( $is_first ) : ?>
                                </div>
                                <?php else : ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="spacer"></div>
</div>
