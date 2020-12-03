<!DOCTYPE html>
<!--[if IE]><html lang="pt-br" class="lt-ie9 lt-ie8"><![endif]-->
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?php wp_title(); ?></title>
    <meta name="description" content="">
    <meta name="language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="André Facchini">
    <meta name="language" content="pt-br" />
    <link rel="canonical" href="<?= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="masthead">
        <div class="center-content flexed row spaced centered nav-tab">
            <a href="" class="header-logo">
                <img src="<?php bloginfo( 'template_url' ); ?>/images/logo-site.png" alt="Logotipo Bom de Livros">
            </a>
            <div class="search-and-menu flexed row spaced centered">
                <button class="trigger-menu flexed row spaced centered">
                    <i class="fa fa-bars t-primary t-g"></i>
                    <span class="t-primary t-r bold">MENU</span>
                    <i class="fa fa-chevron-down t-primary t-g"></i>
                </button>
                <?php get_search_form(); ?>
            </div>
            <div class="user-auth">
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="btn-primary" id="user-identification">
                    <i class="fa fa-user t-primary"></i>
                    <span class="t-white">Login / Cadastre-se</span>
                </a>
            </div>
        </div>
        <!-- <nav class="main-navigation">
        </nav> -->
    </header>