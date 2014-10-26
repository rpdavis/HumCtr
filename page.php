<?php

$post_id = $post->ID;
?>


<?php get_header();?>



<?php do_action('foundationPress_before_content');?>
<?php do_action('foundationPress_after_content');?>

<br />
<div class="">
	<div class="medium-12 column">
		<h2><?php echo the_title('', '', false);?></h2>

	</div>

<div class="pagehead-border">
	<hr />
</div>
</div>
<div class="small-12 medium-12 columns left" role="main">
	<div class="entry-content">
		<div class="l">
			<div class="columns">
<?php while (have_posts()):the_post();?>

	<?php do_action('foundationPress_page_before_entry_content');?>
	<div class="medium-5 column right no-pad-right" >
	<?php echo display_image_linked('medium', 'large');?>
	</div>
						<div class="entry-content">
	<?php the_content();?>
	</div>
	<?php do_action('foundationPress_after_content');?>

	<?php endwhile;?>
</div>
		</div>
	</div>
</div>


<?php //get_sidebar(); ?>

<?php get_footer();?>
