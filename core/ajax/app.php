<?php
#==================================== PAGE ID & PATH
$page_id='App_Ajax';
$page_path= (!isset($page_path)) ? $page_id : $page_path.' > '.$page_id;
#==================================== Defualt
function defualt () {
    echo "App Ajax";
}

#==================================== CSRF
function  lock () {
    echo 1;
}


#==================================== Delete Item
function delItem () {
    $output = new stdClass();
    $table = $_GET['table'] ?? NULL;
    $id = $_GET['id'] ?? NULL;
    $name = $_GET['name'] ?? NULL;
    if ($table && $id) {
        $output->e = 0;
        $output->res = M3::dbDel($table, $id);
        $name = ($name) ? $name : SYS::dbIdVal($table,$id);
        $logMes = ($output->res) ? "#$table - (#$id) $name Deleted. Trash id (#$output->res)" : "#$table - >$id Delete failed !" ;
        SYS::log($logMes,'Delete');
        $output->val = ($output->res) ? "(#$id) $name Deleted. Trash id (#$output->res)" :  "#$table >$id Delete failed !";
    } elseif ($table) {
        $output->e = 'Table is not set';
    } else {
        $output->e = 'ID is not set';
    }
    echo json_encode($output);
}
#==================================== Update Status
function setStatus () {
    $output = new stdClass();
    $table = $_GET['table'] ?? NULL;
    $id = $_GET['id'] ?? NULL;
    $status = $_GET['status'] ?? 0;
    if ($table && $id) {
        $output->e = 0;
        $output->res = M3::upStatus ($table, $id, $status);
        $logMes = ($output->res) ? '#'.$table.' - '."(#$id) ".SYS::dbIdVal($table,$id).' changed to '.SYS::dbStatusVal ($table,$status) : "#$table - >$id Update failed !";
        SYS::log($logMes,'Update');
        $output->val = ($output->res) ? "(#$id) ".SYS::dbIdVal($table,$id).' changed to '.SYS::dbStatusVal($table,$status) : "#$table >$id Update failed !";
    } elseif ($table) {
        $output->e = 'Table is not set';
    } else {
        $output->e = 'ID is not set';
    }
    echo json_encode($output);
}
#==================================== Get Status
function getStatus () {
    $output = new stdClass();
    $table = $_GET['table'] ?? NULL;
    $id = $_GET['id'] ?? NULL;
    if ($table && $id) {
        $output->e = 0;
        $output->res =  M3::dbCol ($table, $id, 'status');
    } elseif ($table) {
        $output->e = 'Table is Empty';
    } else {
        $output->e = 'ID is Empty';
    }
    echo json_encode($output);
}
#==================================== PLACE HERE