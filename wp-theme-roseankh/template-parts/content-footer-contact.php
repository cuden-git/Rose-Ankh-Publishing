<?php
    if (get_field('contact_email', 'option') || get_field('contact_telephone', 'option')) {
?>
    <ul class="contact-info-list">
<?php
        if (get_field('contact_email', 'option')) { ?>
            <li><a href="mailto:<?php echo get_field('contact_email', 'option') ?>" class="contact-email" title="Email"><?php echo get_field('contact_email', 'option') ?></a></li>
<?php   }

        if (get_field('contact_telephone', 'option')) { ?>
            <li><a href="tel:<?php echo get_field('contact_telephone', 'option') ?>" class="contact-telephone" title="Telephone"><?php echo get_field('contact_telephone', 'option') ?></a></li>
<?php
        } ?>
    </ul>
<?php
    }
?>