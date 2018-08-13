<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Newsletter $newsletter
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

           <li class="nav-item"><?= $this->Html->link(__('Edit Newsletter'), ['action' => 'edit', $newsletter->id]) ?> </li>
        <li class="nav-item"><?= $this->Form->postLink(__('Delete Newsletter'), ['action' => 'delete', $newsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('List Newsletter'), ['action' => 'index']) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?> </li>
          
    </ul>
</nav>
        </div>
<div class="col-sm-10 col-md-10 col-lg-10">

    <h3><?= h($newsletter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($newsletter->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($newsletter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($newsletter->created_date) ?></td>
        </tr>
    </table>
</div></div>

</div>
