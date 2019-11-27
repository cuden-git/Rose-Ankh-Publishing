<?php get_header();?>

    <div class="container archive-listing">
        <div class="row">
            <div class="col-xs-12">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile;endif; ?>
            </div>
        </div>
        <div class="">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array('posts_per_page' => get_option( 'posts_per_page' ), 'paged' => $paged);
        $news_posts = new WP_Query($args);

        if($news_posts->have_posts()) : ?>
            <ul class="archive-results">
        <?php while($news_posts->have_posts()) : 
            $news_posts->the_post();
        ?>

            <li class="list-item<?php if(has_post_thumbnail()) { echo ' has-thumbnail'; }?>">
                <a href="<?php the_permalink() ?>" class="row" title="<?php the_title() ?>">
                    <?php 
                        if (has_post_thumbnail()) {
                    ?>
                    <div class="col-12 col-sm-3">
                        <div class="archive-thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(),'medium') ?> )"></div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="archive-content col-12<?php if(has_post_thumbnail()) { echo ' col-sm-9'; } ?>">
                        <h3 class="archive-title"><?php the_title(); ?></h3>
                        <?php echo wp_trim_words(get_the_content(),55,' ...') ?>
                    </div>
                </a>
            </li>
        <?php endwhile; ?>
            </ul>
            <div class="archive-pagination">
            <?php

            $GLOBALS['wp_query']->max_num_pages = $news_posts->max_num_pages;
            
            echo paginate_links(
                array(
                    'type' => 'list',
                    'prev_text' => 'prev',
                    'next_text' => 'next'
                    )
                );
            ?>
            </div>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        </div>
    </div>

<?php get_footer();?>