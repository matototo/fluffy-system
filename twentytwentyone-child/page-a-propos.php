<?php
// On charge l'en-tête
get_header();
?>
<?php

$info = get_field('ap_editeur');

//echo the_title();

if (is_page('a-propos') ) {
    ?>
    <div class="editor">
        <?php echo $info; ?>
    </div>
    <?php
}else{
    // Par défaut, affiche le contenu standard de WordPress
    the_content();
    //echo 'test';
}
        

get_footer();
?>
