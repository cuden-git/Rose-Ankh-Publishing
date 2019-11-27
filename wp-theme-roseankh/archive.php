<?php get_header();?>

    <div class="container archive-listing">
        <div class="row">
            <div class="col-12">
                <?php if (have_posts()) : 
                    global $query_string;
                    query_posts( $query_string . '&posts_per_page=10' ); 

                ?>
                <h2 class="page-title"><?php the_archive_title() ?></h2>
                <ul class="archive-results">
                <?php while(have_posts()) : the_post(); ?>
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
                <?php endif; ?>
            </div>
        </div>
        <div class="archive-pagination">
        <?php echo paginate_links(
            array(
                'type' => 'list',
                'prev_text' => 'prev',
                'next_text' => 'next'
                )
            );
        ?>
        </div>
    </div>

<?php get_footer();?>