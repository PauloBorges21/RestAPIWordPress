<?php wp_head();?>
<p>api</p>
<?php
$args = array(
    'post_type' => 'produto',
    'numberposts' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
    'include' => array(),
    'suppress_filters' => true,


);
//inicio do loop de posts
$my_query = new Wp_Query($args);
$my_posts = get_posts($args);

foreach ($my_posts as $post) : setup_postdata($post);

    $my_query = new Wp_Query($args);
    $my_posts = get_posts($args);

    $title = get_the_title($post->ID, '', '', false);

	$post_metas = get_post_meta(get_the_ID());
	
    ?>


<?php endforeach; ?>
<?php wp_footer();?>
