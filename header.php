<!doctype html>
<html class="no-js" <?php language_attributes();?>>
<!--[if IE 9]><html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<?php
?>
<head>

<!--=== META TAGS ===-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--     <meta charset="<?php bloginfo('charset');?>" /> -->
    <meta charset="utf-8" />
    <meta name="center for the humanities" content="university of california, ucsd, humanities">
    <meta name="author" content="Name">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title><?php if (is_category()) {
	echo 'Category Archive for &quot;';
	single_cat_title();
	echo '&quot; | ';
	bloginfo('name');
} elseif (is_tag()) {
	echo 'Tag Archive for &quot;';
	single_tag_title();
	echo '&quot; | ';
	bloginfo('name');
} elseif (is_archive()) {
	wp_title('');
	echo ' Archive | ';
	bloginfo('name');
} elseif (is_search()) {
	echo 'Search for &quot;' . esc_html($s) . '&quot; | ';
	bloginfo('name');
} elseif (is_home() || is_front_page()) {
	bloginfo('name');
	echo ' | ';
	bloginfo('description');
} elseif (is_404()) {
	echo 'Error 404 Not Found | ';
	bloginfo('name');
} elseif (is_single()) {
	wp_title('');
} else {
	echo wp_title(' | ', 'false', 'right');
	bloginfo('name');
}?></title>

<link rel="icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/img/icons/favicon-ucsd.ico" type="image/x-icon">
<?php wp_head();?>


</head>
<body <?php body_class();?>>

<?php do_action('foundationPress_after_body');?>
<div class="off-canvas-wrap content-background" data-offcanvas>
    <div class="inner-wrap" >

<?php do_action('foundationPress_layout_start');?>

      <nav class="tab-bar show-for-small-only">
        <section class="right-small">
          <a class="right-off-canvas-toggle menu-icon" ><span></span></a>
        </section>
        <section class="middle tab-bar-section">
          <h1 class="title"><?php bloginfo('name');?></h1>
        </section>
        <section class="left-small">
          <a href="<?php home_url();?>" title="<?php bloginfo('name');?>">
            <img src ="<?php echo get_stylesheet_directory_uri();?>/assets/img/ucsd_logo_small.png" class="logo" alt="Center for the Humanities" />
          </a>
        </section>
      </nav>
<?php get_template_part('parts/off-canvas-menu');?>

	<!-- <?php get_template_part('parts/top-bar');?>
<aside class="right-off-canvas-menu" aria-hidden="true">

<?php foundationPress_mobile_off_canvas();?>
          </aside> -->
          <div class="head-img">
<div class="backcolor row">
          <div class=" show-for-medium-up uc-link medium-6 column right text-right"><a href="http://ucsd.edu/">UC San Diego</a></div>

          <div class="backcolor show-for-medium-up ">
            <div class="medium-6 column no-pad-left">
            <a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
              <img src ="<?php echo get_stylesheet_directory_uri();?>/assets/img/ucsd_logo2.png" class="logo" alt="Center for the Humanities" />
            </a>
          </div>
            <div class="large-4 medium-4 small-12 column right"><?php get_search_form();?></div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="row">
          <div class="top-bar-container contain-to-grid show-for-medium-up">
            <nav class="top-bar" data-topbar="">
              <ul class="title-area right">
                <li class="name grant-button">
                  <a href="<?php echo bloginfo('url');?>/find-a-grant">Find a Grant </a>
                </li>
              </ul>
              <section class="top-bar-section">
<?php foundationPress_top_bar_l();?>
                <?php foundationPress_top_bar_r();?>

              </section>
            </nav>
          </div>
        </div>
      </div>

      <!--<header class="row" role="banner">
      <div class="small-12 columns">
      <h1><a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>"><?php bloginfo('name');
?></a></h1>
      <h4 class="subheader"><?php bloginfo('description');?></h4>
      <hr/>
    </div>
  </header>-->
<div  class="sub" style="background: #eee; width:100%;min-height:1rem;">
<?php dynamic_sidebar('sub');?>
</div>
  <section class="container row backcolor" role="document">
<?php do_action('foundationPress_after_header');?>
<div class="">
