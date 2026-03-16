<form role="search" method="get" class="search-form d-flex flex-row gspace-1" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="w-100">
        <span class="screen-reader-text"><?php esc_html_e( 'Szukaj:', 'growshop' ); ?></span>
        <input
            type="search"
            class="search-field form-control"
            placeholder="<?php echo esc_attr_x( 'Wpisz fraze...', 'placeholder', 'growshop' ); ?>"
            value="<?php echo esc_attr( get_search_query() ); ?>"
            name="s"
        >
    </label>
    <button type="submit" class="search-submit btn btn-accent">
        <div class="btn-title">
            <span><?php echo esc_html_x( 'Szukaj', 'submit button', 'growshop' ); ?></span>
        </div>
        <div class="icon-circle">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
    </button>
</form>
