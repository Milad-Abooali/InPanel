<?php include(THEME."c_aside.php"); ?>
</div>
<footer class="app-footer fixed-bottom">
		<ul class="nav navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				  <img src="<?= IMG ?>avatars/miab.png" class="img-avatar">
				  <span class="d-md-down-none">Miab</span>
				</a>
				<div class="dropdown-menu dropdown-menu-left mb-2">
					<div class="dropdown-header text-center">
						<strong>Office</strong>
					</div>
					<a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
					<a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
					<a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
					<a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>
					<div class="dropdown-header text-center">
						<strong>My Room</strong>
					</div>
					<a class="dropdown-item" href="#"><i class="fa fa-user"></i> Daily Report</a>
					<a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Sticky Notes</a>
					<a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> To do list</a>
					<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Financial Unit<span class="badge badge-secondary">42</span></a>
					<a class="dropdown-item" href="#"><i class="fa fa-file"></i> Activity Log<span class="badge badge-primary">42</span></a>
					<div class="divider"></div>
					<a class="dropdown-item" href="#"><i class="fas fa-shield"></i> Lock Account</a>
					<a class="dropdown-item" href="#"><i class="fas fa-lock"></i> Settings</a>
				</div>
			</li>
		
			<li class="nav-item dropdown d-md-down-none ml-4">
				<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
				<i class="far fa-bell"></i>
				<span class="badge badge-pill badge-danger">5</span>
				</a>
				<div class="dropdown-menu dropdown-menu-left dropdown-menu-lg mb-2">
				<div class="dropdown-header text-center">
				<strong>You have 5 notifications</strong>
				</div>
				<a class="dropdown-item" href="#">
				<i class="icon-user-follow text-success"></i> New user registered</a>
				<a class="dropdown-item" href="#">
				<i class="icon-user-unfollow text-danger"></i> User deleted</a>
				<a class="dropdown-item" href="#">
				<i class="icon-chart text-info"></i> Sales report is ready</a>
				<a class="dropdown-item" href="#">
				<i class="icon-basket-loaded text-primary"></i> New client</a>
				<a class="dropdown-item" href="#">
				<i class="icon-speedometer text-warning"></i> Server overloaded</a>
				<div class="dropdown-header text-center">
				<strong>Server</strong>
				</div>
				<a class="dropdown-item" href="#">
				<div class="text-uppercase mb-1">
				<small>
				<b>CPU Usage</b>
				</small>
				</div>
				<span class="progress progress-xs">
				<div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</span>
				<small class="text-muted">348 Processes. 1/4 Cores.</small>
				</a>
				<a class="dropdown-item" href="#">
				<div class="text-uppercase mb-1">
				<small>
				<b>Memory Usage</b>
				</small>
				</div>
				<span class="progress progress-xs">
				<div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
				</span>
				<small class="text-muted">11444GB/16384MB</small>
				</a>
				<a class="dropdown-item" href="#">
				<div class="text-uppercase mb-1">
				<small>
				<b>SSD 1 Usage</b>
				</small>
				</div>
				<span class="progress progress-xs">
				<div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
				</span>
				<small class="text-muted">243GB/256GB</small>
				</a>
				</div>
			</li>


		</ul>
    <span>
        <a class="btn" href="#"><i class="icon-speech"></i></a>
        <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
        <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
    </span>
		<ul class="nav navbar-nav ml-auto">
		
			<li class="nav-item dropdown megamenu-li">
				<a class="nav-link" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<i class="fab fa-buromobelexperte"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-center megamenu cbu mb-2" aria-labelledby="dropdown01" style="position: absolute;">

					<div class="row">
						<div class="col-4">
							<ul class="list-group list-group-flush">
							  <li class="list-group-item">Quisque hendrerit orci</li>
							  <li class="list-group-item">Maecenas dignissim iaculis </li>
							  <li class="list-group-item">Aenean ligula neque</li>
							  <li class="list-group-item">In rutrum ante tincidunt</li>
							  <li class="list-group-item">Curabitur mollis suscipit quam</li>
							</ul>
						</div>
						<div class="col-4">

						</div>

					</div>

				</div>
			</li>
		</ul>
    <span class="ml-3 small">InPanel v 1.0 © 2018 - Crafted by <a href="https://codebox.ir" title="کدباکس">CODEBOX</a></span>
	<a  id="lock"class="nav-link text-danger" href="#" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
</footer>

<!-- Form modal -->
<div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="FormModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form autocomplete="nope" class=''>
			<div class="modal-body"> </div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary savebox" data-action=''data-table=''>Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Large modal -->
<div class="modal fade modal-large" tabindex="-1" role="dialog" aria-labelledby="LargeModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"> </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Small modal -->
<div class="modal fade modal-small" tabindex="-1" role="dialog" aria-labelledby="SmallModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"> </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php include(THEME."c_foot.php"); ?>