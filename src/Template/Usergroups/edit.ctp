<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usergroup $usergroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usergroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usergroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usergroups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usergroups form large-9 medium-8 columns content">
    <?= $this->Form->create($usergroup) ?>
    <fieldset>
        <legend><?= __('Edit Usergroup') ?></legend>
        <?php
            echo $this->Form->control('role');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
