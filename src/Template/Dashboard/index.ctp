<head>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  
</head>
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
 
    <li class="nav-item"><?= $this->Html->link(__('Dashboard'), ['controller' => 'Dashboard', 'action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Bestandsverwaltung'), ['controller' => 'Transactions', 'action' => 'bestandsposten']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Versandverwaltung'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Benützerverwaltung'), ['controller'=>'Users','action' => 'index']) ?></li>
           <hr>

           <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['controller'=>'products','action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Subkatagorieliste'), ['controller'=>'subCatagories','action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Haupkatagorieliste'), ['controller'=>'ProductsCatagories','action' => 'index']) ?></li>

   

</ul>


    </div>
    <div class="col-sm-9 col-md-9 col-lg-9">
 <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
  
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$this->cell('Notification')?></h3>

              <p>Neuebestellungen</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/transactions" class="small-box-footer">Mehr info  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-document"></i>
            </div>
            <a href="#" class="small-box-footer">Mehr info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->cell('Userinfo')?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/users" class="small-box-footer">Mehr info  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mehr info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
    1. Lagerbestand
    2. Preise update
    3. modal info about the order when the order number is clicked
     
    </div>
         
    </div>
 

