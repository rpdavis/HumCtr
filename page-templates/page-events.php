<?php
/*

Template Name: Events

 */
?>



<?php get_header();?>


<?php do_action('foundationPress_before_content');?>
<?php do_action('foundationPress_after_content');?>

<br />

<div class="small-12 medium-12 columns left" role="main">
  <div class="entry-content">
    <div class="row">

        <!-- <?php while (have_posts()):the_post();?>

	<?php do_action('foundationPress_page_before_entry_content');?>
	<div class="entry-content">
	<?php the_content();?>
	</div>
	<?php do_action('foundationPress_after_content');?>

	<?php endwhile;?>-->

<?php echo get_template_part('custom-post/events-post/' . 'events');?>

<div class="medium-3 column monday-series right">
  <a href="<?php echo bloginfo('url');?>/mondays"><h5><u>Monday Series</u></h5></a>
<!--
  <a href="#">Cool event</a><br />
  <small >next monday: 8/27</small><br />
  <p>If I make Monday series part of event post distinquished by a category it would be easy to display the next event here.</p>
 -->
</div>
<div class="medium-3 column panel ">
  <p>Have an event that we should know about? Sent us an event from the add event page.</p>
   <p><a href="<?php echo get_permalink() . '/event-form';?>"class="button small"> add event</a></p>
</div>
    </div>
  </div>
</div>



<?php //get_sidebar(); ?>

<?php get_footer();?>
