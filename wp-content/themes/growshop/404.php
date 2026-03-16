<?php get_header(); ?>

<main>
    <div class="section-404">
        <div class="banner-layout-404">
            <div class="layout-404">
                <span class="text-404 title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">404</span>
                <h3>Ups! Nie znaleziono strony</h3>
                <p>Nie mozemy znalezc strony, ktorej szukasz. Byc moze zostala usunieta, zmienila adres lub nigdy nie istniala.</p>
                <div>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-accent">
                        <div class="btn-title">
                            <span>Wroc na strone glowna</span>
                        </div>
                        <div class="icon-circle">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
