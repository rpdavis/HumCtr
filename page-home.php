<!--

Template Name:  Home
home page

 include template files:
 - slider
 - news-front
 - events-front -->

<?php get_header();?>
<div class="main" role="main">




<div class="large-8  medium-8 columns medium-no-pad-right">
<?php
echo do_shortcode("[metaslider id=6696]");
?>
<!-- <div class="slider-container">
<ul  data-orbit     data-options="animation:slide;
                  pause_on_hover:true;
                  animation_speed:500;
                  navigation_arrows:true;
                  bullets:false;" >
<?php get_template_part('content', 'slider');?>
</ul>
</div>-->

  <div class="large-12 medium-12 column news " >
    <span class="section-head"><h4> <a href="<?php echo bloginfo('url');?>/news?>">News </a></h4></span>

    <dl>
<?php get_template_part('custom-post/news', 'home');?>
</dl>

  </div>

</div>
<div class="large-4 medium-4 columns " >


<?php get_template_part('custom-post/events-post/events', 'home');?>
</div>
</div>

<div class="small-12 column">
<div class="row" data-equalizer>
<h3 class="column">Blogs</h3>

<div class="medium-12 " >
<div class="home-panel  blog-section column " >
  <div class=" medium-8  " >


<?php get_template_part('blog', 'post');?>
</div>

<div class="medium-4 column light-blue home-sub-panel_info" style="padding:1rem;" data-equalizer-watch>

<h5>
Blogs
</h5>
<p>
acilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque
nihil impedit quo minus id quod maxime
<h6>
<a href="http://localhost:8888/fullsite_UCSD/index.php/category/blog">More blogs</a>
</h6>
</p>
</div>

</div>
  </div>
</div>
</div>



<?php get_footer();?>
