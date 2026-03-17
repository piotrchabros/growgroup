<?php
/**
 * Team Members Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="zespol"';

// ACF Fields
$theme_uri        = get_template_directory_uri();
$sub_heading_icon = get_field( 'tm_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'tm_sub_heading_text' ) ?: 'Zespół';
$heading          = get_field( 'tm_heading' ) ?: 'Poznajcie naszych liderów';
$description      = get_field( 'tm_description' ) ?: 'Prowadzący projekt to przedsiębiorcy i praktycy biznesu budujący systemy sprzedażowe.';
$members          = get_field( 'tm_members' );

// Default members
$default_members = array(
    array( 'name' => 'Jakub<br>Engel', 'role' => 'Founder / Growth Strategist', 'photo_url' => $theme_uri . '/assets/images/team-jakub.png', 'linkedin_url' => '#' ),
    array( 'name' => 'Piotr<br>Chabros', 'role' => 'Co-founder / Automation', 'photo_url' => $theme_uri . '/assets/images/team-piotr.png', 'linkedin_url' => '#' ),
    array( 'name' => 'Kazimierz<br>Cieślicki', 'role' => 'Founder / Growth Strategist', 'photo_url' => $theme_uri . '/assets/images/team-kazimierz.png', 'linkedin_url' => '#' ),
);
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="team-wrapper">
            <div class="card team-layout">
                <div class="d-flex flex-column align-items-center gspace-2 animate-box animated animate__animated" data-animate="animate__fadeIn">
                    <div class="sub-heading">
                        <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                        <span><?php echo esc_html( $sub_heading_text ); ?></span>
                    </div>
                    <h2 class="title-heading"><?php echo esc_html( $heading ); ?></h2>
                    <p class="text-center"><?php echo esc_html( $description ); ?></p>
                </div>
                <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 g-4">
                    <?php
                    if ( $members ) :
                        foreach ( $members as $member ) :
                            $photo_url   = is_array( $member['photo'] ) ? $member['photo']['url'] : '';
                            $photo_alt   = is_array( $member['photo'] ) ? ( $member['photo']['alt'] ?: $member['name'] ) : $member['name'];
                            $linkedin    = $member['linkedin_url'] ?: '#';
                    ?>
                    <div class="col">
                        <div class="d-flex flex-column">
                            <div class="image-team">
                                <img src="<?php echo esc_url( $photo_url ); ?>" alt="<?php echo esc_attr( strip_tags( $photo_alt ) ); ?>" class="img-fluid">
                                <div class="social-team-wrapper">
                                    <div class="social-team-spacer"></div>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="social-team-container">
                                            <a href="<?php echo esc_url( $linkedin ); ?>" class="social-item"><i class="fa-brands fa-linkedin"></i></a>
                                        </div>
                                        <div class="social-team-spacer"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-profile">
                                <h4><?php echo wp_kses_post( $member['name'] ); ?></h4>
                                <span class="title"><?php echo esc_html( $member['role'] ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    else :
                        foreach ( $default_members as $member ) :
                    ?>
                    <div class="col">
                        <div class="d-flex flex-column">
                            <div class="image-team">
                                <img src="<?php echo esc_url( $member['photo_url'] ); ?>" alt="<?php echo esc_attr( strip_tags( $member['name'] ) ); ?>" class="img-fluid">
                                <div class="social-team-wrapper">
                                    <div class="social-team-spacer"></div>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="social-team-container">
                                            <a href="<?php echo esc_url( $member['linkedin_url'] ); ?>" class="social-item"><i class="fa-brands fa-linkedin"></i></a>
                                        </div>
                                        <div class="social-team-spacer"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-profile">
                                <h4><?php echo wp_kses_post( $member['name'] ); ?></h4>
                                <span class="title"><?php echo esc_html( $member['role'] ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="spacer"></div>
            </div>
        </div>
    </div>
</div>
