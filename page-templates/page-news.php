<?php
/*

Template Name: News

*/




?>


<?php get_header();?>


<?php do_action('foundationPress_before_content'); ?>
<?php do_action('foundationPress_after_content'); ?>

<br />
<div class="">
  <div class="medium-12 column">
    <h2><?php echo the_title( '','', false ); ?></h2>

  </div>

<div class="pagehead-border">
  <hr />
</div>
</div>
<div class="small-12 medium-12 columns left" role="main">
  <div class="entry-content">
    <div class="row">
      <div class="columns">
        <?php while (have_posts()) : the_post(); ?>

          <?php do_action('foundationPress_page_before_entry_content'); ?>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
          <?php do_action('foundationPress_after_content'); ?>

        <?php endwhile;?>

        <?php echo get_template_part('custom-post/' . 'news'); ?>

      </div>
    </div>
  </div>
</div>



<?php //get_sidebar(); ?>

<?php get_footer(); ?>
