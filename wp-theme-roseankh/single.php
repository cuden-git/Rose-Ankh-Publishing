<?php get_header();?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php
                            if(has_post_thumbnail()) {
                        ?>
                            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'fullsize') ?>" class="single-post-img">
                        <?php       
                            }
                        ?>
                        <?php the_content() ?>
                        
                <?php endwhile; endif; ?>
            </div>
        </div>
        <?php if(get_post_type() == 'books' && get_field('shop_link')) {
            $btn_label = (get_field('shop_link')['title'])? get_field('shop_link')['title'] : 'Buy' ;
            $btn_url = get_field('shop_link')['url'];
        ?>
            <a href="<?php echo $btn_url ?>" class="btn" title="<?php echo $btn_label ?>" target="_blank"><?php echo $btn_label ?></a>
        <?php } ?>
    </div>

<?php get_footer();?>