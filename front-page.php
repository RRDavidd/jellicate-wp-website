<?php get_header();
$home_id = 10;

$featured_nails = get_field('featured_nails', $home_id);
$featured_nails_block_title = get_field('featured_nails_block_title', $home_id);

$featured_bundles = get_field('featured_bundles', $home_id);
$featured_bundles_block_title = get_field('featured_bundles_block_title', $home_id);

$swiper_image_1 = get_field('swiper_image_1', $home_id);
$swiper_image_2 = get_field('swiper_image_2', $home_id);

$home_image = get_field('home_image', $home_id);

$home_video = get_field('home_video', $home_id);
?>
<main>
    <div class="swiper mySwiper mb-3">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="<?php echo $swiper_image_1['url']; ?>" alt="<?php echo $swiper_image_1['alt']; ?>">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo $swiper_image_2['url']; ?>" alt="<?php echo $swiper_image_2['alt']; ?>">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="hero-banner row">
        <?php if($home_image) : ?>
            <?php foreach($home_image as $post) : setup_postdata( $post );
                $product = wc_get_product($post->ID);
                $attachment_ids = $product->get_gallery_image_ids();
                $first_gallery_img_url = wp_get_attachment_url($attachment_ids[0]);
            ?>
                <div class="col-md-6 col-12">
                    <a href="<?php the_permalink(); ?>">
                        <div class="hero-post-image">
                            <figure class="main-image">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </figure>
                            <?php if($first_gallery_img_url) : ?>
                                <figure class="gallery-image">
                                    <img src="<?php echo $first_gallery_img_url; ?>" alt="<?php the_title(); ?>">
                                </figure>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="col-12">
            <video loop muted autoplay>
                <source src="<?php echo $home_video; ?>" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="post-container container row gap-3 justify-content-center">
        <h2 class="mb-0"><?php echo $featured_nails_block_title; ?></h2>
        <?php if($featured_nails) :?>
            <?php foreach($featured_nails as $post) : setup_postdata($post);
                $product = wc_get_product($post->ID);
                $attachment_ids = $product->get_gallery_image_ids();
                $first_gallery_img_url = wp_get_attachment_url($attachment_ids[0]);
            ?>
                <div class="post-item col-md-3 col-12">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-image">
                            <figure class="main-image">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </figure>
                            <?php if($first_gallery_img_url) : ?>
                                <figure class="gallery-image">
                                    <img src="<?php echo $first_gallery_img_url; ?>" alt="<?php the_title(); ?>">
                                </figure>
                            <?php endif; ?>
                        </div>
                    </a>
                    <div class="post-content">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php

                        echo "<a class='button' href='". $product->add_to_cart_url()."'>Add to Cart</a>";
                        ?>
                    </div>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
    <div class="post-container container row gap-3 justify-content-center">
        <h2 class="mb-0"><?php echo $featured_bundles_block_title; ?></h2>
        <?php if($featured_bundles) :?>
            <?php foreach($featured_bundles as $post) : setup_postdata($post);
                $product = wc_get_product($post->ID);
                $attachment_ids = $product->get_gallery_image_ids();
                $first_gallery_img_url = wp_get_attachment_url($attachment_ids[0]);
            ?>
                <div class="post-item col-md-3 col-12">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-image ">
                            <figure class="main-image">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </figure>
                            <?php if($first_gallery_img_url) : ?>
                                <figure class="gallery-image">
                                    <img src="<?php echo $first_gallery_img_url; ?>" alt="<?php the_title(); ?>">
                                </figure>
                            <?php endif; ?>
                        </div>
                    </a>
                    <div class="post-content">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php
                        echo "<a class='button' href='". $product->add_to_cart_url()."'>Add to Cart</a>";
                        ?>
                    </div>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
