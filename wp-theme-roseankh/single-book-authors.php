<?php get_header();?>

<div class="container single-author">
    
        <article class="col-12">
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <header class="row">
                <div class="col-xs-12 col-sm-3">
                <?php
                    if(has_post_thumbnail()) {
                ?>
                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'fullsize') ?>" class="author-img">
                <?php       
                    }
                ?>
                </div>
                <div class="col-xs-12 col-sm-9 author-name">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
            </header>
            <div class="col-xs-12 author-content">
                <?php the_content() ?>
            </div>
            
        <?php endwhile; endif; ?>
        </article>
    
</div>

<?php get_footer();?>