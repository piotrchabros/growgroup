<?php
/**
 * Service Cards Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="jak-dzialamy"';

// ACF Fields
$sub_heading_icon = get_field( 'sc_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'sc_sub_heading_text' ) ?: 'Performance Package';
$heading          = get_field( 'sc_heading' ) ?: 'W czym możemy Ci pomóc?';
$footer_text      = get_field( 'sc_footer_text' ) ?: 'Zajmujemy się wszystkim, co bezpośrednio wpływa na wzrost Twojego sklepu.';
$footer_link_text = get_field( 'sc_footer_link_text' ) ?: 'Umów konsultację';
$footer_link_url  = get_field( 'sc_footer_link_url' ) ?: '#kontakt';
$services         = get_field( 'sc_services' );

// Default services
$default_services = array(
    array( 'icon_class' => 'fa-solid fa-brain fa-lg text-white', 'title' => 'AI optymalizujące zachowanie użytkowników', 'description' => 'Inteligentne systemy, które uczą się z każdej interakcji i maksymalizują konwersję.' ),
    array( 'icon_class' => 'fa-solid fa-chart-line fa-lg text-white', 'title' => 'Kampanie reklamowe nastawione na sprzedaż', 'description' => 'Performance marketing, który generuje rzeczywisty zwrot z inwestycji.' ),
    array( 'icon_class' => 'fa-solid fa-pen-ruler fa-lg text-white', 'title' => 'Optymalizacja UX/UI pod konwersję', 'description' => 'Projektowanie ścieżek zakupowych, które prowadzą do transakcji.' ),
    array( 'icon_class' => 'fa-solid fa-robot fa-lg text-white', 'title' => 'Automatyzacje sprzedażowe', 'description' => 'Systemy, które pracują 24/7 na zwiększanie przychodów Twojego sklepu.' ),
    array( 'icon_class' => 'fa-solid fa-magnifying-glass fa-lg text-white', 'title' => 'SEO i wzrost ruchu organicznego', 'description' => 'Długoterminowa strategia budowania stabilnego źródła klientów.' ),
    array( 'icon_class' => 'fa-solid fa-chart-pie fa-lg text-white', 'title' => 'Stała analiza i rozwój', 'description' => 'Ciągłe testowanie, optymalizacja i skalowanie skutecznych działań.' ),
);
$services_data = $services ?: $default_services;
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="d-flex flex-column justify-content-center text-center gspace-5">
            <div class="d-flex flex-column justify-content-center text-center gspace-2">
                <div class="sub-heading align-self-center animate-box animated animate__animated" data-animate="animate__fadeIn">
                    <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                    <span><?php echo esc_html( $sub_heading_text ); ?></span>
                </div>
                <h2 class="title-heading heading-container heading-container-medium animate-box animated animate__animated" data-animate="animate__fadeIn"><?php echo esc_html( $heading ); ?></h2>
            </div>
            <div class="card-service-wrapper">
                <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 grid-spacer-2">
                    <?php foreach ( $services_data as $service ) : ?>
                    <div class="col">
                        <div class="card card-service animate-box animated animate__animated" data-animate="animate__fadeIn">
                            <div class="d-flex flex-row justify-content-between gspace-2 gspace-md-2 align-items-center">
                                <div>
                                    <div class="service-icon-wrapper">
                                        <div class="service-icon">
                                            <i class="<?php echo esc_attr( $service['icon_class'] ); ?>"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-title">
                                    <h4><?php echo esc_html( $service['title'] ); ?></h4>
                                </div>
                            </div>
                            <p><?php echo esc_html( $service['description'] ); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="service-link-footer">
                <p><?php echo esc_html( $footer_text ); ?> <a href="<?php echo esc_url( $footer_link_url ); ?>"><?php echo esc_html( $footer_link_text ); ?></a></p>
            </div>
        </div>
    </div>
</div>
