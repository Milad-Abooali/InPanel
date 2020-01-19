<?php include(THEME."c_head.php"); ?>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand animated slideInLeft" href=""></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-state=''>
            <span class="navbar-toggler-icon"></span>
        </button>	
		<ul class="nav navbar-nav d-md-down-none">
			<li class="nav-item px-3">
				<a class="nav-link" href="#">Dashboard</a>
			</li>
			<li class="nav-item px-3">
				<a class="nav-link" href="#">Users</a>
			</li>
			<li class="nav-item px-3">
				<a class="nav-link" href="#">Settings</a>
			</li>
		</ul>
		<ul class="nav navbar-nav ml-auto">
 			<li class="nav-item px-3">
				<div id='gloading-ajax' class='small animated bounceIn text-info'><i class="fas fa-spinner fa-pulse"></i>  Connecting . . . </div>
			</li>
<!--
			<li class="nav-item d-md-down-none">
				<a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
			</li>
-->
        </ul>
    <button class="navbar-toggler aside-menu-toggler" type="button" data-state=''>
      <span class="navbar-toggler-icon"></span>
    </button>
    </header>
    <div class="app-body">
    <?php include(THEME."c_sidebar.php"); ?>
