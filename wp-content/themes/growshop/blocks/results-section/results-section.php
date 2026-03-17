<?php
/**
 * Results Section Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="efekty"';

// ACF Fields
$theme_uri = get_template_directory_uri();

$image              = get_field( 'rs_image' );
$overlay_title      = get_field( 'rs_overlay_title' ) ?: 'Skalujemy Twój biznes';
$overlay_desc       = get_field( 'rs_overlay_description' ) ?: 'Realne wyniki, które przekładają się na zysk.';
$overlay_link_text  = get_field( 'rs_overlay_link_text' ) ?: 'Umów konsultację';
$overlay_link_url   = get_field( 'rs_overlay_link_url' ) ?: '#kontakt';
$sub_heading_icon   = get_field( 'rs_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text   = get_field( 'rs_sub_heading_text' ) ?: 'Results';
$heading            = get_field( 'rs_heading' ) ?: 'Efekty';
$description        = get_field( 'rs_description' ) ?: 'Nie wdrażamy pojedynczych rozwiązań. Budujemy środowisko, które pracuje na wynik.';
$checklist          = get_field( 'rs_checklist' );

// Default image
$image_url = $image ? $image['url'] : $theme_uri . '/assets/images/results-section.png';
$image_alt = $image ? ( $image['alt'] ?: 'Results Image' ) : 'Results Image';

// Default checklist
$default_checklist = array(
    array( 'title' => 'Więcej ruchu, który konwertuje', 'description' => 'Nie chodzi o ilość odwiedzin, ale o jakość użytkowników gotowych do zakupu.' ),
    array( 'title' => 'Wyższa konwersja', 'description' => 'Optymalizacja każdego elementu ścieżki zakupowej przekłada się na więcej transakcji.' ),
    array( 'title' => 'Wyższa wartość koszyka', 'description' => 'Inteligentne rekomendacje i strategia sprzedaży zwiększają średnią wartość zamówienia.' ),
    array( 'title' => 'Więcej transakcji', 'description' => 'Suma wszystkich działań przekłada się na wymierny wzrost liczby zamówień.' ),
    array( 'title' => 'Stabilny wzrost przychodu', 'description' => 'Długoterminowa strategia buduje przewidywalny, rosnący biznes.' ),
);
$checklist_data = $checklist ?: $default_checklist;
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="d-flex flex-column flex-xl-row gspace-5">
            <div class="expertise-img-layout">
                <div class="image-container expertise-img">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="img-fluid animate-box animated animate__animated" data-animate="animate__fadeIn">
                    <div class="expertise-layout">
                        <div class="d-flex flex-column">
                            <div class="card-expertise-wrapper">
                                <div class="card card-expertise animate-box animated animate__animated" data-animate="animate__fadeIn">
                                    <h4><?php echo esc_html( $overlay_title ); ?></h4>
                                    <p><?php echo esc_html( $overlay_desc ); ?></p>
                                    <div class="d-flex align-items-center flex-row gspace-2 expertise-link">
                                        <a href="<?php echo esc_url( $overlay_link_url ); ?>"><?php echo esc_html( $overlay_link_text ); ?></a>
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="expertise-spacer"></div>
                        </div>
                        <div class="expertise-spacer"></div>
                    </div>
                </div>
            </div>
            <div class="expertise-title">
                <div class="sub-heading animate-box animated animate__animated" data-animate="animate__fadeIn">
                    <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                    <span><?php echo esc_html( $sub_heading_text ); ?></span>
                </div>
                <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeIn"><?php echo esc_html( $heading ); ?></h2>
                <p><?php echo esc_html( $description ); ?></p>
                <div class="d-flex flex-column flex-md-row gspace-2">
                    <div class="expertise-list w-100">
                        <ul class="check-list">
                            <?php foreach ( $checklist_data as $item ) : ?>
                            <li>
                                <strong><?php echo esc_html( $item['title'] ); ?></strong>
                                <span class="text-muted"><?php echo esc_html( $item['description'] ); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
