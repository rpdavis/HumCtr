<?php
/*



*/
?>
<?php //custome event display-----------------------------;
//#fffaee

date_default_timezone_set('America/Los_Angeles');
function news_front_pg(){
  $my_field = my_fields();
$size = 'thumbnail';
//$image = get_the_post_thumbnail($post_id, $size);

  $text_overflow = ' ...<a href="' . get_permalink() . '">' . ' full-text' .'</a></p>';
  if(strlen(get_field( 'description' ) ) > 270){
    $string= substr(get_field( 'description' ), 0, 270) . $text_overflow;
  }
  else{
    $string =get_field( 'description' );
  }
  ?>
  <dl>
    <dt>
      <a href="<?php echo get_permalink(); ?>"> <?php echo the_title( '','', false ) ;?></a>
      <br />
      <small><?php echo get_field("author"); ?> </small>
    </dt>
    <?php if($my_field['image'] !=''):?>

      <dd class="large-12 medium-12 small-12 column no-pad-left no-pad-right">
      <div class= "large-3 medium-3 right hide-for-small-only column" ><?php echo $my_field['image'];?></div>
      <?php else: ?>
        <dd class="large-12 medium-12 small-12 column no-pad-left no-pad-right">
        <?php endif ;?>
        <span><?php echo $string ;?></span>
      </dd>
    </dl>
    <br /><hr />

    <?php } ?>

    <?php do_action('foundationPress_before_content'); ?>
    <?php
    // argument to query the db. select events, show set # per page, oder by date, in an asending order.
    $args= array(
      'post_type'	=> 'post_news',
      'posts_per_page'=> 3
    );
    $the_query = new WP_Query( $args );
    ?>
    <?php while ( $the_query->have_posts()) : $the_query->the_post(); ?>
      <?php news_front_pg();

      ?>
    <?php endwhile;?>
