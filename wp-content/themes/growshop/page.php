<?php get_header(); ?>

<main>
    <div class="section">
        <div class="hero-container">
            <div class="page-content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
