<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MainCatagory $mainCatagory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mainCatagory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mainCatagory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Main Catagories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products Catagories'), ['controller' => 'ProductsCatagories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Products Catagory'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mainCatagories form large-9 medium-8 columns content">
    <?= $this->Form->create($mainCatagory) ?>
    <fieldset>
        <legend><?= __('Edit Main Catagory') ?></legend>
        <?php
            echo $this->Form->control('main_catagory_name');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
