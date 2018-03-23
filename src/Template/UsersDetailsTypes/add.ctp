<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetailsType $usersDetailsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users Details Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usersDetailsTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($usersDetailsType) ?>
    <fieldset>
        <legend><?= __('Add Users Details Type') ?></legend>
        <?php
            echo $this->Form->control('addres_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
