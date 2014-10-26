<?php
/*

Template Name: Monday Series

*/

global $post;
$post_id = $post->ID;
?>

<?php get_header();?>

<div class="medium-12 column">
<?php do_action('foundationPress_before_content'); ?>

<?php do_action('foundationPress_after_content'); ?>
</div>
<br />

<div class="small-12 medium-12 columns left" role="main">
  <div class="entry-content">
    <div class="">

        <?php while (have_posts()) : the_post(); ?>

          <?php do_action('foundationPress_page_before_entry_content'); ?>
          <div class="entry-content medium-12 left">
            <h2><?php echo the_title( '','', false ); ?></h2>
            <hr />
            <div class="medium-5 column right no-pad-right" >
            <?php echo display_image_linked('medium', 'large'); ?>
            </div>
            <?php the_content(); ?>
          </div>
          <?php do_action('foundationPress_after_content'); ?>

        <?php endwhile;?>

        <?php echo get_template_part('custom-post/events-post/' . 'mseries'); ?>
    </div>
  </div>
</div>



<?php //get_sidebar(); ?>

<?php get_footer(); ?>
