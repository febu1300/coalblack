
    <div class="col-sm-9 col-md-9 col-lg-9">

    <?= $this->Form->create($mainCatagory,['type'=>'file']) ?>
    <fieldset>

        <?php
            echo $this->Form->control('catagory_name');
      
            echo $this->Form->control('photo1',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>