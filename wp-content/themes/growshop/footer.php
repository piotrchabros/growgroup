<?php
$theme_uri = get_template_directory_uri();

// ACF Options
$logo          = get_field( 'site_logo', 'option' );
$logo_url      = $logo ? $logo['url'] : $theme_uri . '/assets/images/growshop-logo-light.png';
$logo_alt      = $logo ? ( $logo['alt'] ?: 'Grow Group' ) : 'Grow Group';
$tagline       = get_field( 'site_tagline', 'option' ) ?: 'AI Growth System dla biznesu';
$description   = get_field( 'site_description', 'option' ) ?: 'Skalujemy sprzedaż firm poprzez AI, reklamy, UX/UI, automatyzacje i SEO.';
$email         = get_field( 'contact_email', 'option' ) ?: 'kontakt@growgroup.now';
$phone         = get_field( 'contact_phone', 'option' ) ?: '+48 789 354 695';
$location      = get_field( 'contact_location', 'option' ) ?: 'Warszawa, Polska';
$cta_heading   = get_field( 'footer_cta_heading', 'option' ) ?: 'Bezpłatna konsultacja';
$cta_desc      = get_field( 'footer_cta_description', 'option' ) ?: 'Zobacz, jak możemy zwiększyć sprzedaż Twojej firmy. Bezpłatna konsultacja + wstępny audyt marketingowy.';
$cta_text      = get_field( 'footer_cta_text', 'option' ) ?: 'Umów konsultację';
$cta_link      = get_field( 'footer_cta_link', 'option' ) ?: '#kontakt';
$copyright     = get_field( 'footer_copyright', 'option' ) ?: '© ' . date( 'Y' ) . ' Grow Group';
$privacy_url   = get_field( 'footer_privacy_url', 'option' ) ?: '#';
$terms_url     = get_field( 'footer_terms_url', 'option' ) ?: '#';

// Social
$linkedin  = get_field( 'social_linkedin', 'option' );
$facebook  = get_field( 'social_facebook', 'option' );
$instagram = get_field( 'social_instagram', 'option' );
$tiktok    = get_field( 'social_tiktok', 'option' );
?>

<footer>
    <div class="section-footer">
        <div class="bg-footer-wrapper">
            <div class="bg-footer">
                <div class="hero-container position-relative z-2">
                    <div class="d-flex flex-column gspace-2">
                        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 grid-spacer-5">
                            <!-- Logo + opis -->
                            <div class="col col-xl-4">
                                <div class="footer-logo-container">
                                    <div class="logo-container-footer">
                                        <img src="<?php echo esc_url( $logo_url ); ?>" class="site-logo site-logo-wordmark img-fluid" alt="<?php echo esc_attr( $logo_alt ); ?>">
                                    </div>
                                    <h4><?php echo esc_html( $tagline ); ?></h4>
                                    <p><?php echo esc_html( $description ); ?></p>
                                    <?php if ( $linkedin || $facebook || $instagram || $tiktok ) : ?>
                                    <div class="d-flex flex-row gspace-2 mt-3">
                                        <?php if ( $linkedin ) : ?>
                                        <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin fa-lg text-white"></i></a>
                                        <?php endif; ?>
                                        <?php if ( $facebook ) : ?>
                                        <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook fa-lg text-white"></i></a>
                                        <?php endif; ?>
                                        <?php if ( $instagram ) : ?>
                                        <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram fa-lg text-white"></i></a>
                                        <?php endif; ?>
                                        <?php if ( $tiktok ) : ?>
                                        <a href="<?php echo esc_url( $tiktok ); ?>" target="_blank" rel="noopener" aria-label="TikTok"><i class="fa-brands fa-tiktok fa-lg text-white"></i></a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Nawigacja (wp_nav_menu) -->
                            <div class="col col-xl-2">
                                <div class="footer-quick-links">
                                    <h5>Nawigacja</h5>
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer',
                                        'container'      => false,
                                        'menu_class'     => 'footer-list',
                                        'fallback_cb'    => 'growshop_footer_fallback_menu',
                                        'depth'          => 1,
                                        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                                    ) );
                                    ?>
                                </div>
                            </div>
                            <!-- Kontakt -->
                            <div class="col col-xl-3">
                                <div class="footer-services-container">
                                    <h5>Kontakt</h5>
                                    <ul class="contact-list">
                                        <li><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
                                        <li><?php echo esc_html( $phone ); ?></li>
                                        <li><?php echo esc_html( $location ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- CTA -->
                            <div class="col col-xl-3">
                                <div class="footer-contact-container">
                                    <h5><?php echo esc_html( $cta_heading ); ?></h5>
                                    <p><?php echo esc_html( $cta_desc ); ?></p>
                                    <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn-accent">
                                        <div class="btn-title">
                                            <span><?php echo esc_html( $cta_text ); ?></span>
                                        </div>
                                        <div class="icon-circle">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-content-spacer"></div>
                    </div>
                    <div class="copyright-container">
                        <span class="copyright"><?php echo esc_html( $copyright ); ?></span>
                        <div class="d-flex flex-row gspace-2">
                            <a href="<?php echo esc_url( $privacy_url ); ?>" class="legal-link">Polityka prywatności</a>
                            <a href="<?php echo esc_url( $terms_url ); ?>" class="legal-link">Regulamin</a>
                        </div>
                    </div>
                    <div class="footer-spacer"></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
