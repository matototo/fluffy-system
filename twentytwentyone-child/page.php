

<?php
// Cette page est la meme que la page d'accueil en gros sauf qu'elle gere l'affichage des pages vaisselle et service


// On charge l'en-tête
get_header();

$args = array(
    'posts_per_page'    => -1,
    'post_type'     => 'article',
);

//wp_reset_query();
$the_query = new WP_Query( $args );
 
if ( $the_query->have_posts()  ) : ?>

    <?php
        $infos = get_fields();

        // On recupere les infos pour le hero content a partir d'$infos
        $vs_image_bg = $infos['vs_image_bg'];
        $vs_introduction = $infos['vs_introduction'];
    ?>
    <section class="hero">
    <p class="hero-intro"><?php echo $vs_introduction; ?></p>
    <img src="<?php if ( !$vs_image_bg ) {
                echo 'http://localhost/intro-cms/wp-content/uploads/2024/08/le-creuset-bg-par-defaut.jpg';
            }else {
                echo $vs_image_bg;
            }?>" alt="image background acceuil" class="hero-image"></img>
    </section>

    <?php

    // on peux accedder a post_title ici et non dans la front-page donc j'utilise la variable verification pour afficher dynamiquement les differentes categories 
    $verification = $post->post_title;
    $verification = strtolower($verification);
    // die();
    ?>

<div class="grille grille--4">
    
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php
                $infos_article = get_fields();
                $article_categorie = $infos_article['article_categorie'];
                
                
                if ($infos_article) {

                    $article_image = $infos_article['article_image'];
                    $article_actif = $infos_article['article_actif'];
                }
                ?>

                <?php
                if ($article_actif) {
                    if($article_categorie == $verification) {
                        ?>
                        <div class="grille__item tuile-content">
                            <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo $article_image; ?>" alt=""></img>
                            <h4><?php echo get_the_title(); ?></h4></a>
                        </div>
                        <?php
                    }
                }

endwhile;

endif; 

// On charge le footer
get_footer();
?>
