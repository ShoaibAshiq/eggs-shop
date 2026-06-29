<div class="title">
<?php
$title = get_field('title_for_page', $post->id);
echo $title;
?>
</div>
<div class="text">
  <?php the_content()?>
</div>

