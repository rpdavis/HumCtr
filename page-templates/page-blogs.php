<?php
/*
Template Name: blogs_page
*/
$display= "all";
?>
<?php get_header();?>
<?php do_action('foundationPress_before_content'); ?>
<?php do_action('foundationPress_after_content'); ?>
<br />
<div class="">
  <div class="medium-12 column ">
    <h2><?php echo the_title( '','', false ); ?></h2>
  </div>


</div>
<div class="small-12 medium-12 columns left" role="main">
  <div class="entry-content">
    <div class=" " >
      <div class="row " data-equalizer>
<?php function rd_display_post_page(){ ?>
<div class="column left small-12 medium-6" style="padding:1rem;" >
<div class="panel home-sub-panel_info">
<h5 class="small-12">
  <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> <?php the_title();
  ?></a> 
  <h4 class="subheader " style="line-hight:0;margin-top:-3px;" >
  <small>
  Posted: <?php echo get_the_date();?>
  </small>
  </h4>
</h5>

<?php
if (has_post_thumbnail()):// check if the post has a Post Thumbnail assigned to it. ?>
  <div class="medium-5 no-pad-left column left ">
  <?php the_post_thumbnail();?>
  </div>
<?php endif;?>

<p data-equalizer-watch><?php
$content  = get_the_content();
  $content = preg_replace('#<h([1-6]).*?class="(.*?)".*?>(.*?)<\/h[1-6]>#si', '<p class="heading-${1} ${2}">${3}</p>', $content);
  echo strip_tags(trim(substr($content, 0, 300)));?>
</p>
<h4><small>
<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> Read More...</a>
</small></h4>
 
</div></div>
<?php } ?>


<!--         <?php while (have_posts()) : the_post(); ?>

          <?php do_action('foundationPress_page_before_entry_content'); ?>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
          <?php do_action('foundationPress_after_content'); ?>

        <?php endwhile;?> -->


<?php
global $post;
$post_id = $post->ID;

$args = array(
  'post_type'      => 'post',
  'meta_key' => 'display',
  'meta_value' => 'blog'

  
);
$the_query = new WP_Query($args);?>

<?php while ($the_query->have_posts()):$the_query->the_post();?>

<?php rd_display_post_page() ;?>


        <?php endwhile;?>

      </div>
    </div>
  </div>
</div>



<?php //get_sidebar(); ?>

<?php get_footer(); ?>
