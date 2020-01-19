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
			<button type="button" class="btn btn-light modalbox" data-box="addNewRole"><i class="icon-plus"></i> Add Notes</button>
			<button type="button" class="btn btn-light modalbox" data-box="addNewStaff"><i class="icon-plus"></i> New Ticket</button>
			<button type="button" class="btn btn-light modalbox" data-box="addNewStaff"><i class="icon-plus"></i> New Order</button>
		</li>
	</ol>
<!-- Page Content -->
	<div class="container-fluid">
		<div class="row">

			<div id="vw-summery" class="col-md-4">
				<div id="v-summery" class="card">
					<div class="card-header">
						<i class="icon-user"></i> <?= $this->__['USER']['f_name'].' '.$this->__['USER']['l_name'] ?>
						<label class="float-right switch switch-xs switch-icon switch-success switch">
							<input type="checkbox" class="switch-input do-setStatus" data-table="summery" data-id="<?= $this->__['USER']['id']?>" <?= (!$this->__['USER']['status']) ?: 'checked' ?>>
							<span class="switch-label" data-on="✓" data-off="✕"></span>
							<span class="switch-handle"></span>
						</label>
 					</div>

					<div class="col-md-12 m-3">
						<div class="row">
							<div class="col-md-6">
								Verified:
								<i class="<?= M3::vColor($this->__['USER']['v_email']) ?> fas fa-fw fa-at" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Email"></i>
								<i class="<?= M3::vColor($this->__['USER']['v_ncod']) ?> far fa-fw fa-address-card" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="National Code"></i>
								<i class="<?= M3::vColor($this->__['USER']['v_mobile']) ?> fas fa-fw fa-mobile-alt" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Mobile"></i>
								<i class="<?= M3::vColor($this->__['USER']['refrerr']) ?> fas fa-fw fa-user-check" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Mediator"></i>
								<i class="<?= M3::vColor($this->__['USER']['v_pass']) ?> fas fa-fw fa-passport" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Passport"></i>
								<i class="<?= M3::vColor($this->__['USER']['v_phone']) ?> fas fa-fw fa-phone-square-alt" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Phone"></i>
								<i class="<?= M3::vColor($this->__['USER']['v_bank']) ?> far fa-fw fa-credit-card" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bank"></i>
							</div>
							<div class="col-md-6">
								Groups:
								<?php foreach ($this->__['USER']['groups'] as $item) { ?>
								<i class="fas fa-fw fa-bookmark" style="color:#<?= $item['color'] ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $item['name'] ?>"></i>
								<?php } ?>
							</div>
						</div>
					</div>

					<ul class="nav nav-tabs" id="pills-tab" role="tablist">
						  <li class="nav-item">
								<a class="nav-link active" id="pills-parent-tab" data-toggle="pill" href="#pills-Summery" role="tab" aria-controls="pills-Summery" aria-expanded="true">Summery</a>
						  </li>
						  <li class="nav-item">
								<a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false">Settings</a>
						  </li>
						  <li class="nav-item">
								<a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false">Groups</a>
						  </li>
						  <li class="nav-item">
								<a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false">Action</a>
						  </li>
					</ul>
					
					<div class="m-3" id="pills-tabContent">
					  <div class="tab-pane active fade show" id="pills-Summery" role="tabpanel" aria-labelledby="pills-Summery-tab" aria-expanded="false">
							<h3><?= $this->__['USER']['f_name'].' '.$this->__['USER']['l_name'] ?>
							<img src="<?= IMG.$this->__['USER']['path'].'cbavatar.png' ?>" class="img-avatar float-right ml-2" data-toggle="tooltip" data-placement="bottom" data-original-title="CB Avatar">
							<img src="https://s.gravatar.com/avatar/<?= md5($this->__['USER']['email']); ?>" class="img-avatar float-right" data-toggle="tooltip" data-placement="bottom" data-original-title="Gr Avatar">
							</h3>
							<table class="table table-sm">
								<tbody>
									<tr>
										<td>Credit:</td>
										<td><i class="far fa-fw fa-money-bill-alt"></i> <strong class="text-primary"><?= M3::nf($this->__['USER']['credit']) ?></strong>
										<i class="icon-settings float-right" data-toggle="tooltip" data-placement="bottom" data-original-title="Manage Credites"></i></td>
									</tr>
									<tr>
										<td>CB Points:</td>
										<td><i class="far fa-fw fa-gem"></i> <strong class="text-warning"><?= M3::nf($this->__['USER']['cbpoint']) ?></strong>
										<i class="icon-settings float-right" data-toggle="tooltip" data-placement="bottom" data-original-title="Manage Points"></i></td>
									</tr>
									<tr>
										<td>Registeration:</td>
										<td><?= $this->__['USER']['timestamp'] ?></td>
									</tr>
									<tr>
										<td>Last Login:</td>
										<td><?= $this->__['USER']['lastlogin'] ?>
										<i class="fas fa-fw fa-history float-right" data-toggle="tooltip" data-placement="bottom" data-original-title="Activity"></i>
										</td>
									</tr>
								</tbody>
							</table>
							<table class="table table-sm">
								<tbody>
									<tr><th colspan="4">Financial</th></tr>
									<tr>
										<td>TAX:</td>
										<td><span class="badge badge-danger">NO</span></td>
										<td>Late Fee:</td>
										<td><span class="badge badge-success">YES</span></td>
									</tr>
									<tr>
										<td>AutoPay:</td>
										<td><span class="badge badge-success">YES</span></td>
										<td> </td>
										<td> </td>
									</tr>		
									<tr><th colspan="4">Contact</th></tr>
									<tr>
										<td>Email Notify:</td>
										<td><span class="badge badge-success">YES</span></td>
										<td>Newsletter:</td>
										<td><span class="badge badge-success">YES</span></td>
									</tr>
									<tr>
										<td>SMS:</td>
										<td><span class="badge badge-success">YES</span></td>
										<td>Call:</td>
										<td><span class="badge badge-danger">NO</span></td>
									</tr>
								</tbody>
							</table>
							<table class="table table-sm">
								<tbody>
									<tr><th colspan="6">AI Dtail</th></tr>
									<tr>
										<td>Supoort:</td>
										<td><span class="badge badge-light">HODI</span></td>
										<td>Service:</td>
										<td><span class="badge badge-light">MOAZ</span></td>
										<td>Financial:</td>
										<td><span class="badge badge-light">MIAB</span></td>
									</tr>
									<tr>
										<td>Ticket:</td>
										<td><span class="badge badge-light">12</span></td>
										<td>Replay:</td>
										<td><span class="badge badge-light">54</span></td>
										<td>Satisfy:</td>
										<td><span class="badge badge-light">8</span></td>
									</tr>
									<tr class="small">
										<td>Literacy:</td>
										<td>
											<i class="fas fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
										</td>
										<td>Experience:</td>
										<td>
											<i class="fas fa-fw fa-star text-info"></i>
											<i class="fas fa-fw fa-star text-info"></i>
											<i class="fas fa-fw fa-star-half-alt text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
										</td>
										<td>Budget:</td>
										<td>
											<i class="fas fa-fw fa-star text-info"></i>
											<i class="fas fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
											<i class="far fa-fw fa-star text-info"></i>
										</td>
									</tr>								
									<tr>
										<td>Service:</td>
										<td><span class="badge badge-light">3</span></td>
										<td>Extend:</td>
										<td><span class="badge badge-light">12</span></td>
										<td>Income:</td>
										<td><span class="badge badge-warning">32,000</span></td>
									</tr>
									<tr>
										<td>Refreral:</td>
										<td><span class="badge badge-light">3</span></td>
										<td>Visit:</td>
										<td><span class="badge badge-light">1200</span></td>
										<td>Sell:</td>
										<td><span class="badge badge-primary">25,000</span></td>
									</tr>
								</tbody>
							</table>							
					  </div>
					  <div class="tab-pane fade" id="pills-Logs" role="tabpanel" aria-labelledby="pills-Logs-tab" aria-expanded="true">
						Logs
					  </div>
					</div>

				</div>
			</div>
			
			<div class="col-md-8">
				<ul class="nav nav-tabs" id="pills-tab" role="tablist">
					  <li class="nav-item"><a class="nav-link active" id="user-profile-tab" data-toggle="pill" href="#user-profile" role="tab" aria-controls="user-profile" aria-expanded="true">Profile</a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false">Supports</a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> Invoices </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="icon-globe"></i> </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="fas fa-cloud"></i> </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="far fa-hdd"></i> </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="fas fa-server"></i> </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="fas fa-vote-yea"></i> </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="icon-wrench"></i> </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="icon-chemistry"></i> </a></li>
					  <li class="nav-item"></li><a class="nav-link" id="pills-page-tab" data-toggle="pill" href="#pills-Logs" role="tab" aria-controls="pills-Logs" aria-expanded="false"> <i class="icon-disc"></i> </a></li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reports</a>
						<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
							<a class="dropdown-item" href="#">User Logs</a>
							<a class="dropdown-item" href="#">Emails</a>
							<a class="dropdown-item" href="#">SMS</a>
							<a class="dropdown-item" href="#">Transactions</a>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link" id="pills-parent-tab" data-toggle="pill" href="#pills-Summery" role="tab" aria-controls="pills-Summery" aria-expanded="true">Notes</a></li>

				</ul>
				
				<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane active fade show" id="user-profile" role="tabpanel" aria-labelledby="user-profile-tab" aria-expanded="false">
						<div id="vw-user">
							<div id="v-user" class="row">
								<div class="col-md-7">
									<table class="table table-responsive-sm table-bordered table-striped table-sm">
										<tbody>
											<tr>
												<th colspan="2" class="text-center bg-light text-primary">:: Information</th>
											</tr>
											<tr>
												<td>User ID:</td>
												<td><?= $this->__['USER']['id'] ?></td>
											</tr>
											<tr>
												<td>First Name:</td>
												<td><?= $this->__['USER']['f_name'] ?></td>
											</tr>
											<tr>
												<td>Last Name:</td>
												<td><?= $this->__['USER']['l_name'] ?></td>
											</tr>
											<tr>
												<td>Birthday:</td>
												<td><?= $this->__['USER']['birthday'] ?></td>
											</tr>
											<tr>
												<td>National/Passport Code:</td>
												<td><?= $this->__['USER']['ncode'] ?></td>
											</tr>
											<tr>
												<td>Company:</td>
												<td><?= $this->__['USER']['company'] ?></td>
											</tr>
											<tr><td colspan="2"></td></tr>
											<tr>
												<td>Language:</td>
												<td><?= $this->__['USER']['language'] ?></td>
											</tr>
											<tr>
												<td>Country:</td>
												<td><?= $this->__['USER']['country'] ?></td>
											</tr>
											<tr>
												<td>Region:</td>
												<td><?= $this->__['USER']['region'] ?></td>
											</tr>
											<tr>
												<td>City:</td>
												<td><?= $this->__['USER']['city'] ?></td>
											</tr>
											<tr>
												<td>Address:</td>
												<td><?= $this->__['USER']['address'] ?></td>
											</tr>
											<tr>
												<td>Postal Code:</td>
												<td><?= $this->__['USER']['postcode'] ?></td>
											</tr>
											
											
										</tbody>
									</table>
								</div>
								<div class="col-md-5">
									<table class="table table-responsive-sm table-bordered table-striped table-sm">
										<tbody>
											<tr>
												<th colspan="2" class="text-center bg-light text-primary">:: Contact</th>
											</tr>
											<tr>
												<td>Email:</td>
												<td><?= $this->__['USER']['email'] ?></td>
											</tr>
											<tr>
												<td>Phone Number:</td>
												<td><?= $this->__['USER']['phone'] ?></td>
											</tr>
											<tr>
												<td>Mobile Number:</td>
												<td><?= $this->__['USER']['mobile'] ?></td>
											</tr>
										</tbody>
									</table>
									<table class="table table-responsive-sm table-bordered table-striped table-sm">
										<tbody>
											<tr>
												<th colspan="2" class="text-center bg-light text-primary">:: Settings Detail</th>
											</tr>
											<tr>
												<td>Invoice Date:</td>
												<td><?= $this->__['USER']['invoice_date'] ?></td>
											</tr>
											<tr>
												<td>Gateway:</td>
												<td><?= $this->__['USER']['gateway'] ?></td>
											</tr>
											<tr><td colspan="2"></td></tr>
											<tr>
												<td>Refrerr:</td>
												<td><?= $this->__['USER']['refrerr'] ?></td>
											</tr>
											<tr>
												<td>Marketing:</td>
												<td><?= $this->__['USER']['marketing'] ?></td>
											</tr>
											<tr>
												<td>Public Profile ID:</td>
												<td><?= $this->__['USER']['public_profile'] ?></td>
											</tr>	
										</tbody>
									</table>
									<div class="col-md-12">
										<button class="btn btn-primary modalbox" type="button" data-box="editUser" data-get="&amp;id=<?= $this->__['USER']['id'] ?>"><i class="fa fa-fw fa-edit"></i> Edit</button>
										<button class="btn btn-outline-dark" type="button"  onclick="CopyToClipboard('user-profile')"> <i class="far fa-fw fa-copy"></i> Copy</button>
									</div>
								</div>
							</div>
						</div>
					  </div>
					  <div class="tab-pane fade" id="pills-Logs" role="tabpanel" aria-labelledby="pills-Logs-tab" aria-expanded="true">
						Logs d d d d d 
					  </div>
				</div>
			</div>
			
		</div>
	</div>
</main>
<?php include(THEME."c_footer.php"); ?>