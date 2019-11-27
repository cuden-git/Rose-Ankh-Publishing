<?php

if( have_rows('social_media','option') ):
?>
<ul class="social-media">
<?php

    while ( have_rows('social_media','option') ) : the_row();
?>      <li>
            <a href="<?php echo get_sub_field('url')['url'] ?>" title="<?php echo get_sub_field('url')['title'] ?>">
                <img src="<?php echo get_sub_field('icon')['url'] ?>" alt="<?php echo get_sub_field('icon')['alt'] ?>">
            </a>
        </li>
<?php
     endwhile;
?>

</ul>

<?php
endif;
?>
