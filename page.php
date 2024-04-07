<?php get_header(); ?>

<main>
    <?php if(is_shop()):
                woocommerce_content();
        endif; ?>

    <?php the_content(); ?>
</main>


<?php get_footer(); ?>
