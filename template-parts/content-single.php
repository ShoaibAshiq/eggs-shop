<?php
$img      = get_post_featured_image( $post->ID, 'full', TRUE );
$text_log = get_field( 'text_with_logo', $post->ID ); ?>
<?php $content = get_the_content() ?>
<div class="blog__head">
<a href="<?php the_permalink() ?>"><img <?php if(empty($content)) echo 'style="float: unset;"'?>src="<?php echo $img; ?>"></a>
  <div><?php echo $text_log; ?>
  </div>
</div>

<div class="content-text">
<?php $content = strip_tags( $content, '<img><div><strong>' ) ?>
	<?php echo $content ?>
</div>


