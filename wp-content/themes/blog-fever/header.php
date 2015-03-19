<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Blog Fever
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <div class="header-area full">
        <div class="main-page">
                <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'blog-fever' ); ?></a>

                <header id="masthead" class="site-header inner" role="banner">
                <a id="nav-toggle" href="javascript:void(0)"><span></span></a>

                <?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) { ?>
                    <figure class="header-image">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php header_image(); ?>" width="< ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                        </a>
                    </figure>
                <?php } // End header image check. ?>
                <?php
                    if ( get_header_image() && !('blank' == get_header_textcolor()) ) {
                        echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">';
                    } else {
                        echo '<div class="site-branding">';
                    }
                ?>
                <div class="header-box">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                </div>
                </div>
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle"><?php _e( 'Menu', 'blog-fever' ); ?></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => '__return_false' ) ); ?>
                    </nav><!-- #site-navigation -->
                </header><!-- #masthead -->
        </div> <!-- end of main-page -->
    </div> <!-- end of header-area -->

    <div class="form-wrapper">
        <form role="search" method="get" action="/">
            <label>
                <span class="screen-reader-text">Найти:</span>
                <input type="search" class="search-field" placeholder="Поиск…" name="s" title="Найти" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="Найти">
        </form>
    </div>

    <div class="main-content-area full">
        <div class="main-page">
            <div id="content" class="site-content inner">
