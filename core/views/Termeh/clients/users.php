
<?php 
	$PAGE['Chead'] .="
 						<link href='".ASSET."vendors/datatables/dataTables.bootstrap4.css' rel='stylesheet' />
 						<link href='".ASSET."vendors/datatables/buttons.dataTables.min.css' rel='stylesheet' />
					";
	 $PAGE['Cfoot'] .="
						<script src='".ASSET."vendors/datatables/jquery.dataTables.min.js'></script>
						<script src='".ASSET."vendors/datatables/dataTables.bootstrap4.js'></script>
						<script src='".ASSET."vendors/datatables/dataTables.buttons.min.js'></script>
						<script src='".ASSET."vendors/datatables/buttons.flash.min.js'></script>
						<script src='".ASSET."vendors/datatables/jszip.min.js'></script>
						<script src='".ASSET."vendors/datatables/pdfmake.min.js'></script>
						<script src='".ASSET."vendors/datatables/vfs_fonts.js'></script>
						<script src='".ASSET."vendors/datatables/buttons.html5.min.js'></script>
						<script src='".ASSET."vendors/datatables/buttons.print.min.js'></script>
						<script src='".ASSET."vendors/datatables/dataTables.fixedHeader.min.js'></script>
						<script>
							$(document).ready( function () {
								$('#users tfoot.foot th').each( function () {
									var title = $(this).text();
									$(this).html( '<input autocomplete=\"off\" class=\"searchi col\" type=\"search\" placeholder=\"? '+title+'\" />' );								
								});
								var table = $('#users').DataTable( {
									'ajax':  {
												'url': '".URL."ajax?c=clients/users&a=dataT&st=".$_SESSION['TOKEN']."&si=".$_SESSION['SID']."',
												'data': function ( d ) {
													d.startDate = $('#startdate').val();
													d.endDate = $('#enddate').val();
												}
											},
									'dom': \"<'row tabletop'<'col'l><'col text-center'i><'col'p>><'row'<'col-sm-12'tr>><'row'<'col'l><'col text-center'i><'col'p>><'row'<'col text-center'B>>\",
									buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
									fixedHeader: {
										headerOffset: 50
									},
									'processing': true,
									'serverSide': true,
									'iDisplayLength': 25,
									'aLengthMenu': [[25, 100, 250, 500, -1], [25, 100, 250, 500, 'All']],
									'order': [[ 0, 'desc' ]],
									'columnDefs':	[
														{
															'render': function ( data, type, row ) {
																return data + \"<a href='".URL."clients/users/?id=\"+data+\"' target='_blank' class='btn btn-primary btn-sm'><i class='fas fa-fw fa-external-link-alt'></i> View</a>\";
															},
															'targets': 0
														},
														{
															'render': function ( data, type, row ) {
																let checked = (data==0) ? '' : 'checked';
																return '<label class=\"switch switch-sm switch-icon switch-success switch\"><input type=\"checkbox\" class=\"switch-input do-setStatus\" data-table=\"users\" data-id=\"' + row[0] + '\" ' + checked + '><span class=\"switch-label\" data-on=\"✓\" data-off=\"✕\"></span><span class=\"switch-handle\"></span></label>';
															},
															'targets': 15
														},
														{
															'render': function ( data, type, row ) {
																let outdata = '';
																if (data) {
																	data.forEach(function(group) {
																		outdata += '<i class=\"fas fa-fw fa-bookmark\" style=\"color:#'+group.color+'\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"'+group.name+'\"></i>';
																	});
																}
																return  outdata;
															},
															'targets': 8
														},
														{
															'render': function ( data, type, row ) {
																function vColor (verify) {
																	return (verify == 0) ? 'light' : 'success';
																}
																let outdata = '<i class=\"text-'+vColor(data)+' fas fa-fw fa-at\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Email\"></i> ';
																outdata +=  '<i class=\"text-'+vColor(row[17])+' far fa-fw fa-address-card\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"National Code\"></i> ';
																outdata +=  '<i class=\"text-'+vColor(row[20])+' fas fa-fw fa-mobile-alt\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Mobile\"></i> ';
																outdata +=  '<br><i class=\"text-'+vColor(row[22])+' fas fa-fw fa-user-check\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Mediator\"></i> ';
																outdata +=  '<i class=\"text-'+vColor(row[18])+' fas fa-fw fa-passport\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Passport\"></i> ';
																outdata +=  '<i class=\"text-'+vColor(row[19])+' fas fa-fw fa-phone-square-alt\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Phone\"></i> ';
																outdata +=  '<i class=\"text-'+vColor(row[21])+' far fa-fw fa-credit-card\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Bank\"></i> ';
																return outdata;
															},
															'targets': 9
														},
														{
															'render': function ( data, type, row ) {
																let mobile = (data) ? '<i class=\"fas fa-mobile-alt\"></i> '+ data : '';
																let phone = (row[6]) ? '<i class=\"fas fa-phone-square-alt\"></i> '+ row[6]: '';
																return  mobile + '<br>' + phone;
															},
															'targets': 7
														},
														{'visible': false,  'targets': [ 6 ]},
														{
															'render': function ( data, type, row ) {
																return '<a target=\"_blank\"href=\"https://ip-api.com/#' + data + '\" class=\"text-primary \">' + data + '</a><br> (' + row[13] + ')';
															},
															'targets': 14
														},
														{'visible': false,  'targets': [ 13 ]},
														{'width': '4%', 'targets': 0},
														{'width': '2%', 'targets': 4},
														{'width': '2%', 'targets': 11},
														{'width': '2%', 'targets': 10},
														{'width': '4%', 'targets': 12},
														{'width': '2%', 'targets': 15},
													],
								});
								table.on( 'buttons-action', function ( e, buttonApi, dataTable, node, config ) {
									$.get('".URL."ajax?c=clients/users&a=export&dest='+buttonApi.text()+'&table=syslog&onp=".$PAGE['path']."&st=".$_SESSION['TOKEN']."&si=".$_SESSION['SID']."', function(data, status){
										if(data==1) {
											notifa (
												'success','fa fa-success','Export',
												buttonApi.text()+' is done.',
												2500,1,1
											);
										} else {
											notifa (
												'danger','fa fa-warning','Export',
												'Can not do '+buttonApi.text()+'!',
												4000,1,1
											);													
											}
									});
								} );
								table.columns().every( function () {
									var that = this;
									$(':input', this.footer()).on('keyup change clear search', function () {
										if ( that.search() !== this.value ) {
											that
												.search( this.value )
												.draw();
										}
									});
								});
								$('#users tfoot th:nth-child(14n)').html('<select data-columntar=\"15\" class=\"searchcbf\"><option value=\"\">ALL</option><option value=\"1\">Active</option><option value=\"0\">Disabled</option></select>');
								$('#users tfoot th:nth-child(8n)').html('<select data-columntar=\"8\" class=\"searchcbf\"><option value=\"\">ALL</option>".$this->__['GROUPS']."</select>');
								
								$('.searchcbf').on('keyup change clear search', function() {
									let columntar = $(this).data('columntar');
									table.columns(columntar).search(this.value).draw();
								});
								$('#users tfoot th:nth-child(15n) input:nth-child(1n)').removeClass('col');
								$('#users tfoot th:nth-child(15n) input:nth-child(1n)').addClass('col-9');
								$('#startdate,#enddate, #users tfoot th:nth-child(15n) input:nth-child(1n)').datepicker({showOn: 'button',buttonImage: '".IMG."ui/calendarD.png',buttonImageOnly: true,buttonText: 'Select date',dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
								$('#startdate, #enddate').on('keyup change clear search', function() {
									table.draw();
								} );
								$.fn.dataTable.ext.errMode = 'none';
								$('#users').on( 'error.dt', function ( e, settings, techNote, message ) {
									// console.log( 'An error has been reported by DataTables: ', message );
									notifa (
										'danger','fa fa-warning','Error',
										'CSRF Token Error datatable !',
										7000,1,0
									);
								}).DataTable();
								
								$('#searchAll').on('keyup change clear search', function() {
									  table.search($(this).val()).draw() ;
								})
								
								var nowtime = moment().format('Y-D-M  h:mm:ss');
								$('.refPageSel span').html(nowtime);
								function refreshPage () {
									$('.refPageSel').removeClass('text-muted');
									table.draw();
									
									$('.refPageSel span').fadeToggle();
									nowtime = moment().format('Y-D-M  h:mm:ss');
									$('.refPageSel span').html(nowtime);
									$('.refPageSel span').fadeToggle();
									$('.refPageSel').addClass('text-info');
								   setTimeout(function() {
										$('.refPageSel').removeClass('text-info');
								   }, 1300);
								}
								var refPageVal;
								$('#refreshTime').on('change', function() {
									var refreshTime = $(this).val()*1000;
									if (refPageVal) {
										clearInterval(refPageVal);
									}
									if (refreshTime > 0) {
										refPageVal = setInterval(function() {refreshPage()}, refreshTime);
										$('.refPageSel i').addClass('fa-spin');
										$('.refPageSel i').attr('data-original-title','Page will refresh every '+refreshTime+' ms.');
									} else {
										$('.refPageSel i').removeClass('fa-spin');
										$('.refPageSel i').attr('data-original-title','Page will not refresh.');
									}
								})
								

								
								
								
							});
						</script>
					";
	include(THEME."c_header.php");
?>   
<main class="main">
<!-- BreadCrumb -->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">InPanel</li>
		<li class="breadcrumb-item"> Clients</li>
		<li class="breadcrumb-item active"> Users</li>

		<li class="refPageSel">
			<small>
			<i class="fas fa-sync" data-toggle="tooltip" data-placement="bottom" title="Page will not refresh."></i>
			<select id="refreshTime" name="refreshTime" class="custom-select custom-select-sm">
				<option value="0" selected>No</option>
				<option value="3">3 s</option>
				<option value="15">15 s</option>
				<option value="60">1 M</option>
				<option value="180">3 M</option>
				<option value="300">5 M</option>
				<option value="600">10 M</option>
				<option value="900">15 M</option>
			</select>
			<span></span>
			</small>
		</li>
		
		<li class="breadcrumb-menu d-md-down-none">

			<span class="dateTreng">
				From <input value="2002-01-01" autocomplete="off" type="text" id="startdate" name="min">
				TO 
				<input value="<PHP=> date('Y-m-d',strtotime('2 days')) </PHP>" autocomplete="off" type="text" id="enddate" name="max">
			</span>
			<input type="search" placeholder='Search Logs' id="searchAll">
		</li>
	</ol>
<!-- Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<i class="icon-notebook"></i> Users List
					</div>
					<div class="card-body table-responsive">
					
						<table id='users' class="table table-sm table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Email</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>N Code</th>
									<th>City</th>
									<th>Phone</th>
									<th>Call</th>
									<th>Groups</th>
									<th>Trust</th>
									<th>Credit</th>
									<th>CBP</th>
									<th>InvoiceD</th>
									<th>Last Login</th>
									<th>Last Login</th>
									<th>Status</th>
									<th>Timestamp</th>
								</tr>
							</thead>
							<tfoot class="foot">
								<tr>
									<th>#ID</th>
									<th>Email</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>N Code</th>
									<th>City</th>
									<th>Phone</th>
									<th>Call</th>
									<th>Groups</th>
									<th>Trust</th>
									<th>Credit</th>
									<th>CBP</th>
									<th>InvoiceD</th>
									<th>Last Login</th>
									<th>Last Login</th>
									<th>Status</th>
									<th>Timestamp</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</main>
<?php include(THEME."c_footer.php"); ?>