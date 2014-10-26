<?php get_header();?>
<?php
function grants_display() {

	?>


    <tr>

      <td>
      <a href="<?php echo get_permalink();?>">  <?php echo date('m/d/y', strtotime(get_field('due_date')));
	?></a>
      </td>
      <td>
        <a href="<?php echo get_permalink();?>"><?php echo the_title('', '', false);
	?></a>
      </td>
      <td>
      <a href="<?php echo get_permalink();?>">  <?php echo get_field('eligibility');
	?></a>
      </td>
      <td>
        <a href="<?php echo get_permalink();?>"><?php echo get_field("amount");
	?></a>
      </td>
  <tr>

<?php

}?>
<div class="row">
<?php $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));?>
  <div id="container">
    <div id="content" role="main">

      <h1 class="page-title"><?php echo $term->name;?> Grants</h1>

    <h3 class="archive-title"><?php $the_tax = get_taxonomy(get_query_var('taxonomy'));
echo $the_tax->labels->slug;?></h3>
<div class="pagehead-border">
  <hr />
</div>

  <div class="small-12 large-9 columns" role="main">
<table style="width:100%;">
  <th>
    due date
  </th>
  <th>
    title
  </th>
  <th>
    eligiblity
  </th>
  <th>
    amount
  </th>
<?php if (have_posts()):?>
        <?php while (have_posts()):the_post();?>


	<?php
	echo grants_display();?>

	<?php endwhile;?>
      <?php endif;?>
</table>

    </div><!-- #content -->

  </div><!-- #container -->
</div>

<?php get_sidebar();?>
</div>


<?php get_footer();?>
