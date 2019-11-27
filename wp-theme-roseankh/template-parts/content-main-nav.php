<nav id="main-menu" class="col-sm-12 col-xl-10">
<?php wp_nav_menu (
    array(
        'theme_location' => 'header',
        'menu_class' => 'main-menu',
        'fallback_cb'    => false,
        'container' => false
    )
); ?>
<?php if(function_exists('wc_get_cart_url')) { ?>
<a class="shop-basket" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><span><span class="shop-basket-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></span><?php //echo WC()->cart->get_cart_total(); ?></a>
<?php } ?>
</nav>