<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetail $usersDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users Detail'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersDetail form large-9 medium-8 columns content">
    <?= $this->Form->create($usersDetail) ?>
    <fieldset>
        <legend><?= __('Add Users Detail') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('address_line_1');
            echo $this->Form->control('address_line_2');
            echo $this->Form->control('city');
            echo $this->Form->control('state');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('country');
            echo $this->Form->control('main_address');
            echo $this->Form->control('billing_adress_1');
            echo $this->Form->control('billing_adress_2');
            echo $this->Form->control('billing_postal_code');
            echo $this->Form->control('billing_city');
            echo $this->Form->control('billing_state');
            echo $this->Form->control('billing_country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
