<?php
/**
 * Case Studies Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="case-studies"';

// ACF Fields
$sub_heading_icon = get_field( 'cs_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'cs_sub_heading_text' ) ?: 'Case Studies';
$heading          = get_field( 'cs_heading' ) ?: 'Konkrety zamiast obietnic';
$description      = get_field( 'cs_description' ) ?: 'Rzeczywiste rezultaty naszych klientów. Zobacz, jak pomagamy firmom rosnąć.';
$cta_text         = get_field( 'cs_cta_text' ) ?: 'Umów konsultację';
$cta_link         = get_field( 'cs_cta_link' ) ?: '#kontakt';
$studies          = get_field( 'cs_studies' );

// Default studies
$default_studies = array(
    array(
        'icon_class'    => 'fa-solid fa-shirt fa-2x',
        'badge'         => 'E-commerce Fashion',
        'color_variant' => 'cs-fashion',
        'problem'       => 'Kampanie płatne były mało rentowne, odrzucenia wysokie, a karty produktowe nie domykały sprzedaży przy większym ruchu.',
        'solutions'     => array(
            array( 'text' => 'Optymalizacja Meta i Google Ads' ),
            array( 'text' => 'Uproszczenie kart produktowych' ),
            array( 'text' => 'Rekomendacje produktowe AI' ),
            array( 'text' => 'Automatyzacje e-mail marketingu' ),
        ),
        'metrics'       => array(
            array( 'label' => 'ROAS', 'value' => '4–12' ),
            array( 'label' => 'Konwersja', 'value' => '+38%' ),
            array( 'label' => 'Przychód', 'value' => '+62%' ),
        ),
    ),
    array(
        'icon_class'    => 'fa-solid fa-house fa-2x',
        'badge'         => 'Home & Garden',
        'color_variant' => 'cs-garden',
        'problem'       => 'Sprzedaż była niestabilna przez sezonowość, a ruch organiczny nie dostarczał stałej liczby zamówień w miesiącu.',
        'solutions'     => array(
            array( 'text' => 'Strategia SEO pod kategorie' ),
            array( 'text' => 'Content i artykuły eksperckie' ),
            array( 'text' => 'Remarketing i retargeting' ),
            array( 'text' => 'Usprawnienie checkoutu' ),
        ),
        'metrics'       => array(
            array( 'label' => 'Ruch organiczny', 'value' => '+145%' ),
            array( 'label' => 'Transakcje', 'value' => '+89%' ),
            array( 'label' => 'Wartość koszyka', 'value' => '+34%' ),
        ),
    ),
    array(
        'icon_class'    => 'fa-solid fa-display fa-2x',
        'badge'         => 'Electronics & Tech',
        'color_variant' => 'cs-tech',
        'problem'       => 'Konkurencja cenowa i niska marża utrudniały skalowanie, a oferta nie wyróżniała się wystarczająco na tle rynku.',
        'solutions'     => array(
            array( 'text' => 'Performance marketing z AI' ),
            array( 'text' => 'Personalizacja doświadczenia' ),
            array( 'text' => 'Automatyzacje cross/up-sell' ),
            array( 'text' => 'Optymalizacja lejka zakupu' ),
        ),
        'metrics'       => array(
            array( 'label' => 'ROAS', 'value' => '6–15' ),
            array( 'label' => 'Konwersja', 'value' => '+52%' ),
            array( 'label' => 'AOV', 'value' => '+41%' ),
        ),
    ),
);
$studies_data = $studies ?: $default_studies;
?>

<div class="section p-0"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="case-studies-layout">
            <div class="card card-case-studies">
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                    <div class="col">
                        <div class="d-flex flex-column gspace-2 animate-box animated animate__animated" data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                                <span><?php echo esc_html( $sub_heading_text ); ?></span>
                            </div>
                            <h2 class="title-heading"><?php echo esc_html( $heading ); ?></h2>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column h-100 justify-content-end gspace-2 animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            <p><?php echo esc_html( $description ); ?></p>
                            <div class="link-wrapper">
                                <a href="<?php echo esc_url( $cta_link ); ?>"><?php echo esc_html( $cta_text ); ?></a>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-xl-3 row-cols-1 grid-spacer-2">
                    <?php foreach ( $studies_data as $study ) :
                        $variant    = $study['color_variant'] ?? 'cs-fashion';
                        $solutions  = $study['solutions'] ?? array();
                        $metrics    = $study['metrics'] ?? array();
                    ?>
                    <div class="col">
                        <div class="card card-cs <?php echo esc_attr( $variant ); ?> animate-box animated animate__animated" data-animate="animate__fadeInUp">
                            <div class="cs-header">
                                <i class="<?php echo esc_attr( $study['icon_class'] ); ?>"></i>
                            </div>
                            <div class="cs-body">
                                <span class="cs-badge"><?php echo esc_html( $study['badge'] ); ?></span>
                                <div class="cs-section">
                                    <h5>Problem</h5>
                                    <p><?php echo esc_html( $study['problem'] ); ?></p>
                                </div>
                                <div class="cs-section">
                                    <h5>Co wdrożyliśmy</h5>
                                    <ul class="cs-checklist">
                                        <?php foreach ( $solutions as $solution ) : ?>
                                        <li><?php echo esc_html( $solution['text'] ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="cs-section cs-efekt">
                                    <h5>Efekt</h5>
                                    <?php foreach ( $metrics as $metric ) : ?>
                                    <div class="cs-metric">
                                        <span><?php echo esc_html( $metric['label'] ); ?></span>
                                        <span class="cs-value"><?php echo esc_html( $metric['value'] ); ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
