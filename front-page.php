<?php get_header();
?>
<main>
    <div class="swiper mySwiper mb-3">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/public/images/new-slider.png" alt="logo">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/public/images/hero-slider2.jpg" alt="logo">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
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
    <div class="post-container container row gap-3 justify-content-center">
        <h2 class="mb-0">New Items</h2>
        <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 3,
            );
            $query = new WP_Query($args);
            while($query->have_posts()){
                $query->the_post();
                $product_id = get_the_ID();
                $product = wc_get_product($product_id);
                ?>
                <div class="post-item col-md-3 col-12">
                    <a href="<?php the_permalink(); ?>">
                        <figure class="post-image"><?php the_post_thumbnail(); ?></figure>
                    </a>
                    <div class="post-content">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="post-description">
                        <?php
                            $content = get_the_content();
                            echo (strlen($content) > 50) ? substr($content, 0, 50) . '...' : $content;
                        ?>
                        </div>
                        <?php echo "<a class='button' href='".$product->add_to_cart_url()."'>Add to Cart</a>"; ?>
                    </div>
                </div>
        <?php } ?>
    </div>
</main>
<?php get_footer(); ?>
