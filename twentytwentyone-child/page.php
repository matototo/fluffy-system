

<?php
//vs_image_bg
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

        // on recupere les infos pour le hero content a partir d'$infos
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

    //echo $post->post_title;
    $verification = $post->post_title;
    //echo "<br>";
    //echo $verification;
    ?>

<div class="grille grille--4">
    
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php
                $infos_article = get_fields();
                $article_categorie = $infos_article['article_categorie'];
                
                //$post = the_post();
                //if($post->post_title == $article_categorie) {
                //    echo 'test';
               // }
                
                // on recupere les infos pour les articles a partir d'$infos
                    if ($infos_article) {
                        //echo 'okei';
                        $article_image = $infos_article['article_image'];
                        //$article_description = $infos_article['article_description'];
                        //$article_prix = $infos_article['article_prix'];
                        $article_actif = $infos_article['article_actif'];
                        //var_dump($infos_article);
                        //echo $article_categorie;
                        //echo the_title();

                    }
                    //echo $verification;
                    ?>

                    <?php
                    // TODO: Changer la conditionelle il faut quelle soit dynamique :
                    // trouver les deux categories et faire un foreach array as categories
                    // afficher article et compter jusqua $i le nombre d'article
                    // FIXME: comment je vais pouvoir afficher les titres des categories justa avant les articles si cest dans un grid et si on affiche tout ca dans une condition, le balisage deviens difficile.
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

get_footer();
?>
