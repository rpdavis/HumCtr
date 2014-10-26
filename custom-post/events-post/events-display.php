<?php
/*
======================
EVENTS DISPLAY
======================
functions
1. event_date()
2. events_display()
3. events_display_front()
4. events_display_monday_series()
5. display_events_single()
 */

/****************************************************
1.event_date()
 ****************************************************
display functions for events on home page, events page, and single event.*/

function event_date() {
	if (date('M Y d') == date('M Y d', strtotime(get_field('start_date')))) {
		$date = "Today, " . date('M jS', strtotime(get_field('start_date')));
	} else {
		$date = date('D', strtotime(get_field('start_date'))) . ", " . date('M jS', strtotime(get_field('start_date')));
	}

	return $date;
}

/****************************************************
2. events_display()
 ****************************************************
events.php (full view), event-page template*/

function events_display($count_id) {
	$my_field = my_fields();

	// image link: picture and linked picture size

	$size      = 'medium';
	$link_size = 'large';
	$date      = $my_field['date'];

	// image: thumnail no link

	$image = $my_field['image'];

	// set style and text length with and without an image

	if (!$my_field['image']) {
		$description_style = 'events-description-large medium-9 small-12 column';
		$string            = text_overflow(340, 'description');
	} else {
		$description_style = "medium-7 small-12 column events-description-large ";
		$string            = text_overflow(340, 'description');
	}

	// --event display---

	?>
<div class="row">
<hr />
<div class="">
 <!-- add style to external css and make border left for small screens -->
  <div class=" column small-8 medium-3 event-date-full">
    <div class="">
    <br />
        <div>
          <h6>
<?php
echo $my_field['date'];?>
</h6>
<?php
echo $my_field['time'];?>

<?php
if (!$my_field['end_time'] == "") {
		echo ' ' . '-' . ' ' . $my_field['end_time'];
	}?>
          <br/><br/>
          <small><?php
echo $my_field['location'];?></small>
        </div>
        </div>
  </div>
<?php
if (!$my_field['image'] == ""):?>
  <div class="small-4 medium-2  column right "><?php
echo $my_field['image'];?></div>
<?php
endif;?>
<div class="<?php
echo $description_style;?>">
<h5><a href= <?php
echo ' " ' . get_permalink() . ' " ';
	?>> <?php echo trim(the_title("", "", false));
	?></a></h5>
<?php echo strip_tags(trim($string));?>
</div>
</div>
</div>
<?php
}

/****************************************************
3. events_display_home()
 ****************************************************
display on homepage*/

// content-event.php (display on home page)

function events_display_home($count_id) {

	$size      = 'medium';
	$link_size = 'large';

	$my_field = my_fields();
	$date     = $my_field['date'];
	//$image = get_the_post_thumbnail($post_id, 'thumbnail');
	$text_overflow = ' <a href="#" data-reveal-id="myModal_' . $count_id . '">' . ' more info' . '</a>';
	$description   = get_field('description');
	?>
<?php

	//  limits description string length depending on wether it has a picture or not
	// set style and text length with and without an image

	if ($my_field['image'] == "") {
		$description_style = 'events-description no-pad-left no-pad-right no-pad-left';
		$string            = text_overflow(160, 'description');
	} else {
		$description_style = "large-8 medium-8 small-8 column events-description no-pad-left no-pad-right";
		$string            = text_overflow(110, 'description');
	}

	?>
<div class="row" id="post-<?php
echo $count_id?>">
    <div class=" event-info">
        <div class="event-border"></div>
<?php
if (empty($my_field['end_time'])) {
		echo $date . ' | ' . $my_field['time'];
	} else {
		echo $date . ' | ' . $my_field['time'] . ' - ' . $my_field['end_time'];
	}

	?>
    </div>
    <div class="l">
        <div class= "event-title">
            <a href="#" data-reveal-id="myModal_<?php
echo $count_id?>"> <?php
trim(the_title());?></a>

        </div>
<?php
if (!$my_field['image'] == ""):?>
      <div class="small-4 large-4 column no-pad-right right "><?php
echo $my_field['image']?></div>
<?php
endif?>
            <div class="<?php
echo $description_style;?>">
<?php
echo strip_tags(trim($string));?>

<?php
if (!$my_field['rsvp'] == "") {
		echo '<br />' . '<div style="vertical-align:bottom;"><a href="' . get_field('rsvp') . '" class="left"> RSVP </a></div> ';
	}

	?>
    </div>
    <!-- <div class="left event-location"><?php
echo $location?></div> -->
<!-- <div class="large-12 column text-right"> <?php
echo $text_overflow;?></div> -->
    </div>
</div>


<?php //------ myModal pop-up window ---------
	?>
<div id="myModal_<?php
echo $count_id;?>" class="reveal-modal modal-container" data-reveal>
  <div class=" ">
    <div class="large-8 small-12 column right">
    <h3>
        <a href="<?php
the_permalink();?>" title="<?php
the_title_attribute();?>"> <?php
echo the_title('', '', false);?></a>
    </h3>
    </div>
  </div>
<div class="row modal-content" >
<div class="large-4 column left">
  <br />
<?php
if (!$my_field['image'] == ""):?>
<div class="large-12 small-12 column large-centered  event-modal-img">
<?php
echo $my_field['image_link'] ;?>
</div>

    <br />
<?php
endif;?>

<div class="large-12 small-12 column">
<br />
    <div>
      <h6>
        <strong>Date:</strong> <?php
echo $my_field['date'];?>
</h6>
    </div>
    <div>
      <h6>
        <strong>Time: </strong>
<?php
echo $my_field['time'] . ' - ' . $my_field['end_time'];?>
      </h6>
    </div>
    <div>
      <h6>
        <strong>Location: </strong> <?php
echo $my_field['location'];?>
</h6>
<?php
if (!$my_field['rsvp'] == "") {
		echo '<p><a href="' . get_field('rsvp') . '" > RSVP </a></p>';
	}
	?>
      <?php //echo $location_google_map ;
	?>
</div>
    </div>
</div>
<br />
  <div>
    <div class= "large-8 column right">
      <hr/>
      <h4 class="subheader">

      </h4>

<?php
echo $description;?>
<hr/>
    </div>
      <a class="close-reveal-modal">&#215;</a>
    </div>
  </div>
</div>


<?php
}

