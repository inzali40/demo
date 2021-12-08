<?php global $THEME_OPTIONS; ?>
<!doctype html>
<!--[if lt IE 7 ]>	<html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		<html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		<html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		<html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en"  class="no-js">
<!--<![endif]-->
<head>
<meta charset="UTF-8">
<title><?php wp_title(''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<?php if ( file_exists(TEMPLATEPATH .'/favicon.png') ) : ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
<?php endif; ?>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<?php $body_classes = join( ' ', get_body_class() ); ?>
<body class="<?php if( !is_search() )echo $body_classes; ?>">
<?php 
$site_info = get_field('general_setting','option');
if ($site_info['logo']) {
    $logo = $site_info['logo'];
} else {
    $logo = ASSET_URL.'images/logo.png';
}
?>
<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12"><?php if ($logo) { ?>
               <a href="<?php echo WP_HOME; ?>" title="<?php bloginfo('name'); ?>" class="logo-name">
               <img src="<?php echo WP_HOME.$logo; ?>" class="img-fluid main-logo" alt="<?php bloginfo('name'); ?>">
                 </a>
              <?php } ?>
            </div>
           <div class="co-lg-9 col-12">
             <nav class="stellarnav clearfix">
                <?php  
                  wp_nav_menu(array(
                 'theme_location' => 'main',
                 'menu' => 'main-menu',
                  'depth' => 0,
                   'menu_class' => 'menu',
                   'container' => '',
                      'container_class' => ''
                   ));
                 ?>
             </nav>
           </div>
        </div><!--row-->
    </div><!--container -->
 </header>

    