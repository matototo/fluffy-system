<?php

// On charge l'en-tête
get_header();

// On cherche les attributs ici c'est le slug qu'on a definis avec CPT UI
$args = array(
    'posts_per_page'    => -1,
    'post_type'     => 'article',
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts()  ) : ?> 

    <section class="hero">
    <?php

    // On recupere TOUTES les infos
    $infos = get_fields();

    // On recupere les infos pour le hero content a partir d'$infos
    $accueil_image_bg = $infos['accueil_image_bg'];
    $accueil_slogan = $infos['accueil_slogan'];

    // Debut du contenus hero banner avec conditionelle qui definis une valeur par defaut de limage en arriere plan
    ?>
        <h2 class="slogan"><?php echo $accueil_slogan; ?></h2>
        <img src="<?php if ( !$accueil_image_bg ) {
            echo 'http://localhost/intro-cms-tp2/wp-content/uploads/2024/08/le-creuset-bg-par-defaut.jpg';
        }else {
            echo $accueil_image_bg;
        }?>" alt="image background acceuil" class="hero-image"></img>
    

    </section>

    <?php
        // On recupere l'introduction a partir d'$infos
        $accueil_introduction = $infos['accueil_introduction'];
    ?>
        <div class="intro">
            <p><?php echo $accueil_introduction; ?></p>
        </div>

    <div class="grille grille--4">
        
        <?php $i=0; $j=0;?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php
                $infos_article = get_fields();

                // On recupere les infos pour les articles a partir d'$infos
                    if ($infos_article) {
                        $article_image = $infos_article['article_image'];
                        $article_categorie = $infos_article['article_categorie'];
                        $article_actif = $infos_article['article_actif'];
                    }
                    ?>

                    <?php
                    // TODO: Changer la conditionelle il faut quelle soit dynamique :
                    // trouver les deux categories et faire un foreach array as categories
                    if ($article_actif) {
                        if($article_categorie == "vaisselle" && $i<4) {
                            ?>
                            <div class="grille__item tuile-content">
                                <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $article_image; ?>" alt=""></img>
                                <h4><?php echo get_the_title(); ?></h4></a>
                            </div>
                            <?php
                            // lol
                            $i++;
                        }elseif ($article_categorie == "service" && $j<4) {
                            ?>
                            <div class="grille__item tuile-content">
                                <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $article_image; ?>" alt=""></img>
                                <h4><?php echo get_the_title(); ?></h4></a>
                            </div>
                            <?php
                            // lol
                            $j++;
                        }
                    }
            ?>


        <?php endwhile; ?>
<?php endif;

// On charge le footer
get_footer();
?>
