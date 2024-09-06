<?php
// On charge l'en-tête
get_header();
?>
<?php

// On va chercher le WYSIWYG
$info = get_field('ap_editeur');


if (is_page('a-propos') ) {
    ?>
    <div class="editor">
        <?php echo $info; ?>
    </div>
    <?php
}else{
    // Par défaut, affiche le contenu standard de WordPress
    the_content();
}
        
// On charge le footer
get_footer();
?>
