<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiscountsType $discountsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $discountsType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $discountsType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Discounts Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="discountsTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($discountsType) ?>
    <fieldset>
        <legend><?= __('Edit Discounts Type') ?></legend>
        <?php
            echo $this->Form->control('discount_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
