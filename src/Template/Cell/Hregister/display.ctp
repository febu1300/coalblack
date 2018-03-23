<div class="users form">
    <legend><?= __('DEINE VORTEILE') ?></legend>
<p>>Schneller und einfacher Bestellvorgang</p>
<p>>Schneller Zugang zu Bestellungen und Status</p>
 <div class="col-sm-9 col-md-9 col-lg-9">
    <form method='post' action='/users/hregister'>
<fieldset>
    


<label for="title-0">
    <input type="radio" name="title" value="0" id="title-0">Herr</label><br>
<label for="title-1">
    <input type="radio" name="title" value="1" id="title-1">Frau</label><br>
     

        <?= $this->Form->control('username',['label'=>false,'placeholder'=>'E-Mail*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('fname',['label'=>false,'placeholder'=>'Name*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('lname',['label'=>false,'placeholder'=>'Vorname*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('password',['label'=>false,'placeholder'=>'Passwort*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('cPassword',['label'=>false,'placeholder'=>'Passwort bestätigen*','type'=>'password','class'=>'form-control bg-light border-color']) ?><br>

</fieldset>
        
<?= $this->Form->button(__('Submit'),['value'=>"Register",'class'=>'btn btn-primary btn-sm btn-block']); ?>
    </form></div><br>
</div>