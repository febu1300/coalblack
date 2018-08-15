<?php foreach ($pictures as $post): ?>
 <div class="col-sm-4 col-md-4 col-lg-4 "> <?= h($post->id) ?></div>
  
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