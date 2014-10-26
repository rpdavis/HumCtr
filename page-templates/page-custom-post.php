<?php
/*

Template Name: columns

 */
?>
<?php
function repeater_field_sort() {
	$my_field     = my_fields();
	$even_columns = "";
}
function repeater_field() {
	$my_field = my_fields();
	// check for rows (parent repeater)
	$even_columns = "";
	$wrap_class   = '';
	$row_space    = ' ';

	$custom_layouts = array(get_field('custom_layout'), get_field('custom_layout_2'), get_field('custom_layout_3'));
foreach ($custom_layouts as $layout) {
switch($layout){
	case "small-image and text":
			$pre_field  = "";
			$post_field = "";
			$add_row    = "yes";
			$row_type   = "small_image_and_text";
			$col_size_1 = "medium-2 ";
			$col_size_2 = " column medium-9 ";
			$size       = 'thumbnail';
			$wrap_class = ' column small-12 medium-12 no-pad-left no-pad-right ';
	break;
	case "medium-image and text":
			$pre_field  = "";
			$post_field = "";
			$add_row    = "yes";
			$row_type   = "medium_image_and_text";
			$wrap_class = ' column small-12 medium-12 no-pad-left no-pad-right ';
			$col_size_1 = "medium-3 ";
			$col_size_2 = " column medium-8";
			$size       = 'medium';
	break;
	case "large-image and text":
	$pre_field  = "";
			$post_field = "";
			$add_row    = "yes";
			$col_size_1 = "medium-5 ";
			$col_size_2 = " column medium-7";
			$size       = 'large';
	break;
	case "two":
			$pre_field  = '<div class"row" data-equalizer>';
			$post_field = '</div> ';
			$add_row    = "no";
			$row_type   = "two_columns";
			$col_size_1 = "medium-4 no-pad-left";
			$col_size_2 = "medium-12 no-pad-left no-pad-right";
			$size       = 'thumbnail';
			$wrap_class = ' column small-12 medium-6 custom_page_col_format  ';
	break;
	case "three":
			$pre_field  = '<div class"row" data-equalizer>';
			$post_field = '</div>';
			$add_row    = "no";
			$row_type   = "three_columns";
			$col_size_1 = "medium-0 no-pad-left no-pad-right";
			$col_size_2 = " column medium-12 no-pad-left no-pad-right";
			$size       = 'thumbnail';
			$wrap_class = ' column small-12 medium-4 custom_page_col_format ';
	break;
	case "small-image and text":
	$pre_field  = '<div class"row">';
			$post_field = '</div>';
			$add_row    = "no";
			$col_size_1 = "medium-12 no-pad-left no-pad-right";
			$col_size_2 = " column medium-12 no-pad-left no-pad-right";
			$size       = 'thumbnail';
			$wrap_class = ' column small-12 medium-3 panel ';
	break;
	default:
	$layout = false;;
	break;
}
?>

<div>

<?php

		// check for rows (sub repeater)
		if (have_rows($row_type)&$layout != false):?>
<?php
echo $pre_field;
		// loop through rows (sub repeater)
		while (have_rows($row_type)):the_row();
// echo "has small_image_and_text";
			// display each item as a list - with a class of completed ( if completed )
			?>
<?php

			if ($add_row == "yes") {
				$displays= get_sub_field('display');
				if ($displays != ""){
					echo '<div class="row"><br />';
				}
				else{
				echo '<div class="row"><hr />';
			}
			}
			if (get_sub_field('heading') != "") {echo '<h3 style="color:#aaa; float:left; border-bottom:#aaa 2px solid;margin-bottom:2rem;">' . get_sub_field('heading') . "</h3><br /><br />";}
			?>
															                  <div class= "<?php echo $wrap_class . get_sub_field('background');?>" data-equalizer-watch>
	<?php if (null !== get_sub_field('re_image')) {?>
															                  <div class="column small-8   <?php echo $col_size_1;?>">
	<?php
	echo wp_get_attachment_image(get_sub_field('rf_image'), $size);
				?>
	</div>
	<?php }?>
															                  <div class=" small-12  <?php echo $col_size_2;?>">
															                    <h3>
	<?php echo get_sub_field('title');?>
	</h3>
															                    <p>
	<?php echo trim(get_sub_field('description'));?>
	</p>

															                  </div>
															                </div>

	<?php if ($add_row == "yes") {echo '</div>';}?>

	<?php endwhile;?>
                <?php echo $post_field;?>

<?php endif;//if( get_sub_field('items') ): ?>
</div>



<?php
}
}

?>
<?php get_header();?>
<?php do_action('foundationPress_before_content');?>
<?php do_action('foundationPress_after_content');?>

<br />
<div class="">
  <div class="medium-12 column">
    <h2><?php echo the_title('', '', false);?></h2>
  </div>
<div class="pagehead-border">
  <hr />
</div>
</div>
<div class="small-12 medium-12 columns left" role="main">
  <div class="entry-content">
    <div class="row">
      <div class="columns">
<?php while (have_posts()):the_post();?>
	<?php the_content();?>
															<?php repeater_field();?>
															          <?php do_action('foundationPress_page_before_entry_content');?>
	<div class="entry-content">
	<?php
	?>
	</div>
	<?php do_action('foundationPress_after_content');?>
	<?php endwhile;?>
        <!-- <?php echo get_template_part('custom-post/events-post/' . 'custom_page_content');?>-->
      </div>
    </div>
  </div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer();?>
