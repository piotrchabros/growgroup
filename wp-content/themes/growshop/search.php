<?php get_header(); ?>

<?php $search_query = get_search_query(); ?>

<main>
    <div class="section-banner">
        <div class="banner-layout-wrapper">
            <div class="banner-layout">
                <div class="d-flex flex-column text-center align-items-center gspace-2">
                    <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                        <?php esc_html_e( 'Wyniki wyszukiwania', 'growshop' ); ?>
                    </h2>
                    <nav class="breadcrumb">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="gspace-2">Home</a>
                        <span class="separator-link">/</span>
                        <p class="current-page"><?php esc_html_e( 'Szukaj', 'growshop' ); ?></p>
                    </nav>
                </div>
                <div class="spacer"></div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column gspace-5">
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5 m-0">
                    <div class="col col-xl-8 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 animate-box animated fast animate__animated" data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span><?php esc_html_e( 'Wyszukiwanie', 'growshop' ); ?></span>
                            </div>
                            <h2 class="title-heading">
                                <?php
                                if ( $search_query ) {
                                    printf( esc_html__( 'Fraza: %s', 'growshop' ), esc_html( $search_query ) );
                                } else {
                                    esc_html_e( 'Wpisz fraze, aby wyszukac tresci', 'growshop' );
                                }
                                ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col col-xl-4 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 justify-content-end h-100 animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            <p><?php esc_html_e( 'Przeszukaj wpisy i strony, aby szybko znalezc interesujace Cie informacje.', 'growshop' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>

                <?php if ( have_posts() ) : ?>
                    <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php
                            $categories = get_the_category();
                            $cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
                            $thumb_url  = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
                            ?>
                            <div class="col">
                                <div class="card card-blog animate-box animated animate__animated" data-animate="animate__fadeInUp">
                                    <?php if ( $thumb_url ) : ?>
                                        <div class="blog-image">
                                            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <div class="d-flex flex-row gspace-2">
                                            <div class="d-flex flex-row gspace-1 align-items-center">
                                                <i class="fa-solid fa-calendar accent-color"></i>
                                                <span class="meta-data"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></span>
                                            </div>
                                            <?php if ( $cat_name ) : ?>
                                                <div class="d-flex flex-row gspace-1 align-items-center">
                                                    <i class="fa-solid fa-folder accent-color"></i>
                                                    <span class="meta-data"><?php echo esc_html( $cat_name ); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="blog-link"><?php the_title(); ?></a>
                                        <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Czytaj wiecej', 'growshop' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="d-flex justify-content-center pt-4">
                        <?php
                        the_posts_pagination( array(
                            'mid_size'  => 1,
                            'prev_text' => __( 'Poprzednia', 'growshop' ),
                            'next_text' => __( 'Nastepna', 'growshop' ),
                        ) );
                        ?>
                    </div>
                <?php else : ?>
                    <div class="d-flex flex-column gspace-2">
                        <p><?php esc_html_e( 'Brak wynikow dla podanej frazy. Sprobuj innego zapytania.', 'growshop' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
