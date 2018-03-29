<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" onclick="this.classList.add('hidden');">
<div class="alert alert-dismissible alert-warning" >
  <button type="button" class="close"  data-dismiss="alert">&times;</button>
  <strong></strong> <a href="#" class="alert-link"><?= $message ?></a>.
</div>
</div>