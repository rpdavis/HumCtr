<?php get_header();?>

<?php do_action('foundationPress_before_content');?>
<?php do_action('foundationPress_after_content');?>
<?php
$my_field = my_fields();
$size     = 'medium';

?>
	<div class="small-12 column">
	<br />
	<a hre="#" class="rd-heading"> news </a>
		<h2 class=""><?php echo the_title('', '', false);?></h2>


	</div>

	<hr />
<!--
with yellow hr
<div class=" medium-9 gutter-right gutter-left pagehead-border"> -->
	<div class=" medium-9 gutter-right gutter-left ">
		
	</div>
</div>

<div class="small-12 medium-9 columns left" role="main">
	<div class="entry-content">
		<div class=" ">

<?php while (have_posts()):the_post();?>
										<article <?php post_class()?> id="post-<?php the_ID();?>">
											<!--<header>
											<h1 class="entry-title"><?php the_title();?></h1>
										</header>-->
	<?php do_action('foundationPress_page_before_entry_content');?>
	<div class="entry-content">


	<?php if ($my_field['image']) {?> <div class="medium-5 small-4 column no-pad-right right"><?php echo $my_field['image_link'];?></div> <?php }?>
													<div class=""><h6 class="subheader"><?php the_field('author');?></h6>
	<?php the_field('description');?></div>


										</div>
										<footer>
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>'));?>
											<p><?php the_tags();?></p>
										</footer>
	<?php do_action('foundationPress_page_before_comments');?>

	<?php do_action('foundationPress_page_after_comments');?>
	</article>

	<?php endwhile;?>

<?php do_action('foundationPress_after_content');?>
</div>
</div>
</div>
<div class="panel news-single-sidebar right medium-3 column gutter-left">
	<h5> Recent News...</h5>
	<hr />
<?php

$args = array(
	'post_type'      => 'post_news',
	'posts_per_page' => 6,
);
$the_query = new WP_Query($args);
?>
<?php while ($the_query->have_posts()):$the_query->the_post();?>

					<h6>
<a href="<?php echo get_permalink();?>"> <?php echo the_title('', '', false);
?></a>
<p><small>Posted: <?php echo the_date();?></small></p></h6>
					<p></p>


	<?php endwhile;?>
</div>
<?php //get_sidebar(); ?>



<?php get_footer();?>
