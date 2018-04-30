<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="navbar navbar-expand-lg  bg-light " >
  <a class="navbar-brand" href="/dashboard">Dashboard</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      
      </li>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/transactions"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-secondary bg-danger badge-pill"><?=$this->cell('Notification')?></span></a></li>
     
      <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
 <div class="col-sm-3 col-md-3 col-lg-3 ">
 

<ul class="nav nav-pills flex-column">
 
    <li class="nav-item"><?= $this->Html->link(__('Neue Benützer hinzufügen'), ['controller'=>'Users','action' => 'add']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Bestandsverwaltung'), ['controller' => 'Transactions', 'action' => 'bestandsposten']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Lagerverwaltung'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Benützerverwaltung'), ['controller'=>'Users','action' => 'index']) ?></li>
           <hr>

           <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['controller'=>'products','action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Subkatagorieliste'), ['controller'=>'subCatagories','action' => 'index']) ?></li>
     <li class="nav-item"><?= $this->Html->link(__('Haupkatagorieliste'), ['controller'=>'ProductsCatagories','action' => 'index']) ?></li>

   

</ul>


    </div>
<div class="col-sm-9 col-md-9 col-lg-9 ">

    <h3><?= __('Users') ?></h3>
    <table class="table table-sm table-bordered " cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div>