/****************************************************
4. events_display_monday_series()
 ****************************************************
display on monday page*/

function events_display_monday_series($count_id) {

	$my_field = my_fields();

	// image link: picture and linked picture size

	$size      = 'medium';
	$link_size = 'large';
	$date      = $my_field['date'];

	// image: thumnail no link

	$image = $my_field['image'];

	// set style and text length with and without an image

	if (!$image) {
		$description_style = 'medium-9 small-12 column';
		$string            = text_overflow(1000, 'description');
	} else {
		$description_style = "medium-7 small-9 column  ";
		$string            = text_overflow(1000, 'description');
	}

	// --event display---

	?>
<div class="row">
<hr />
<div class="">
 <!-- add style to external css and make border left for small screens -->
  <div class=" column medium-3 "  style="min-height:8rem; border-right:solid 3px #EFE8D4; " >
    <div class="">
    <br />
        <div>
          <h6>
<?php
echo $my_field['date'];?>
</h6>
<?php
echo $my_field['time'];?>

<?php
if (!$my_field['end_time'] == "") {
		echo ' ' . '-' . ' ' . $my_field['end_time'];
	}?>
          <br/><br/>
          <small><?php
echo $my_field['location'];?></small>
        </div>
        </div>
  </div>
<?php
if (!$my_field['image'] == ""):?>
  <div class="small-3 medium-2  column right "><?php
echo $my_field['image_link'];?></div>
<?php
endif;?>
<div class="<?php
echo $description_style;?>">
  <h5><a href= <?php
echo ' " ' . get_permalink() . ' " ';
	?>> <?php the_title("", "", false);
	?></a></h5>
<?php echo $string;?>
</div>
  <div class=" medium-7 small-9 column">

    </div>
</div>
</div>

<?php
}
?>

<?php

/****************************************************
4. display_events_single()
 ****************************************************
Event single page*/

function display_events_single() {

	$my_field = my_fields();
	$size     = 'medium';
// $description = get_field( 'description' );
	// $description = preg_replace('/<\/?p>/','', $description);

	?>
<br />
<br />

      <div class=" medium-12 column">
              <div class="medium-9 small-12 column right">

              <h3>
                  <a href="#"> <?php the_title();?></a>
              </h3>
              </div>

          <div class="row" >
          <div class="medium-3 column left">
            <br />
<?php if (!$my_field['image'] == ""):?>
<div class="large-12 small-12 column large-centered  event-modal-img no-pad-left">
<?php echo $my_field['image_link'];?>
</div>
              <br />
<?php endif;?>

          <div class="large-12 small-12 column no-pad-left">
          <br />
              <div>
                <h6>
                  <strong>Date:</strong> <?php echo $my_field['date'];?>
</h6>
              </div>
              <div>
                <h6>
                  <strong>Time: </strong>
<?php echo $my_field['time'] . ' - ' . $my_field['end_time'];?>
                </h6>
              </div>

<?php if (!empty($my_field['website'])):?>
<h6>
  
<?php if (strpos($my_field['website'], 'http://') !== false):?>
    <a href="<?php echo $my_field['website'];?>"><?php echo $my_field['website'];
  ?></a>
<?php else:?>
    <a href="http://<?php echo $my_field['website'];?>"><?php echo $my_field['website'];
  ?></a>
<?php endif;?>

</h6>

<?php endif;?>

              <div>
                <h6>
                  <strong>Location: </strong> <?php echo $my_field['location'];?>
</h6>
                <div id="view1">

<?php
echo $my_field['map'];
	?>
</div>

              </div>
              </div>
          </div>
          <br />
            <div>
              <div class= "medium-9 column right">
                <hr/>

                <p>
<?php echo $my_field['description'];?>
</p>
                <hr/>
              </div>

              </div>
            </div>
</div>
<?php	}?>


