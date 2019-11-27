</main>
<!-- end #col-main -->

<footer id="site-footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-content col-12 col-sm-3">
            <?php if(get_field('site_logo', 'option')) { ?>
                &copy; <?php echo get_field('footer_credit', 'option') ?> <?php echo date('Y') ?>
            <?php } ?>
            </div>
            <div class="col-12 col-sm-4">
            <?php echo get_template_part('template-parts/content','footer-nav'); ?>
            </div>
            <div class="col-12 col-sm-5">
            <?php //echo get_template_part('template-parts/content','footer-contact'); ?>
            <?php echo get_template_part('template-parts/content','social-media'); ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer();?>

</body>
</html>
