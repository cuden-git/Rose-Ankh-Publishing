<?php get_header();?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-7">
                <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>

<?php get_footer();?>