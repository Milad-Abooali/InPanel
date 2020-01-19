<?php 
	$PAGE['Chead'] .="
 						<link href='".ASSET."vendors/datatables/dataTables.bootstrap4.css' rel='stylesheet' />
 						<link href='".ASSET."vendors/datatables/buttons.dataTables.min.css' rel='stylesheet' />
 						<link href='".ASSET."vendors/datatables/fixedHeader.dataTables.min.css' rel='stylesheet' />
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
							
								$('#syslog tfoot.foot th').each( function () {
									var title = $(this).text();
									$(this).html( '<input autocomplete=\"off\" class=\"searchi col\" type=\"search\" placeholder=\"? '+title+'\" />' );								
								});
								
								var table = $('#syslog').DataTable( {
									'ajax':  {
												'url': '".URL."ajax?c=system/logs&a=dataT&st=".$_SESSION['TOKEN']."&si=".$_SESSION['SID']."',
												'data': function ( d ) {
													d.startDate = $('#startdate').val();
													d.endDate = $('#enddate').val();
												}
											},									'dom': \"<'row tabletop'<'col'l><'col text-center'i><'col'p>><'row'<'col-sm-12'tr>><'row'<'col'l><'col text-center'i><'col'p>><'row'<'col text-center'B>>\",
									buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
									'processing': true,
									'serverSide': true,
									fixedHeader: {
										headerOffset: 50
									},
									'iDisplayLength': 25,
									'aLengthMenu': [[25, 100, 250, 500, -1], [25, 100, 250, 500, 'All']],
									'order': [[ 0, 'desc' ]],								
								});
								
								table.on( 'buttons-action', function ( e, buttonApi, dataTable, node, config ) {
									$.get('".URL."ajax?c=system/logs&a=export&dest='+buttonApi.text()+'&table=syslog&onp=".$PAGE['path']."&st=".$_SESSION['TOKEN']."&si=".$_SESSION['SID']."', function(data, status){
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
								});
								$.fn.dataTable.ext.errMode = 'none';
								$('#syslog').on( 'error.dt', function ( e, settings, techNote, message ) {
									// console.log( 'An error has been reported by DataTables: ', message );
									notifa (
										'danger','fa fa-warning','Error',
										'CSRF Token Error datatable !',
										7000,1,0
									);
								}).DataTable();
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
								
								$('#syslog tfoot th:nth-child(5n)').html('<select data-columntar=\"4\" class=\"searchcbf\"><option value=\"\">ALL</option>".$this->__['TYPES']."</select>');
								$('.searchcbf').on('keyup change clear search', function() {
									let columntar = $(this).data('columntar');
									table.columns(columntar).search(this.value).draw();
								});
								
								$('#startdate,#enddate, #syslog tfoot th:nth-child(7n) input:nth-child(1n)').datepicker({showOn: 'button',buttonImage: '".IMG."ui/calendarD.png',buttonImageOnly: true,buttonText: 'Select date',dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
								$('#startdate, #enddate').on('keyup change clear search', function() {
									table.draw();
								} );

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
		<li class="breadcrumb-item"> System</li>
		<li class="breadcrumb-item active"> Logs</li>

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
				From <input value="<PHP=> date('Y-m-d',strtotime('-8 days')) </PHP>" autocomplete="off" type="text" id="startdate" name="min">
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
						<i class="icon-notebook"></i> System Logs
					</div>
					<div class="card-body">
						<table id='syslog' class="table table-sm table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Who</th>
									<th>Type</th>
									<th>Target</th>
									<th>Action</th>
									<th>Log</th>
									<th>Timestamp</th>
								</tr>
							</thead>
							<tfoot class="foot">
								<tr>
								<th>#ID</th>
									<th>Who</th>
									<th>Type</th>
									<th>Target</th>
									<th>Action</th>
									<th>Log</th>
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