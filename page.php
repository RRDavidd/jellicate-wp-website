<?php get_header(); ?>

<?php if(is_shop()):
            woocommerce_content();

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            while($query->have_posts()){
                $query->the_post(); ?>
                <div class="post-item">
                    <a href="<?php the_permalink(); ?>">
                        <figure class="post-image"><?php the_post_thumbnail(); ?></figure>
                    </a>
                    <div class="post-content">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_content(); ?>
                        <button>Add to Cart</button>
                    </div>
                </div>
            <?php }
        endif; ?>



<?php get_footer(); ?>