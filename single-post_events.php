<?php get_template_part('custom-post/events-post/events', 'display');?>

<?php get_header();?>
<?php dynamic_sidebar('sub');?>

<?php do_action('foundationPress_before_content');?>
<?php do_action('foundationPress_after_content');?>

<?php while (have_posts()):the_post();?>
				<article <?php post_class()?> id="post-<?php the_ID();?>">
					<header>
	<?php	echo display_events_single();?>
	<footer>
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>'));?>
						<p><?php the_tags();?></p>
					</footer>

				</article>
	<?php endwhile;?>

<?php do_action('foundationPress_after_content');?>



<?php get_footer();?>
