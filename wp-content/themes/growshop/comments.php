<?php
/**
 * Comments template.
 *
 * @package GrowShop
 */

if ( post_password_required() ) {
    return;
}
?>

<section id="comments" class="comments-area pt-4">
    <?php if ( have_comments() ) : ?>
        <h4 class="comments-title mb-3">
            <?php
            printf(
                esc_html(
                    _n( '%s komentarz', '%s komentarze', get_comments_number(), 'growshop' )
                ),
                esc_html( number_format_i18n( get_comments_number() ) )
            );
            ?>
        </h4>

        <ol class="comment-list list-unstyled d-flex flex-column gspace-2">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 48,
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Komentarze sa zamkniete.', 'growshop' ); ?></p>
    <?php endif; ?>

    <?php
    comment_form( array(
        'class_form'           => 'comment-form d-flex flex-column gspace-2',
        'title_reply'          => __( 'Dodaj komentarz', 'growshop' ),
        'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title mt-4 mb-2">',
        'title_reply_after'    => '</h4>',
        'label_submit'         => __( 'Opublikuj komentarz', 'growshop' ),
        'class_submit'         => 'submit btn-accent comment-submit',
        'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Twój adres e-mail nie zostanie opublikowany.', 'growshop' ) . '</p>',
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Komentarz', 'growshop' ) . '</label><textarea id="comment" name="comment" class="form-control" cols="45" rows="6" maxlength="65525" required></textarea></p>',
        'fields'               => array(
            'author' => '<p class="comment-form-author"><label for="author">' . esc_html__( 'Imie', 'growshop' ) . '</label><input id="author" name="author" type="text" class="form-control" required></p>',
            'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'E-mail', 'growshop' ) . '</label><input id="email" name="email" type="email" class="form-control" required></p>',
            'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Strona WWW (opcjonalnie)', 'growshop' ) . '</label><input id="url" name="url" type="url" class="form-control"></p>',
            'cookies'=> '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">' . esc_html__( 'Zapamietaj moje dane (imie, e-mail i strone WWW) w tej przegladarce na przyszlosc.', 'growshop' ) . '</label></p>',
        ),
    ) );
    ?>
</section>
