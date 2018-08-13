<?php foreach ($pictures as $post): ?>
  <h1><?= h($post->id) ?></h1>
<?php endforeach; ?>

<div id="ajax-content"></div>
<script>

$.get({
  url: 'upload',
  success:function(data){
  $('#ajax-content').html(data);
  }
});
</script>