<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Test'), ['action' => 'edit', $test->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Test'), ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete # {0}?', $test->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tests'), ['controller' => 'Tests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test'), ['controller' => 'Tests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tests view large-9 medium-8 columns content">
    <h3><?= h($test->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Catagory Name') ?></th>
            <td><?= h($test->catagory_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($test->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($test->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($test->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Test Id') ?></th>
            <td><?= $this->Number->format($test->test_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tests') ?></h4>
        <?php if (!empty($test->tests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Catagory Name') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Test Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($test->tests as $tests): ?>
            <tr>
                <td><?= h($tests->id) ?></td>
                <td><?= h($tests->catagory_name) ?></td>
                <td><?= h($tests->photo_dir) ?></td>
                <td><?= h($tests->photo) ?></td>
                <td><?= h($tests->test_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tests', 'action' => 'view', $tests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tests', 'action' => 'edit', $tests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tests', 'action' => 'delete', $tests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
