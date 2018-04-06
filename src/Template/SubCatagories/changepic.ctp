
    <div class="col-sm-9 col-md-9 col-lg-9">

    <?= $this->Form->create($subCatagory,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Edit Products Catagory') ?></legend>
        <?php
            echo $this->Form->control('catagory_name');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
            echo $this->Form->control('photo1',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>