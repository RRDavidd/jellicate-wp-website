<?php get_header();
?>
<main>
    <div class="hero-banner row">
        <figure class="col-md-6 col-12">
            <img src="<?php echo get_template_directory_uri(); ?>/public/images/hero-1.jpg"  alt="logo">
        </figure>
        <figure class="col-md-6 col-12">
            <img src="<?php echo get_template_directory_uri(); ?>/public/images/hero-2.jpg"  alt="logo">
        </figure>
        <div class="col-12">
            <video loop muted autoplay>
                <source src="<?php echo get_template_directory_uri(); ?>/public/videos/dream-cloud.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="post-container row">
        <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            while($query->have_posts()){
                $query->the_post();
                $product_id = get_the_ID();
                $product = wc_get_product($product_id);
                ?>
                <div class="post-item col-md-4 col-12 gap-3">
                    <a href="<?php the_permalink(); ?>">
                        <figure class="post-image"><?php the_post_thumbnail(); ?></figure>
                    </a>
                    <div class="post-content">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="post-description">
                            <?php the_content(); ?>
                        </div>
                        <?php echo "<a class='button' href='".$product->add_to_cart_url()."'>Add to Cart</a>"; ?>
                    </div>
                </div>
        <?php } ?>
    </div>
</main>
<?php get_footer(); ?>