<?php
#==================================== PAGE ID & PATH
$page_id='System_Ajax';
$page_path= (!isset($page_path)) ? $page_id : $page_path.' > '.$page_id;
#==================================== Defualt
function defualt () {
    echo "System Ajax";
}

#==================================== dataT
function dataT () {
    $DataT = new M3_DataT('logs_system');
    $columns = array(
        array( 'db' => 'id','dt' => 0 ),
        array( 'db' => 'who','dt' => 1 ),
        array(
            'db'        => 't_type',
            'dt'        => 2,
            'formatter' => function($d,$row) {
                return  LOGS::type($d);
            }
        ),
		array( 'db' => 't_id','dt' => 3 ),
        array(
            'db'        => 'status',
            'dt'        => 4,
            'formatter' => function($d,$row) {
                return SYS::dbStatusVal('logs_system',$d);
			}
        ),
		array( 'db' => 'log','dt' => 5 ),
        array(
            'db'        => 'timestamp',
            'dt'        => 6,
            'formatter' => function($d,$row) {
                return date( 'Y-m-d H:i:s', strtotime($d));
            }
        ),
    );
    $DataT->setColumns ($columns);
    $startDate = ($_GET['startDate']) ?? '1990-01-01';
    $endDate = ($_GET['endDate']) ?? '2050-01-01';
    $dateC = ($_GET['dateCol']) ?? 'timestamp';
    $DataT->setWhere("$dateC >= '$startDate' AND $dateC <= '$endDate'");
    echo $DataT->generate();
}
#==================================== dataT EX
function export () {
    $dest = $_GET['dest'];
    $table = $_GET['table'];
    $page = $_GET['onp'];           
    echo (LOGS::user(0,0,3,"Export: $dest from $table on $page")) ? 1 : 0;
}

#==================================== PLACE HERE