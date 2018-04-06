
    <div class="col-sm-9 col-md-9 col-lg-9">

    <?= $this->Form->create( $picture,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Picture') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
            echo $this->Form->control('photo1',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>