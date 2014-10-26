<?php

function rd_display_post() {?>

	<div class="column left home-sub-panel light-grey small-12 medium-6" style="padding:1rem;" data-equalizer-watch>

		<h5 class="small-12">
			<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> <?php the_title();
	?></a>
	<h4 class="subheader " style="line-hight:0;margin-top:-20px;" ><small>Posted: <?php echo get_the_date();
	?></small>

</h4>
		</h5>


<?php
if (has_post_thumbnail()):// check if the post has a Post Thumbnail assigned to it. ?>
	<div class="medium-5 no-pad-left column left ">
	<?php the_post_thumbnail();?>
	</div>
	<?php endif;?>

	            <p><?php
$content  = get_the_content();
	$content = preg_replace('#<h([1-6]).*?class="(.*?)".*?>(.*?)<\/h[1-6]>#si', '<p class="heading-${1} ${2}">${3}</p>', $content);
	echo strip_tags(trim(substr($content, 0, 300)));?>
</p>
<h4><small><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> Read More...</a></small></h6>
   </div>


<?php }

function rd_display_post_page(){ ?>

		<div class="column left home-sub-panel light-grey small-12 medium-6" style="padding:1rem;" data-equalizer-watch>

		<h5 class="small-12">
			<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> <?php the_title();
	?></a>
	<h5 class="subheader " style="line-hight:0;margin-top:-20px;" ><small>Posted: <?php echo get_the_date();
	?></small>

</h5>
		</h5>


<?php
if (has_post_thumbnail()):// check if the post has a Post Thumbnail assigned to it. ?>
	<div class="medium-5 no-pad-left column left ">
	<?php the_post_thumbnail();?>
	</div>
	<?php endif;?>

	            <p><?php
$content  = get_the_content();
	$content = preg_replace('#<h([1-6]).*?class="(.*?)".*?>(.*?)<\/h[1-6]>#si', '<p class="heading-${1} ${2}">${3}</p>', $content);
	echo strip_tags(trim(substr($content, 0, 300)));?>
</p>
<h4><small><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> Read More...</a></small></h6>
   </div>
<?php }

wp_reset_query();?>
<?php
global $post;
$post_id = $post->ID;

$args = array(
	'post_type'      => 'post',
	'cat'      => 'blog',
	'posts_per_page' => 2,
);
$the_query = new WP_Query($args);

?>


<?php while ($the_query->have_posts()):$the_query->the_post();?>
	<?php


	echo rd_display_post();

?>

 <?php endwhile;?>

