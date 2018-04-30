<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usergroup $usergroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Usergroups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usergroups form large-9 medium-8 columns content">
    <?= $this->Form->create($usergroup) ?>
    <fieldset>
        <legend><?= __('Add Usergroup') ?></legend>
        <?php
            echo $this->Form->control('role');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
