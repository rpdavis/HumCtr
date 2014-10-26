<?php get_header();?>
<!--  sub-menu -->

<?php dynamic_sidebar('sub');?>

<?php do_action('foundationPress_before_content');?>
<?php do_action('foundationPress_after_content');?>

<?php

function display_grant_single() {
	$my_field = my_fields();

	//  $text_overflow = ' ...<a href="#" data-reveal-id="myModal_' . $count_id . '">' . ' (more)' .'</a>';
	//$title=get_field( 'title' );
	$contact             = get_field('contact');
	$email               = get_field('email');
	$website             = get_field('website');
	$amount              = get_field('amount');
	$event_date_field    = get_field('due_date');
	$event_date          = date('M jS', strtotime(get_field('due_date')));
	$event_date_day      = date('D', strtotime(get_field('due_date')));
	$event_date_month_yr = date('M jS', strtotime(get_field('due_date')));
	$image               = get_field('image');
	$description         = get_field('description');
	$description         = preg_replace('/<\/?p>/', '', $description);

	if (date('M Y d') == date('M Y d', strtotime($event_date_field))) {
		$date = "Today, " . $event_date;
	} else {
		$date = $event_date_day . ", " . $event_date_month_yr;
	}
	?><br /><br />
            <div class=" medium-12 column">
              <div class="medium-8 small-12 column left ">

              <h3>
                  <a href="<?php get_permalink();?> '"> <?php the_title();?> </a>
              </h3>
              </div>

          <div class="row" >

          <div class="medium-3 column right no-pad-right no-pad-left">

<div class=" column no-pad-right grant-sidebar"  >

          <div class="large-12 small-12 column  no-pad-left">
          <br />
              <div>
               <h6>
                  <strong>Due Date:</strong> <?php echo $my_field['grant_date'];?>
</h6>
              </div>
              <div>
                <h6>
                  <strong>Amount: </strong>
<?php echo $my_field['amount']?>
                </h6>
              </div>
              <div>
                <h6>
                  <strong>Contact: </strong> <?php echo $my_field['contact'];?>
</h6>
<?php if (!empty($email)):?>
                <p><h6><strong><u>Email </u></strong></h6> <?php echo $my_field['email'];?></p>
<?php endif;?>
<?php if (!empty($my_field['website'])):?>
<p><h6>
  <strong><u>Website </u></strong></h6>
<?php if (strpos($my_field['website'], 'http://') !== false):?>
		<a href="<?php echo $website;?>"><?php echo $my_field['website'];
	?></a>
<?php else:?>
		<a href="http://<?php echo $website;?>"><?php echo $my_field['website'];
	?></a>
<?php endif;?>



<?php endif;?>
<p>
                 <h6>
                  <strong>Sponsor: </strong> </h6>  <?php echo $my_field['sponsor'];?>
</p>
             <hr />
                  <h6 style="background: #d8b543; padding:.5rem;">
                  <strong>Eligibility: </strong>
                  </h6>
                  <p>
<?php echo $my_field['eligibility'];?>
</p>

<div>
<a href="#eligibility_info"> - Eligibility Info</a>
</div>


              </div>
              </div>
          </div>
        </div>
          <br />
            <div>
              <div class= "medium-9 small-12 column   left">


<hr />
                <h4 class="subheader">

                </h4>
                <p>
<?php echo $description;?>
</p>
<hr/>
<div class=" panel" id="eligibility_info" >

<h6><strong>Eligibility Details: </strong></h6>

<p>
<?php echo $my_field['eligibility_info'];?>
</p>
</div>
</div>
</div>
</div>
</div>
<?php	}?>
  <?php while (have_posts()):the_post();?>
																		    <article <?php post_class()?> id="post-<?php the_ID();?>">

	<?php	echo display_grant_single();?>
	<footer>
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>'));?>
																				    <p><?php the_tags();?></p>
																																																																	      </footer>

																																																																	    </article>
	<?php endwhile;?>

<?php do_action('foundationPress_after_content');?>


<?php get_footer();?>
