
<?php


// On va charger les styles mais on appelle le theme parent ? yes
function ttoc_styles() {
	wp_enqueue_style( 'ttoc-style', get_stylesheet_uri(), array( 'twenty-twenty-one-style' ) );
}
add_action( 'wp_enqueue_scripts', 'ttoc_styles' );


// Ajoute la balise meta name="author" au head
function ttoc_ajoute_auteur() {
	echo '<meta name="author" content="Mateo-Thomas Fortin-Lubin">';
}
add_action( 'wp_head', 'ttoc_ajoute_auteur' );

// Fonction pour supprimer le page editor par defaut de wordpress (fournis dans l'enonce)
function ttoc_supprime_editeur_page() {
    remove_post_type_support( 'page', 'editor' );
}
add_action( 'init', 'ttoc_supprime_editeur_page', 15 );