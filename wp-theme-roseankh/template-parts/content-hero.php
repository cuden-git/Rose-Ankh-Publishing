<?php
if(get_field('hero')['img']) {
    $hero_fields = get_field('hero');
?>
    <div class="hero" style="background-image: url(<?php echo $hero_fields['img']['url']; ?> )"></div>
<?php
}
