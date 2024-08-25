<?php

//if (get_post_type() == 'article') {
//    include(get_template_directory() . '/single-article.php');
//    exit;
//}

get_header();

//echo 'test';
if (get_post_type() == 'article') : ?>

    <section class="article-produit">
    <?php
    $infos_article = get_fields();
    $article_image = $infos_article['article_image'];
    $article_categorie = $infos_article['article_categorie'];
    $article_description = $infos_article['article_description'];
    $article_prix = $infos_article['article_prix'];
    $article_actif = $infos_article['article_actif'];
    // 
    ?>

    <?php

    if ($article_actif) {
        ?>
        <h2><?php echo the_title(); ?></h2>
        <div class="creuset-article">
            <img src="<?php echo $article_image; ?>" alt="">
            <div class="creuset-content">
                <h3><?php echo $article_categorie; ?></h3>
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

get_footer();