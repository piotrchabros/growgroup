<?php get_header(); ?>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php
        $recent_posts = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post__not_in'   => array( get_the_ID() ),
        ) );

        $cta_title = __( 'Potrzebujesz wsparcia w skalowaniu biznesu?', 'growshop' );
        $cta_text  = __( 'Zobacz, jak laczymy strategię, performance i automatyzacje, zeby dowozic realny wzrost.', 'growshop' );
        $cta_url   = home_url( '/#kontakt' );
        $cta_label = __( 'Skontaktuj sie', 'growshop' );

        if ( function_exists( 'get_field' ) ) {
            $cta_title = get_field( 'footer_cta_heading', 'option' ) ?: $cta_title;
            $cta_text  = get_field( 'footer_cta_text', 'option' ) ?: $cta_text;
            $cta_url   = get_field( 'footer_cta_link_url', 'option' ) ?: $cta_url;
            $cta_label = get_field( 'footer_cta_link_text', 'option' ) ?: $cta_label;
        }
        ?>

        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            <?php the_title(); ?>
                        </h2>
                        <nav class="breadcrumb">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <a href="<?php echo esc_url( growshop_get_blog_url() ); ?>" class="gspace-2"><?php esc_html_e( 'Blog', 'growshop' ); ?></a>
                            <span class="separator-link">/</span>
                            <p class="current-page"><?php the_title(); ?></p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="hero-container">
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                    <div class="col col-xl-4 order-2 order-xl-1">
                        <div class="d-flex flex-column flex-md-row flex-xl-column gspace-5">
                            <?php if ( $recent_posts->have_posts() ) : ?>
                                <div class="card recent-post">
                                    <h4><?php esc_html_e( 'Najnowsze wpisy', 'growshop' ); ?></h4>
                                    <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                                        <?php $recent_thumb = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ); ?>
                                        <div class="d-flex flex-row w-100 gspace-1">
                                            <div class="image-container">
                                                <?php if ( $recent_thumb ) : ?>
                                                    <img src="<?php echo esc_url( $recent_thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                                                <?php endif; ?>
                                            </div>
                                            <div class="d-grid">
                                                <div class="d-flex flex-row gspace-1 align-items-center">
                                                    <i class="fa-solid fa-calendar accent-color"></i>
                                                    <span class="meta-data-post"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></span>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="blog-link-post"><?php the_title(); ?></a>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            <?php endif; ?>

                            <div class="cta-service-banner">
                                <div class="spacer"></div>
                                <h3 class="title-heading"><?php echo esc_html( $cta_title ); ?></h3>
                                <p><?php echo esc_html( $cta_text ); ?></p>
                                <div class="link-wrapper">
                                    <a href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?></a>
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-xl-8 order-1 order-xl-2">
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'd-flex flex-column gspace-2' ); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-image">
                                    <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
                                </div>
                            <?php endif; ?>

                            <h3><?php the_title(); ?></h3>
                            <div class="underline-muted-full"></div>

                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <div class="d-flex flex-row align-items-center gspace-2">
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-calendar accent-color"></i>
                                        <span class="meta-data-post"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></span>
                                    </div>
                                    <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) :
                                        ?>
                                        <div class="d-flex flex-row gspace-1 align-items-center">
                                            <i class="fa-solid fa-folder accent-color"></i>
                                            <span class="meta-data-post"><?php echo esc_html( $categories[0]->name ); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex flex-row gspace-1 align-items-center">
                                    <i class="fa-solid fa-user accent-color"></i>
                                    <span class="meta-data"><?php echo esc_html( get_the_author() ); ?></span>
                                </div>
                            </div>

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>

                            <div class="d-flex justify-content-between pt-3">
                                <div><?php previous_post_link( '%link', __( '&larr; Poprzedni wpis', 'growshop' ) ); ?></div>
                                <div><?php next_post_link( '%link', __( 'Nastepny wpis &rarr;', 'growshop' ) ); ?></div>
                            </div>

                            <?php
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                            ?>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
