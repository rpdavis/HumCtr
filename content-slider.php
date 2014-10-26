<?php
function slider_front_pg(){
if (!get_field('link_image')==""){
    $print_image_link = '<a href="' . get_field("link_image") . '"><img src="' . get_field( "image" ) . '" alt="slider image' . '" style="width:100%;"' . '/></a>';
}
else{
    $print_image_link= '<img src="' . get_field( "image" ) . '" alt="slider image' . '" style="width:100%;"' . '/>';
}

    $print .= '<li >';
    $print .= $print_image_link;
    $print .= '<div class="orbit-caption">';
    $print .= get_field( "caption" );
    $print .= '</div>';
    $print .= '</li>';

    echo $print;
}

?>


<?php do_action('foundationPress_before_content'); ?>
	<?php
        // argument to query the db. select events, show set # per page, oder by date, in an asending order.
            $args= array(
                'post_type'	=> 'slider'
            );
            $the_query = new WP_Query( $args );
        ?>
<?php while ( $the_query->have_posts()) : $the_query->the_post(); ?>
    <?php
    get_field( "image" );
    slider_front_pg();
  

?>
<?php endwhile;?>
