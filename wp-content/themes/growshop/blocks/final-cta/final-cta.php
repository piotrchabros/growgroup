<?php
/**
 * Final CTA Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// ACF Fields
$sub_heading_icon = get_field( 'cta_sub_heading_icon' ) ?: 'fa-solid fa-rocket';
$sub_heading_text = get_field( 'cta_sub_heading_text' ) ?: 'Zacznij teraz';
$heading          = get_field( 'cta_heading' ) ?: 'Gotowy na wzrost sprzedaży?';
$description      = get_field( 'cta_description' ) ?: 'Dołącz do sklepów, które już zwiększyły przychody dzięki AI. Pierwsza konsultacja jest bezpłatna.';
$cta_text         = get_field( 'cta_button_text' ) ?: 'Umów konsultację';
$cta_link         = get_field( 'cta_button_link' ) ?: '#kontakt';
$benefits         = get_field( 'cta_benefits' );

// Default benefits
$default_benefits = array(
    array( 'benefit_text' => 'Bezpłatna konsultacja' ),
    array( 'benefit_text' => 'Audyt w 24h' ),
    array( 'benefit_text' => 'Bez zobowiązań' ),
);
$benefits_data = $benefits ?: $default_benefits;
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="newsletter-wrapper">
            <div class="newsletter-layout">
                <div class="spacer"></div>
                <div class="d-flex flex-column gspace-5 position-relative z-2">
                    <div class="d-flex flex-column gspace-2 animate-box animated animate__animated" data-animate="animate__fadeInUp">
                        <div class="sub-heading justify-content-center">
                            <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                            <span><?php echo esc_html( $sub_heading_text ); ?></span>
                        </div>
                        <h3 class="title-heading"><?php echo esc_html( $heading ); ?></h3>
                        <p><?php echo esc_html( $description ); ?></p>
                    </div>
                    <div class="d-flex flex-column flex-md-row gspace-3 justify-content-center animate-box animated animate__animated" data-animate="animate__fadeInUp">
                        <?php foreach ( $benefits_data as $benefit ) : ?>
                        <div class="d-flex align-items-center gspace-1">
                            <i class="fa-solid fa-circle-check accent-color"></i>
                            <span><?php echo esc_html( $benefit['benefit_text'] ); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="animate-box animated animate__animated" data-animate="animate__fadeInUp">
                        <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn-accent">
                            <span class="btn-title">
                                <span><?php echo esc_html( $cta_text ); ?></span>
                            </span>
                            <span class="icon-circle">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
