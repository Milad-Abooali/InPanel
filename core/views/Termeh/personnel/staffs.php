<?php 
	$PAGE['Chead'] .="

					";
	$PAGE['Cfoot'] .="
						<script>
		
									
						</script>
					";
	include(THEME."c_header.php");
?>   
<main class="main">
<!-- BreadCrumb -->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">InPanel</li>
		<li class="breadcrumb-item"> Personnel</li>
		<li class="breadcrumb-item active"> Staffs</li>
		
		<li class="breadcrumb-menu d-md-down-none">
			<button type="button" class="btn btn-light modalbox" data-box="testtest"><i class="icon-plus"></i> Add Staff</button>
			
			
			<button type="button" class="btn btn-light modalbox" data-box="addNewStaff"><i class="icon-plus"></i> Add Staff</button>
			<button type="button" class="btn btn-light modalbox" data-box="addNewRole"><i class="icon-plus"></i> New Role</button>
			<button type="button" class="btn btn-light modalbox" data-box="addNewDep"><i class="icon-plus"></i> New Department</button>
		</li>
	</ol>
<!-- Page Content -->
	<div class="container-fluid">
		<div class="row">


			<div id="vw-staffs" class="col-md-6">
				<div  id="v-staffs" class="card">
					<div class="card-header">
						<i class="icon-user-following"></i> Staffs 
						( <strong><?= $this->__['STAFF']['COUNT'] ?></strong>
						<?php if ($this->__['STAFF']['COUNT_ACTIVE']>0) { ?>,<strong class='text-success'> <?= $this->__['STAFF']['COUNT_ACTIVE'] ?></strong> Active <?php } ?>
						<?php if ($this->__['STAFF']['COUNT_DISABLED']) { ?>,<strong class='text-warning'> <?= $this->__['STAFF']['COUNT_DISABLED'] ?></strong> Disabled <?php } ?>
						) 
					</div>
					<div class="card-body">
					  <table class="table table-bordered table-striped table-sm">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Status</th>
							<th>Name</th>
							<th>Role</th>
							<th>Department</th>
							<th>Manage</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
						if ($this->__['STAFF']['LIST']) { 
						foreach ($this->__['STAFF']['LIST'] as $_Item) { ?>
						  <tr id="tr-<?= $_Item['id'] ?>">
							<td><?= $_Item['id'] ?></td>
							<td>
								<label class="switch switch-sm switch-icon switch-success switch">
									<input type="checkbox" class="switch-input do-setStatus" data-table="staffs" data-id="<?= $_Item['id'] ?>" <?php echo ($_Item['status']) ? 'checked' : NULL; ?>  >
									<span class="switch-label" data-on="✓" data-off="✕"></span>
									<span class="switch-handle"></span>
								</label>
							</td>
							<td><?= $_Item['name'] ?></td>
							<td><?= M3::dbCol ('staffs_roles',$_Item['role'] ,'name') ?></td>
							<td><?php
							 foreach (explode(",",$_Item['departments']) as $id) {
								echo M3::dbCol ('staffs_departments', $id,'name').' ';
							 }
							  ?></td>
							<td>
								<button class="btn btn-primary btn-sm modalbox" data-box="editStaff" data-get="&id=<?= $_Item['id'] ?>"><i class="fa fa-edit fa-lg"></i> Edit</button>
								<button class="btn btn-outline-danger btn-sm float-right do-delete" data-table="staffs" data-id="<?= $_Item['id'] ?>" data-name="<?= $_Item['name'] ?>" data-toggle="tooltip" data-placement="right" title="Remove Staff"><i class="icon-close"></i></button>
							</td>
						  </tr>
						<?php } } else { ?>
							<tr><td colspan='6'> No Recored</td></tr>
						<?php } ?>
						</tbody>
					  </table>
					</div>
				</div>
			</div>
			
			<div id="vw-staffs_roles" class="col-md-3">
				<div  id="v-staffs_roles" class="card">
					<div class="card-header">
					<i class="icon-user-following"></i> Roles 
						( <strong><?= $this->__['ROLES']['COUNT'] ?></strong> ) 
					</div>
					<div class="card-body">
					  <table class="table table-bordered table-striped table-sm">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Name</th>
							<th>Manage</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
						if ($this->__['ROLES']['LIST']) {
						foreach ($this->__['ROLES']['LIST'] as $_Item) { ?>
						  <tr id="tr-<?= $_Item['id'] ?>">
							<td><?= $_Item['id'] ?></td>
							<td><?= $_Item['name'] ?></td>
							<td>
								<button class="btn btn-primary btn-sm modalbox" data-box="editRole" data-get="&id=<?= $_Item['id'] ?>"><i class="fa fa-edit fa-lg"></i> Edit</button>
								<button class="btn btn-outline-danger btn-sm float-right do-delete" data-table="staffs_roles" data-id="<?= $_Item['id'] ?>" data-name="<?= $_Item['name'] ?>" data-toggle="tooltip" data-placement="right" title="Remove Role"><i class="icon-close"></i></button>
							</td>
						  </tr>
						<?php } } else { ?>
							<tr><td colspan='6'> No Recored</td></tr>
						<?php } ?>
						</tbody>
					  </table>
					</div>
				</div>
			</div>
			
			
			<div id="vw-staffs_departments" class="col-md-3">
				<div  id="v-staffs_departments" class="card">
					<div class="card-header">
					<i class="icon-user-following"></i> Departments 
						( <strong><?= $this->__['DEP']['COUNT'] ?></strong> ) 
					</div>
					<div class="card-body">
					  <table class="table table-bordered table-striped table-sm">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Name</th>
							<th>Manage</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
						if ($this->__['DEP']['LIST']) {
						foreach ($this->__['DEP']['LIST'] as $_Item) { ?>
						  <tr id="tr-<?= $_Item['id'] ?>">
							<td><?= $_Item['id'] ?></td>
							<td><?= $_Item['name'] ?></td>
							<td>
								<button class="btn btn-primary btn-sm modalbox" data-box="editDep" data-get="&id=<?= $_Item['id'] ?>"><i class="fa fa-edit fa-lg"></i> Edit</button>
								<button class="btn btn-outline-danger btn-sm float-right do-delete" data-table="staffs_departments" data-id="<?= $_Item['id'] ?>" data-name="<?= $_Item['name'] ?>" data-toggle="tooltip" data-placement="right" title="Remove Role"><i class="icon-close"></i></button>
							</td>
						  </tr>
						<?php } } else { ?>
							<tr><td colspan='6'> No Recored</td></tr>
						<?php } ?>
						</tbody>
					  </table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</main>
<?php include(THEME."c_footer.php"); ?>