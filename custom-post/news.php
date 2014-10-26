<div class="large-12 column">
<?php

//-----display news full page -------
  function news_display(){
    $my_field = my_fields();
    $size = 'thumbnail';
    //$image = get_the_post_thumbnail($post_id, $size);
      $string = text_overflow(370, 'description');
      ?>
      <dl>
        <dt>
          <a href="<?php echo get_permalink(); ?>"> <?php echo the_title( '','', false ) ;?></a>
        </dt>
        <?php if($my_field['image']!=''):?>

          <dd class="medium-12 small-12 column no-pad-left no-pad-right">
            <div class= "large-3 medium-3 right hide-for-small-only column" ><?php echo $my_field['image'];?></div>
          <?php else: ?>
            <dd class="large-12 small-12 column no-pad-left no-pad-right">
            <?php endif ;?>
            <span><?php echo $string ;?></span>
          </dd>
        </dl>
        <br /><hr />
  <?php }?>

  <?php do_action('foundationPress_before_content'); ?>
  <?php
  // argument to query the db. select events, show set # per page, oder by date, in an asending order.
  $args= array(
    'post_type'	=> 'post_news',
    'posts_per_page'=> 10
  );
  $the_query = new WP_Query( $args );
  ?>
  <?php while ( $the_query->have_posts()) : $the_query->the_post(); ?>
    <?php news_display();

    ?>
  <?php endwhile;?>
</div>
