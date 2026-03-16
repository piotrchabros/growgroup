<?php
/**
 * Contact Form Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="kontakt"';

// ACF Fields
$sub_heading_icon = get_field( 'cf_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'cf_sub_heading_text' ) ?: 'Kontakt';
$heading          = get_field( 'cf_heading' ) ?: 'Umów bezpłatną konsultację';
$description      = get_field( 'cf_description' ) ?: 'Zobacz, jak możemy zwiększyć sprzedaż Twojego sklepu. Bezpłatna konsultacja + wstępny audyt marketingowy.';
$phone_label      = get_field( 'cf_phone_label' ) ?: 'Numer telefonu';
$phone_number     = get_field( 'cf_phone_number' ) ?: '+48 789 354 695';
$email_label      = get_field( 'cf_email_label' ) ?: 'Email';
$email_address    = get_field( 'cf_email_address' ) ?: 'kontakt@growgroup.now';
$iframe_url       = get_field( 'cf_iframe_url' ) ?: '';
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="row row-cols-xl-2 row-cols-1 g-5">
            <div class="col col-xl-5">
                <div class="contact-title-wrapper">
                    <div class="card contact-title">
                        <div class="sub-heading">
                            <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                            <span><?php echo esc_html( $sub_heading_text ); ?></span>
                        </div>
                        <h2 class="title-heading"><?php echo esc_html( $heading ); ?></h2>
                        <p><?php echo esc_html( $description ); ?></p>
                        <div class="d-flex flex-column flex-md-row align-items-center text-md-start text-center gspace-2">
                            <div>
                                <div class="icon-wrapper">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-phone-volume accent-color"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <span><?php echo esc_html( $phone_label ); ?></span>
                                <h5><?php echo esc_html( $phone_number ); ?></h5>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row align-items-center text-md-start text-center gspace-2">
                            <div>
                                <div class="icon-wrapper">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-envelope accent-color"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <span><?php echo esc_html( $email_label ); ?></span>
                                <h5><?php echo esc_html( $email_address ); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-xl-7">
                <?php if ( $iframe_url ) : ?>
                <div class="form-layout-wrapper">
                    <div class="card form-layout">
                        <iframe src="<?php echo esc_url( $iframe_url ); ?>" width="100%" height="700" frameborder="0" style="border: none; border-radius: 16px;"></iframe>
                    </div>
                </div>
                <?php else : ?>
                <div class="form-layout-wrapper">
                    <div class="card form-layout d-flex align-items-center justify-content-center" style="min-height: 400px;">
                        <p class="text-white opacity-50">Wklej URL formularza w ustawieniach bloku</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
