<?php
/**
 * Target Audience Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="dla-kogo"';

// ACF Fields
$sub_heading_icon = get_field( 'ta_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'ta_sub_heading_text' ) ?: 'Dla kogo?';
$heading          = get_field( 'ta_heading' ) ?: 'Wspieramy ambitne firmy';
$footer_note      = get_field( 'ta_footer_note' ) ?: 'Nie dla projektów testowych.';
$cards            = get_field( 'ta_cards' );

// Default cards
$default_cards = array(
    array(
        'title'          => 'Sklepy, które już sprzedają',
        'description'    => 'Masz działający sklep i chcesz zwiększyć przychody oraz skalować biznes.',
        'icon_class'     => 'fa-solid fa-store fa-3x text-white opacity-50',
        'is_highlighted' => false,
    ),
    array(
        'title'          => 'Marki chcące rosnąć',
        'description'    => 'Widzisz potencjał wzrostu i szukasz partnera do realizacji ambitnych celów.',
        'icon_class'     => 'fa-solid fa-rocket fa-3x text-white',
        'is_highlighted' => true,
    ),
    array(
        'title'          => 'Firmy nastawione na skalowanie',
        'description'    => 'Chcesz budować stabilny, przewidywalny wzrost przychodów.',
        'icon_class'     => 'fa-solid fa-chart-line fa-3x text-white opacity-50',
        'is_highlighted' => false,
    ),
);
$cards_data = $cards ?: $default_cards;
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="d-flex flex-column justify-content-center text-center gspace-5">
            <div class="d-flex flex-column gspace-2 animate-box animated animate__animated" data-animate="animate__fadeInUp">
                <div class="sub-heading align-self-center">
                    <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                    <span><?php echo esc_html( $sub_heading_text ); ?></span>
                </div>
                <h2 class="title-heading heading-container heading-container-short"><?php echo esc_html( $heading ); ?></h2>
            </div>
            <div class="row row-cols-xl-3 row-cols-1 grid-spacer-2">
                <?php foreach ( $cards_data as $card ) :
                    $highlighted = ! empty( $card['is_highlighted'] );
                    $card_class  = $highlighted ? 'card card-pricing pricing-highlight' : 'card card-pricing';
                    $anim_class  = $highlighted ? 'animate-box animated slow animate__animated' : 'animate-box animated animate__animated';
                ?>
                <div class="col">
                    <div class="<?php echo esc_attr( $card_class ); ?> <?php echo esc_attr( $anim_class ); ?>" data-animate="animate__fadeInUp">
                        <?php if ( $highlighted ) : ?><div class="spacer"></div><?php endif; ?>
                        <h4><?php echo esc_html( $card['title'] ); ?></h4>
                        <p><?php echo esc_html( $card['description'] ); ?></p>
                        <div class="d-flex flex-row gspace-1 align-items-center <?php echo $highlighted ? '' : 'h-100 '; ?>justify-content-center">
                            <i class="<?php echo esc_attr( $card['icon_class'] ); ?>"></i>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="service-link-footer">
                <p class="text-white opacity-75"><?php echo esc_html( $footer_note ); ?></p>
            </div>
        </div>
    </div>
</div>
