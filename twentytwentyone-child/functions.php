
<?php

function ttoc_styles() {
	wp_enqueue_style( 'ttoc-style', get_stylesheet_uri(), array( 'twenty-twenty-one-style' ) );
}
add_action( 'wp_enqueue_scripts', 'ttoc_styles' );


//ajout fonction
function ttoc_ajoute_auteur() {
	echo '<meta name="author" content="Mateo-Thomas Fortin-Lubin">';
}
add_action( 'wp_head', 'ttoc_ajoute_auteur' );



function twenty_twenty_one_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* This theme does not use a hard-coded <title> tag in the document head,
		* WordPress will provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/**
	 * Add post-formats support.
	 */
	add_theme_support(
		'post-formats',
		array(
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1568, 9999 );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
			'footer'  => esc_html__( 'Secondary menu', 'twentytwentyone' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	/*
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
	$logo_width  = 300;
	$logo_height = 100;

	add_theme_support(
		'custom-logo',
		array(
			'height'               => $logo_height,
			'width'                => $logo_width,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
	if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
		add_theme_support( 'dark-editor-style' );
	}

	$editor_stylesheet_path = './assets/css/style-editor.css';

	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE;
	if ( $is_IE ) {
		$editor_stylesheet_path = './assets/css/ie-editor.css';
	}

	// Enqueue editor styles.
	add_editor_style( $editor_stylesheet_path );

	// Add custom editor font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
				'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
				'size'      => 16,
				'slug'      => 'extra-small',
			),
			array(
				'name'      => esc_html__( 'Small', 'twentytwentyone' ),
				'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
				'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
				'size'      => 20,
				'slug'      => 'normal',
			),
			array(
				'name'      => esc_html__( 'Large', 'twentytwentyone' ),
				'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
				'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
				'size'      => 40,
				'slug'      => 'extra-large',
			),
			array(
				'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
				'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
				'size'      => 96,
				'slug'      => 'huge',
			),
			array(
				'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
				'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
				'size'      => 144,
				'slug'      => 'gigantic',
			),
		)
	);

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'd1e4dd',
		)
	);

	// Editor color palette.
	$black     = '#000000';
	$dark_gray = '#28303D';
	$gray      = '#39414D';
	$green     = '#D1E4DD';
	$blue      = '#D1DFE4';
	$purple    = '#D1D1E4';
	$red       = '#E4D1D1';
	$orange    = '#E4DAD1';
	$yellow    = '#EEEADD';
	$white     = '#FFFFFF';

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Black', 'twentytwentyone' ),
				'slug'  => 'black',
				'color' => $black,
			),
			array(
				'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
				'slug'  => 'dark-gray',
				'color' => $dark_gray,
			),
			array(
				'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
				'slug'  => 'gray',
				'color' => $gray,
			),
			array(
				'name'  => esc_html__( 'Green', 'twentytwentyone' ),
				'slug'  => 'green',
				'color' => $green,
			),
			array(
				'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
				'slug'  => 'blue',
				'color' => $blue,
			),
			array(
				'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
				'slug'  => 'purple',
				'color' => $purple,
			),
			array(
				'name'  => esc_html__( 'Red', 'twentytwentyone' ),
				'slug'  => 'red',
				'color' => $red,
			),
			array(
				'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
				'slug'  => 'orange',
				'color' => $orange,
			),
			array(
				'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
				'slug'  => 'yellow',
				'color' => $yellow,
			),
			array(
				'name'  => esc_html__( 'White', 'twentytwentyone' ),
				'slug'  => 'white',
				'color' => $white,
			),
		)
	);

	add_theme_support(
		'editor-gradient-presets',
		array(
			array(
				'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
				'slug'     => 'purple-to-yellow',
			),
			array(
				'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
				'slug'     => 'yellow-to-purple',
			),
			array(
				'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
				'slug'     => 'green-to-yellow',
			),
			array(
				'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
				'slug'     => 'yellow-to-green',
			),
			array(
				'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
				'slug'     => 'red-to-yellow',
			),
			array(
				'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
				'slug'     => 'yellow-to-red',
			),
			array(
				'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
				'slug'     => 'purple-to-red',
			),
			array(
				'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
				'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
				'slug'     => 'red-to-purple',
			),
		)
	);

	/*
	* Adds starter content to highlight the theme on fresh sites.
	* This is done conditionally to avoid loading the starter content on every
	* page load, as it is a one-off operation only needed once in the customizer.
	*/
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
	}

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for custom line height controls.
	add_theme_support( 'custom-line-height' );

	// Add support for link color control.
	add_theme_support( 'link-color' );

	// Add support for experimental cover block spacing.
	add_theme_support( 'custom-spacing' );

	// Add support for custom units.
	// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
	add_theme_support( 'custom-units' );

	// Remove feed icon link from legacy RSS widget.
	add_filter( 'rss_widget_feed_link', '__return_empty_string' );
}

function ttoc_supprime_editeur_page() {
    remove_post_type_support( 'page', 'editor' );
}
add_action( 'init', 'ttoc_supprime_editeur_page', 15 );