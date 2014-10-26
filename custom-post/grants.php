<!-- <div class="small-12 medium-12 column "> -->

<div class="row panel">

<?php
$page = 'find a grant';

function grants_display($count_id) {
	$my_field = my_fields();
	?>
<tr>
<td>
<?php echo $my_field['grant_date'];?>
</td>
<td>
<a href="<?php echo get_permalink();?>"><?php echo the_title('', '', false);
	?></a>
 <div class="right view-link hide-for-small"><a href="#" data-reveal-id="myModal_<?php
echo $count_id?>"> preview</a></div>

</td>
<td class="show-for-medium-up">
<?php echo $my_field['eligibility'];?>
</td>
<td class="show-for-medium-up">
<?php echo $my_field['grant_type'];?>
</td>

<td>
<?php echo $my_field['amount'];?>
</td>
</tr>

<?php

// modal --------------

	?>

<div id="myModal_<?php
echo $count_id;?>" class="reveal-modal modal-container" data-reveal>
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
<!-- <a href="#eligibility_info"> - Eligibility Info</a> -->
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
<?php echo $my_field['description'];?>
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
<?php }?>


<?php do_action('foundationPress_before_content');?>

<?php

// argument to query the db. select events, show set # per page, oder by date, in an asending order.
$date_1 = date('Ymd');
$args   = array(
	'post_type' => 'post_grants',

	'orderby'    => "due_date",
	'order'      => "ASC",
	'meta_key'   => "due_date",
	'meta_query' => array(
		array(
			'key'     => 'due_date',
			'value'   => $date_1,
			'compare' => '>=',
		)
	)
);
$the_query = new WP_Query($args)
?>
<div class="row scroll" >
<table id="dataTable" class="dataTable"  style="min-width:30rem;">
<thead>
<tr>
  <th style="width:7rem;">
    Due Date
  </th>
  <th style="width:22rem;">
  title
  </th>
  <th style="width:7rem;" class="show-for-medium-up">
      Eligibility
  </th>

  <th style="width:7rem;" class="show-for-medium-up">
   Grant Type
  </th>

  <th  style="width:7rem;">
    Amount
  </th>
</tr>
</thead>
<tbody>
<?php $count_id = "";?>
<?php while ($the_query->have_posts()):$the_query->the_post();?>

	<?php

	grants_display($count_id);

	$count_id++;
	?>



	<?php endwhile;

?>
</tbody>
</table>
</div>
</div>
<!-- </div> -->
