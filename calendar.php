<?php

/*
Template Name: Cal
 */

get_header();

/* draws a calendar */

function draw_calendar($month, $year) {
	wp_reset_postdata();

	/* draw table */
	// deleted  data-equalizer from table
	$calendar = "";
	$calendar .= '<table cellpadding="0" cellspacing="0" class="calendar repsonsive " ><thead>';

	/* table headings */
	$headings = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	$calendar .= '<tr ><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr></thead>';

	/* days and weeks vars now ... */
	$running_day       = date('w', mktime(0, 0, 0, $month, 1, $year));
	$days_in_month     = date('t', mktime(0, 0, 0, $month, 1, $year));
	$days_in_this_week = 1;
	$day_counter       = 0;
	$dates_array       = array();

	/* formate date checker */

	/* row for week one */
	$calendar .= '<tbody><tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for ($x = 0; $x < $running_day; $x++):
		$calendar .= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for ($list_day = 1; $list_day <= $days_in_month; $list_day++):

		$calendar .= '<td class="calendar-day">';
		/* add in the day number */
		$calendar .= '<div class="day-number">' . $list_day . '</div>';
		if ($list_day < 10) {
			$date_match = $year . '/' . $month . '/' . '0' . $list_day;

		} else {
			$date_match = $year . '/' . $month . '/' . $list_day;
		}

		$args = array(
			'post_type'      => 'post_events',
			'posts_per_page' => 10,
			'orderby'        => 'start_date',
			'order'          => 'ASC',
			'meta_key'       => 'start_date',
			'meta_query'     => array(
				array(
					'key'     => 'start_date',
					'value'   => $date_match,
					'compare' => '=',
				)
			)
		);

		$the_query = new WP_Query($args);

		while ($the_query->have_posts()):$the_query->the_post();

// $calendar.= '<span data-tooltip class="has-tip tip-right" title=" Time ' . get_field("start_time") . ' - ' . get_field("end_time") . '  Location:' . get_field("location"). ' ">';
			// $calendar.= '<p class="cal-text"><a href= ' .get_permalink().' "> ' . the_title( "","", false ) . '</a> </p></span>';
			$calendar .= '<p class="cal-text"><a href= ' . get_permalink() . ' "> ' . the_title("", "", false) . '</a><span data-tooltip class="has-tip tip-bottom" title=" Time ' . get_field("start_time") . ' - ' . get_field("end_time") . '  Location:' . get_field("location") . ' ">' . '*' . '</span></p>
										';
		endwhile;
		wp_reset_postdata();

		$calendar .= '</td>';
		if ($running_day == 6):
			$calendar .= '</tr>';
			if (($day_counter + 1) != $days_in_month):
				$calendar .= '<tr class="calendar-row">';
			endif;
			$running_day       = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++;
		$running_day++;
		$day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if ($days_in_this_week < 8):
		for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar .= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar .= '</tr>';

	/* end the table */
	$calendar .= '<tbody></table>';

	/* all done, return result */
	return $calendar;
}

if (1 == 1)
//	$today_year = absint( $year_override );
{
	$month_list = array(
		1  => "January",
		2  => "Febuary",
		3  => "March",
		4  => "April",
		5  => "May",
		6  => "June",
		7  => "July",
		8  => "August",
		9  => "September",
		10 => "October",
		11 => "November",
		12 => "December",
	);
}

// really need to refactor. backwards way of getting active date so show in title and option menu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$active_y   = htmlspecialchars(trim($_POST["sc_year"]));
	$active_m   = htmlspecialchars(trim($_POST["sc_month"]));
	$selected_m = $active_m;
	$active_m   = $active_m + 1;
	$active_m   = date_create("0000-$active_m-00");

	$display_month = date_format($active_m, "F");
	$display_year  = $active_y;

	$active_m = date_format($active_m, "m");
} else {
	$active_y      = date('Y');
	$display_year  = $active_y;
	$active_m      = date('m');
	$selected_m    = date('n');
	$display_month = date('F');
//  $active_m=date_create("0000-$active_m-00");
	//$active_m = date_format($active_m,"m");
}

?>
<div class="medium-12 column scroll">
  <div class="row">
  <div class="small-12 medium-8 column left">
<?php

echo '<h2>' . $display_month . '   ' . $display_year . '</h2>';
?>
</div>
  <br/>
<form   method="POST" action="">

    <div class="medium-2 small-5 columns no-pad-right">
				<select name="sc_month">
<?php
foreach ($month_list as $key => $month_act) {
	echo '<option value="' . absint($key) . '" ' . selected($key, $selected_m, true) . '>' . esc_attr($month_act) . '</option>';
}
?>
</select>
      </div>
        <div class="medium-1 small-4 columns left no-pad-left">
				<select name="sc_year">
<?php
$start_year = date('Y') - 1;
$end_year   = $start_year + 5;
$years      = range($start_year, $end_year, 1);
foreach ($years as $year) {
	echo '<option value="' . absint($year) . '" ' . selected($year, $active_y, true) . '>' . esc_attr($year) . '</option>';
}
?>
				</select>
      </div>

    <div class="small-3 medium-1 columns left no-pad-left">
				<input id="sc_submit" type="submit" class="button" style="background:#007295; color:#fff; height:2.3125rem; padding:0; width:100%;" value="<?php _e('Go', 'pippin_sc');?>"/>
				<input type="hidden" name="action" value=""/>
				<input type="hidden" name="category" value="<?php echo is_null($category) ? 0 : $category;?>"/>
				<input name="sc_nonce" type="hidden" value="<?php echo wp_create_nonce('sc_calendar_nonce')?>" />


    </div>
	</form>
  </div>

<?php
wp_reset_postdata();
echo draw_calendar($active_m, $active_y);

?>
</div>
<?php get_footer();?>
