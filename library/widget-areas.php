<?php

function foundationpress_sidebar_widgets() {
  register_sidebar(array(
      'id' => 'sidebar-widgets',
      'name' => __('Sidebar widgets', 'foundationpress'),
      'description' => __('Drag widgets to this sidebar container.', 'foundationpress'),
      'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
      'after_widget' => '</div></article>',
      'before_title' => '<h6>',
      'after_title' => '</h6>'
  ));

  register_sidebar(array(
      'id' => 'footer-widgets',
      'name' => __('Footer widgets', 'foundationpress'),
      'description' => __('Drag widgets to this footer container', 'foundationpress'),
      'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h6>',
      'after_title' => '</h6>'
  ));


}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
register_sidebar(array(
    'id' => 'sub-widgets',
    'name' => __('sub', 'foundationpress'),
    'description' => __('Drag widgets to this sub-menu container.', 'foundationpress'),
    'before_widget' => '<article id="%1$s" class="sub-menu-pos top-bar-container widget %2$s"><div class="top-bar row" ><div class="medium-2 small-2 columns  top-bar-section" >',
    'after_widget' => '</div></div></article>',
    'before_title' => '<h6>',
    'after_title' => '</h6>'
));

?>
