<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container-fluid">
<nav class="navbar navbar-expand-lg  bg-light " >
  <a class="navbar-brand" href="/dashboard">Dashboard</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      
      </li>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/transactions"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-secondary bg-danger badge-pill"><?= $this->cell('Notification') ?></span></a></li>
     
      <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="row">
   
               <div class="col-sm-2 col-md-2 col-lg-2">
<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="actions-sidebar">
    <ul class="nav nav-pills flex-column">


          
         <li class="nav-item"><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li class="nav-item"><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('List Users Detail'), ['controller' => 'UsersDetail', 'action' => 'index']) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('New Users Detail'), ['controller' => 'UsersDetail', 'action' => 'add']) ?> </li>
    </ul>
</nav>
        </div>
<div class="users view  col-sm-10 col-md-10 col-lg-10 content">     
            
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
</div>
  

<div class="row">

<div class="col-sm-10 col-md-10 col-lg-10">
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($user->transactions)): ?>
    <table class="table table-sm table-bordered "  cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Transaction Type Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Updated Date') ?></th>
                <th scope="col"><?= __('Canceled Date') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Transaction Number') ?></th>
                <th scope="col"><?= __('Transaction Status Id') ?></th>
                <th scope="col"><?= __('Payment Method Id') ?></th>
         
            </tr>
            <?php foreach ($user->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= $this->Getname->trans_type($transactions->transaction_type_id);?></td>
     
                <td><?= h($transactions->product_id) ?></td>
                <td><?= h($transactions->user_id) ?></td>
                <td><?= h($transactions->created_date) ?></td>
                <td><?= h($transactions->updated_date) ?></td>
                <td><?= h($transactions->canceled_date) ?></td>
                <td><?= h($transactions->quantity) ?></td>
                <td><?= h($transactions->price) ?></td>
                <td><?= h($transactions->transaction_number) ?></td>
                <td><?= $this->Getname->trans_status($transactions->transaction_status_id);?></td>
                <td><?= $this->Getname->paymentmethod($transactions->payment_method_id);?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users Detail') ?></h4>
        <?php if (!empty($user->users_detail)): ?>
   <table class="table table-sm table-bordered "  cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Address Line 1') ?></th>
                <th scope="col"><?= __('Address Line 2') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Postal Code') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Main Address') ?></th>
         
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->users_detail as $usersDetail): ?>
            <tr>
                <td><?= h($usersDetail->id) ?></td>
                      <td><?= $this->Getname->users($usersDetail->user_id);?></td>
  
                <td><?= h($usersDetail->address_line_1) ?></td>
                <td><?= h($usersDetail->address_line_2) ?></td>
                <td><?= h($usersDetail->city) ?></td>
                <td><?= h($usersDetail->state) ?></td>
                <td><?= h($usersDetail->postal_code) ?></td>
                <td><?= h($usersDetail->country) ?></td>
                <td><?= h($usersDetail->main_address) ?></td>
            
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UsersDetail', 'action' => 'view', $usersDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UsersDetail', 'action' => 'edit', $usersDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersDetail', 'action' => 'delete', $usersDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
