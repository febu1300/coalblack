<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-dismissible alert-success" >
  <button type="button" class="close"  data-dismiss="alert">&times;</button>
  <strong></strong> <a href="#" class="alert-link"><?= $message ?></a>.
</div>
