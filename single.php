<?php
 function author_display(){
	 if (!empty(get_field('author'))):
        echo get_field('author');
    else:
        echo the_author_posts_link();
    endif;
}
get_header();
?>

<?php
do_action('foundationPress_before_content');
?>
<?php
do_action('foundationPress_after_content');
?>
<?php
$my_field = my_fields();
$size     = 'medium';

?>
	<div class="small-12 ">


											


<div class="column" >
<br />
<a href="http://localhost:8888/fullsite_UCSD/index.php/category/blog">Blogs</a>
											
		<h1 style="font-family:'Gentium Book Basic';"><strong><?php
echo the_title('', '', false);
?></strong></h1>

</div>
<div style="border-bottom:lightgrey 1px solid; padding-top:.3rem" class="column"></div>


	</div>

<!-- <div class=" medium-9 gutter-right gutter-left pagehead-border">
	<div class=" medium-9 gutter-right gutter-left ">
		<hr />
	</div>
</div> -->

<div class="small-12 medium-9 columns left" role="main">
	<div class="entry-content">
		<div class=" ">


<?php
while (have_posts()):
    the_post();
?>
				<article <?php
    post_class();
?> id="post-<?php
    the_ID();
?>">
			<!--<header>
	<h1 class="entry-title"><?php
    the_title();
?></h1>
		</header>-->
	<?php
    do_action('foundationPress_page_before_entry_content');
?>
<h6 class="subheader" style="margin-bottom:2.3rem;">
	By <?php echo '<a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. author_display() .'</a>' . ' ' ;
	echo '<time class="updated" datetime="'. get_the_time('c') .'">'. sprintf(__('   %s', 'FoundationPress'), get_the_time(' F jS, Y'), get_the_time()) .'</time>'; ?>
	</h6>
	<div class="entry-content">


	<?php
    if ($my_field['image']) {
?> <div class="medium-5 small-4 column no-pad-right right"><?php
        echo $my_field['image_link'];
?></div> <?php
    }
?>
	
	
	<div class="">
<?php
$content = get_the_content();
$content = preg_replace('/<li>(.*?)/si', '<li style="margin:0rem 0 0rem 0;">', $content, -1 );
$content = preg_replace('/<h1(.*?)/si', ' <h1 class=" subheading "$2', $content, -1 );
$content = preg_replace('/<h2(.*?)/si', ' <h2 class=" subheading "$2', $content, -1 );
$content = preg_replace('/<h3(.*?)/si', ' <h3 class=" subheading "$2', $content, -1 );
$content = preg_replace('/<h4(.*?)/si', ' <h4 class=" subheading "$2', $content, -1 );
$content = preg_replace('/<h5(.*?)/si', ' <h5 class=" subheading "$2', $content, -1 );
$content = preg_replace('/<h6(.*?)/si', ' <h6 class=" subheading "$2', $content, -1 );
echo $content ;

?>

												
	</h6> 
																										</div>


																																																</div>
																																																<footer>
	<?php
    wp_link_pages(array(
        'before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'),
        'after' => '</p></nav>'
    ));
?>
																																																	<p><?php
    the_tags();
?></p>
																																																</footer>
																																				<!-- 	<?php
    do_action('foundationPress_page_before_comments');
?>

	<?php
    do_action('foundationPress_page_after_comments');
?>-->
																																					</article>

	<?php
endwhile;
?>

<?php
do_action('foundationPress_after_content');
?>
</div>
</div>
</div>
<div class="panel news-single-sidebar right medium-3 column gutter-left" style="margin-top:4rem;">
	<h5> Recent Blogs...</h5>
	<hr />
<?php

$args      = array(
    'post_type' => 'post',
    'posts_per_page' => 6
);
$the_query = new WP_Query($args);
?>
<?php
while ($the_query->have_posts()):
    $the_query->the_post();
?>

<h6>
<a href="<?php
    echo get_permalink();
?>"> <?php
    echo the_title('', '', false);
?></a>
<p><small>Posted: <?php
    echo the_date();
?></small></p></h6>
<p></p>
	<?php
endwhile;
?>
</div>

<?php //get_sidebar(); 
?>
<?php
get_footer();
?>