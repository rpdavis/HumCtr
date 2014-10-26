<?php get_template_part('custom-post/events-post/events', 'display');?>

<?php

//-------query and paginaton----------
//Protect against arbitrary paged values
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
?>
<?php do_action('foundationPress_before_content');?>
<?php
wp_reset_query();
$date_1 = date('Y/m/d');

// argument to query the db. select events, show set # per page, oder by date, in an asending order.
$args = array(

	'post_type'      => 'post_events',
	'paged'          => $paged,
	'posts_per_page' => 10,
	'orderby'        => 'start_date',
	'order'          => 'ASC',
	'meta_key'       => 'start_date',
	'meta_query'     => array(
		array(
			'key'   => 'start_date',
			'value' => $date_1,

			'compare' => '>=',
		)
	),
	// 'tax_query' => array(
	//      array(
	//          'taxonomy' => 'event_type',
	//          'field' => 'slug',
	//          'terms' =>'monday_series',
	//          'operator'  => 'NOT IN'
	//      )
	//  )
);

$the_query = new WP_Query($args);

?>
<?php
global $wp_query;
$big = 999999999;// need an unlikely integer

$pagination = paginate_links(array(
	'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
	'format'  => '?paged=%#%',
	'current' => max(1, get_query_var('paged')),
	'total'   => $the_query->max_num_pages
));
?>

  <div class="medium-9 column event-container-full" >
    <div class= "column event-head event-body-full">
    <div class="medium-12 column event-title">
      <h2><?php echo the_title('', '', false);?></h2>

    </div>
  <div class=' right'>
<?php echo $pagination;?>
</div>

<?php
$count_id = 0;

//-----query ------
while ($the_query->have_posts()):$the_query->the_post();?>
		<?php
	echo events_display($count_id);

	$count_id++;
	?>

	<?php endwhile;?>

<?php posts_nav_link();
//---------------end query -----------------
if (!empty($pagination)) {echo '<hr />';}
?>
<div class='right'>
<?php echo $pagination;?>
</div></div>


</div>
