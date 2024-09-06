<?php
// Pas grand chose a dire ici aussi on va chercher plus d'info mais l'affichage est plus simple car on affiche seulement un article

// On va chercher l'en-tetet
get_header();


if (get_post_type() == 'article') : ?>

    <section class="article-produit">
    <?php
    $infos_article = get_fields();
    $article_image = $infos_article['article_image'];
    $article_categorie = $infos_article['article_categorie'];
    $article_description = $infos_article['article_description'];
    $article_prix = $infos_article['article_prix'];
    $article_actif = $infos_article['article_actif'];

    ?>

    <?php

    if ($article_actif) {
        ?>
        <h2><?php echo the_title(); ?></h2>
        <div class="creuset-article">
            <img src="<?php echo $article_image; ?>" alt="">
            <div class="creuset-content">
                <h3><?php echo htmlspecialchars($article_categorie); ?></h3>
                <h4>Description</h4>
                <p><?php echo $article_description; ?></p>
                <h4><?php echo $article_prix; ?> $</h4>
            </div>
        </div>
        <?php
    }
    ?>


    </section>
<?php endif; 

// On va chercher le footer
get_footer();