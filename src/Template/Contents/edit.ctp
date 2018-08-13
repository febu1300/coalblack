<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $content->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $content->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="contents form large-9 medium-8 columns content">
    <?= $this->Form->create($content) ?>
    <fieldset>
        <legend><?= __('Edit Content') ?></legend>
        <?php
          echo $this->Form->control('lable');
            echo $this->Form->control('link_page');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
