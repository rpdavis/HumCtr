<?php
//not set-up yet
// include("event-display.php");

 get_header(); ?>
<?php dynamic_sidebar('sub'); ?>

<?php do_action('foundationPress_before_content'); ?>
<?php do_action('foundationPress_after_content'); ?>
<?php
function display_image($size, $link_size){
if ( has_post_thumbnail()) {
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
$image .= '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
$image .=	get_the_post_thumbnail($post_id, $size);
$image .= '</a>';
}
return $image;
}
?>

				<?php
function display_events_single(){

$my_field = my_fields();

					$size = 'medium';
					$image = display_image('medium', 'large');
					$text_overflow = ' ...<a href="#" data-reveal-id="myModal_' . $count_id . '">' . ' (more)' .'</a>';
					//$title=get_field( 'title' );
					$location= get_field( 'location' );
					$time= date('g:i a', strtotime(get_field( 'start_time' )));
					$end_time= get_field('end_time');
					$event_date_field= get_field( 'date' );
					$event_date= date('M jS', strtotime(get_field( 'date' )));
					$event_date_day= date('D', strtotime(get_field( 'date' )));
					$event_date_month_yr= date('M jS', strtotime(get_field( 'date' )));

					$description = get_field( 'description' );
					$description = preg_replace('/<\/?p>/','', $description);

		$location_google_map=get_field('location_google_map');

		if (date('M Y d') == date('M Y d', strtotime($event_date_field))){
				$date = "Today, " . $event_date;
		}
		else{
				$date = $event_date_day . ", ". $event_date_month_yr;
		}
				?><br /><br />


			<div class=" medium-12 column">
							<div class="medium-9 small-12 column right">

							<h3>
									<!-- <a href="<?php get_permalink(); ?> '"> <?php the_title(); ?> </a> -->
							</h3>
							</div>

					<div class="row" >
					<div class="medium-3 column left">
						<br />
						<?php if(! $image  ==""):?>
							<div class="large-12 small-12 column large-centered  event-modal-img no-pad-left">
							<?php echo $image ;?>
							</div>
							<br />
						<?php endif ;?>

					<div class="large-12 small-12 column no-pad-left">
					<br />
							<div>
								<h6>tttt
									<strong>Date:</strong> <?php echo $my_field['date']; ?>
								</h6>
							</div>
							<div>
								<h6>
									<strong>Time: </strong>
									<?php echo $time . ' - ' . $end_time; ?>
								</h6>
							</div>
							<div>
								<h6>
									
									<?php echo $my_field['website']; ?>
								</h6>
							</div>
							<div>
								<h6>
									<strong>location: </strong> <?php echo $location ;?>
								</h6>
								<div id="view1">
<?php

if( ! empty($location_google_map) ):
?>
<h6>
<a href="https://www.google.com/maps/place/ <?php echo  $location_google_map['address'] . '/@' .  $location_google_map['lat'] . ',' . $location_google_map['lng'] ;?>">
	<i class="fi-map" style="font-size:1.3em;;"> </i>
	Get directions </a>
</h6>
<div id="map" style="width: 100%; height: 200px;"></div>
<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>

<script type="text/javascript">
  //<![CDATA[
	function load() {
	var lat = <?php echo $location_google_map['lat']; ?>;
	var lng = <?php echo $location_google_map['lng']; ?>;
// coordinates to latLng
	var latlng = new google.maps.LatLng(lat, lng);
// map Options
	var myOptions = {
	zoom: 14,
	center: latlng,
	mapTypeId: google.maps.MapTypeId.ROADMAP
   };
//draw a map
	var map = new google.maps.Map(document.getElementById("map"), myOptions);
	var marker = new google.maps.Marker({
	position: map.getCenter(),
	map: map
   });
}
// call the function
   load();
//]]>
</script>
<?php endif; ?>

</div>

							</div>
							</div>
					</div>
					<br />
						<div>
							<div class= "medium-9 column right">
								<hr/>
								<h4 class="subheader">
									<?php// echo $subheader ;?>
								</h4>
								<p>
									<?php echo $description ;?>
								</p>
								<hr/>
							</div>

							</div>
						</div>
</div>
			<?php	}?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
			<?php	echo display_events_single();?>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php// do_action('foundationPress_page_before_comments'); ?>
			<?php// comments_template(); ?>
			<?php// do_action('foundationPress_page_after_comments'); ?>
		</article>
	<?php endwhile;?>

			<?php do_action('foundationPress_after_content'); ?>

<?php// get_sidebar(); ?>

<?php get_footer(); ?>
