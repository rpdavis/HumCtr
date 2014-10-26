<?php get_template_part('custom-post/events-post/events', 'display');?>

<?php

date_default_timezone_set('America/Los_Angeles');
?>

<?php
$date_1 = date('Y/m/d');

$args = array(
	'post_type'      => 'post_events',
	'posts_per_page' => 4,
	'orderby'        => 'start_date',
	'order'          => 'ASC',
	'meta_key'       => 'start_date',
	'meta_query'     => array(
		array(
			'key'   => 'start_date',
			'value' => $date_1,

			'compare' => '>=',
		)
	)
);
$the_query = new WP_Query($args);

?>
    <div class="entry-content">
            <div class="large-12 medium-12 columns event-body">
                 <div class="row event-head">
                      <div class="small-12 medium-12 column">
                          <h4>  <a href="<?php echo bloginfo('url');?>/all-events">upcoming events...</a>
                          <a href="<?php echo bloginfo('url');?>/calendar"> <i class="fi-calendar medium-1  " style="font-size:1.3em; padding-left:2rem"></i></a></h4>
                      </div>
                 </div>
                 <div class="columns">
<?php
$count_id = 0;
while ($the_query->have_posts()):$the_query->the_post();?>
								    <?php
	echo events_display_home($count_id);

	$count_id++;
	?>

	<?php endwhile;?>
</div>
        </div>
    </div>
