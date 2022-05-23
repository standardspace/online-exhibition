<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

	<!-- Sitewide Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php wp_head(); ?>
    <link rel="stylesheet" href="/wp-content/themes/online-exhibition/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

<!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header class="ma-site-header">
    <h1 class="ma-site-title"><a href="<?php echo get_bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    <nav class="ma-site-nav">
        <ul>
            <li><a href="<?php echo get_bloginfo( 'url' ); ?>/artists/">Artists</a></li>
            <li><a href="<?php echo get_bloginfo( 'url' ); ?>/artworks/">Gallery</a></li>
            <li><a href="<?php echo get_bloginfo( 'url' ); ?>/event/">Events</a></li>
        </ul>
    </nav>
</header>





