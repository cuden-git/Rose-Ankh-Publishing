<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo('name') ?> - <?php the_title(); ?></title>
    <base href="<?php echo site_url(); ?>/">
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
    <header id="site-header" class="header row">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-6 col-xl-2 logo-wrap">
                    <a href="<?php echo site_url() ?>" class="site-logo-link" class="Home">
                        <?php if(get_field('site_logo', 'option')) { ?>
                        <img src="<?php echo get_field('site_logo', 'option')['url'] ?>" alt="Rose Ankh Publishing">
                        <?php } ?>
                    </a>
                </div>
                <div class="btn-mobile-nav-wrap col-6 col-xl-10">
                    <span class="btn-mobile-nav">
                        <img src="<?php echo get_template_directory_uri()  ?>/assets/images/btn-menu.svg" alt="Mobile menu button">
                    </span>
                </div>

                <!-- Logo [END] -->
                    <?php get_template_part('template-parts/content', 'main-nav'); ?>
                </div>
                <!-- Mobile Collapse Area [END] -->
            </div>
        </div>
    </header>
    <!-- hero -->
    <?php get_template_part('template-parts/content', 'hero'); ?>
    <!-- #col-main -->
    <main id="col-main">
