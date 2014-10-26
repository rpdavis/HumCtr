<?php

// for time field show that is displays correctly.
date_default_timezone_set('America/Los_Angeles');

// Limit text display
function text_overflow($text_length, $text_field) {
	$overflow = '<a href="' . get_permalink() . '"> ...</a> </p>';
	if (strlen(trim(get_field($text_field))) > $text_length) {
		$string = substr(get_field($text_field), 0, $text_length) . $overflow;

	} else {
		$string = get_field(trim($text_field));
	}
	return $string;
}
function text_overflow_post($text_length, $text_field) {
	$overflow = '<a href="' . get_permalink() . '"> ...</a>';
	if (strlen(trim($text_field)) > $text_length) {
		$string = substr($text_field, 0, $text_length) . $overflow;
	} else {
		$string = trim($text_field);
	}
	return $string;
}

function display_image_linked($size, $link_size) {
	global $post;
	$post_id   = $post->ID;
	$link_size = "";

	$image = "";
	if (has_post_thumbnail()) {
		$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');

		$image .= '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
		$image .= get_the_post_thumbnail($post_id, $size);
		$image .= '</a>';
	}
	return $image;
}

// grants: for eligiblity field
function eligibility_format() {
	$print       = "";
	$prefix      = "";
	$eligibility = get_field('eligibility');
	if (is_array($eligibility)) {
		if (!get_field('other') == "") {
			$eligibility[] .= get_field('other');
		}
		foreach ($eligibility as $value) {

			$print .= $prefix . $value;
			$prefix = ', ';
		}
	} else {
		$print = get_field('eligibility');
	}
	return $print;
}
function grant_type_format() {
	$print      = "";
	$prefix     = "";
	$grant_type = get_field('grant_type');
	if (is_array($grant_type)) {
		foreach ($grant_type as $value) {
			$print .= $prefix . $value;
			$prefix = ', ';
		}
	} else {
		$print = get_field('grant_type');
	}
	return $print;
}

// fields for events, news, and grants
function my_fields() {
	global $post;
	$post_id   = $post->ID;
	$link_size = "";
	if (date('M Y d') == date('M Y d', strtotime(get_field('start_date')))) {
		$date = "Today, " . date('M jS', strtotime(get_field('start_date')));
	} else {
		$date = date('D', strtotime(get_field('start_date'))) . ", " . date('M jS', strtotime(get_field('start_date')));
	}
//  fields for news, grants, events, custom page content
	$size             = "";
	$link_size        = "";
	$f                = 'g:i a';
	$b                = get_field('start_time');
	$my_field['time'] = date_i18n($f, strtotime(get_field('start_time')));
	// $my_field['time'] = date('g:i a', strtotime(get_field( 'start_time' )));
	$my_field['google_map']  = get_field('location_google_map');
	$my_field['location']    = trim(get_field('location'));
	$my_field['end_time']    = trim(get_field('end_time'));
	$my_field['description'] = trim(get_field('description'));
	$my_field['date']        = trim($date);
	$my_field['image']       = get_the_post_thumbnail($post_id, 'thumbnail');
	$my_field['image_link']  = display_image_linked($size, $link_size);
	$my_field['rsvp']        = trim(get_field('rsvp'));
	// $my_field['gravity_form'] =  get_field( 'gravity_form' );
	// if(get_field('amount_range')!=""){
	//   $my_field['amount'] = '$' . number_format(get_field( "amount")).' - ' . '$' . number_format(get_field('amount_range'));
	// }
	// else{
	//   $my_field['amount'] = '$' . number_format(get_field( "amount")) ;
	// }

	$my_field['amount']     = get_field("amount");
	$my_field['email']      = trim(get_field('email'));
	$my_field['website']    = trim(get_field('website'));
	$my_field['contact']    = trim(get_field('contact'));
	$my_field['sponsor']    = trim(get_field('sponsor'));
	$my_field['grant_type'] = grant_type_format();
	$my_field['grant_date'] = date('m/d/y', strtotime(get_field('due_date')));

	$my_field['eligibility']      = eligibility_format();
	$my_field['eligibility_info'] = trim(get_field('eligibility_info'));
// page template columns (acf repeater fields)

	$my_field['image_col'] = get_field('image_col');
	$my_field['columns']   = get_field('columns');
	$my_field['heading']   = trim(get_field('heading'));

	//$my_field['columns'] = get_field( 'columns' );
	$my_field['rf_image']       = get_sub_field('rf_image');
	$my_field['rf_title']       = trim(get_sub_field('title'));
	$my_field['rf_description'] = get_sub_field('description');

	//google map field

	ob_start();

	if (!empty($my_field['google_map'])):
	?>
  <h6>
  <a href="https://www.google.com/maps/place/ <?php echo $my_field['google_map']['address'] . '/@' . $my_field['google_map']['lat'] . ',' . $my_field['google_map']['lng'];?>">
    <i class="fi-map" style="font-size:1.3em;;"> </i>
    Get directions </a>
  </h6>
  <div id="map" style="width: 100%; height: 200px;"></div>

  <script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>

  <script type="text/javascript">
    //<![CDATA[
    function load() {
    var lat = <?php echo $my_field['google_map']['lat'];
	?>;
    var lng = <?php echo $my_field['google_map']['lng'];
	?>;
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
<?php endif;?>
  <?php

	$map = ob_get_clean();

	$my_field['map'] = $map;

	return $my_field;
}
?>
