<?php
/**
 * Blog Preview Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : ' id="blog"';

// ACF Fields
$theme_uri        = get_template_directory_uri();
$sub_heading_icon = get_field( 'bp_sub_heading_icon' ) ?: 'fa-regular fa-circle-dot';
$sub_heading_text = get_field( 'bp_sub_heading_text' ) ?: 'Insights & Trends';
$heading          = get_field( 'bp_heading' ) ?: 'Blog – strategie i praktyki biznesowe';
$description      = get_field( 'bp_description' ) ?: 'Artykuły o skalowaniu sprzedaży, reklamie i optymalizacji konwersji w biznesie.';
$blog_link_text   = get_field( 'bp_blog_link_text' ) ?: 'Wszystkie artykuły';
$blog_link_url    = get_field( 'bp_blog_link_url' ) ?: growshop_get_blog_url();
$posts_count      = get_field( 'bp_posts_count' ) ?: 3;

// Query posts
$blog_query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => intval( $posts_count ),
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

// Default blog data (fallback when no posts exist)
$default_posts = array(
    array(
        'title'    => 'Jak zwiększyć ROAS kampanii Meta bez wzrostu budżetu',
        'date'     => '14 marca 2026',
        'category' => 'E-commerce',
        'excerpt'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
        'image'    => $theme_uri . '/assets/images/blog-1.png',
        'url'      => '#',
    ),
    array(
        'title'    => 'Audyt treści i landing page pod konwersję',
        'date'     => '10 marca 2026',
        'category' => 'Reklama',
        'excerpt'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
        'image'    => $theme_uri . '/assets/images/blog-2.png',
        'url'      => '#',
    ),
    array(
        'title'    => 'Długość sesji i ścieżki zakupowe – co mierzyć w GA4',
        'date'     => '5 marca 2026',
        'category' => 'Strategia',
        'excerpt'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
        'image'    => $theme_uri . '/assets/images/blog-3.png',
        'url'      => '#',
    ),
);
?>

<div class="section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="d-flex flex-column gspace-5">
            <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5 m-0">
                <div class="col col-xl-8 ps-0 pe-0">
                    <div class="d-flex flex-column gspace-2 animate-box animated fast animate__animated" data-animate="animate__fadeInLeft">
                        <div class="sub-heading">
                            <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                            <span><?php echo esc_html( $sub_heading_text ); ?></span>
                        </div>
                        <h2 class="title-heading"><?php echo esc_html( $heading ); ?></h2>
                    </div>
                </div>
                <div class="col col-xl-4 ps-0 pe-0">
                    <div class="d-flex flex-column gspace-2 justify-content-end h-100 animate-box animated animate__animated" data-animate="animate__fadeInRight">
                        <p><?php echo esc_html( $description ); ?></p>
                        <div class="link-wrapper">
                            <a href="<?php echo esc_url( $blog_link_url ); ?>"><?php echo esc_html( $blog_link_text ); ?></a>
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-md-3 row-cols-1 grid-spacer-3">
                <?php if ( $blog_query->have_posts() ) : ?>
                    <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
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
                                <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more">Czytaj więcej</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <?php foreach ( $default_posts as $post_item ) : ?>
                    <div class="col">
                        <div class="card card-blog animate-box animated animate__animated" data-animate="animate__fadeInUp">
                            <div class="blog-image">
                                <img src="<?php echo esc_url( $post_item['image'] ); ?>" alt="Blog">
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row gspace-2">
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-calendar accent-color"></i>
                                        <span class="meta-data"><?php echo esc_html( $post_item['date'] ); ?></span>
                                    </div>
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-folder accent-color"></i>
                                        <span class="meta-data"><?php echo esc_html( $post_item['category'] ); ?></span>
                                    </div>
                                </div>
                                <a href="<?php echo esc_url( $post_item['url'] ); ?>" class="blog-link"><?php echo esc_html( $post_item['title'] ); ?></a>
                                <p><?php echo esc_html( $post_item['excerpt'] ); ?></p>
                                <a href="<?php echo esc_url( $post_item['url'] ); ?>" class="read-more">Czytaj więcej</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
