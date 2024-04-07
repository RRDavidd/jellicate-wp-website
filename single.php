<?php get_header();

?>

<main class="single">
    <figure>
        <?php
        if ( is_product() ) {
            echo "hello";
        } else {
            the_post_thumbnail();
            echo "world";
        }
        ?>
    </figure>
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
</main>

<?php get_footer(); ?>
