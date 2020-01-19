<?php
#==================================== PAGE ID & PATH
$page_id='Box_Ajax';
$page_path= (!isset($page_path)) ? $page_id : $page_path.' > '.$page_id;
#==================================== Defualt
function defualt () {
    echo "Box Ajax";
}

#==================================== Add New Staff
function addNewStaff () {
    $output = new stdClass();
    $output->e = 0;
    $output->box = 'form';
    $output->title = 'Add New Staff';
    require_once('box/addNewStaff.php');
    $output->action = 'personnel/staffs&a=addStaff';
    $output->reloadw = 'staffs';
    $output->head = 1;
    $output->foot = 1;
    echo json_encode($output);
}
#==================================== Edit Staff
function editStaff () {
    $output = new stdClass();
    $output->e = 0;
    $output->box = 'form';
    $output->title = 'Edit Staff';
    require_once('box/editStaff.php');
    $output->action = 'personnel/staffs&a=upStaff';
    $output->reloadw = 'staffs';
    $output->head = 1;
    $output->foot = 1;
    echo json_encode($output);
}
#==================================== Add New Role
function addNewRole () {
    $output = new stdClass();
    $output->e = 0;
    $output->box = 'form';
    $output->title = 'Add New Role';
    require_once('box/addNewRole.php');
    $output->action = 'personnel/staffs&a=addRole';
    $output->reloadw = 'staffs_roles';
    $output->head = 1;
    $output->foot = 1;
    echo json_encode($output);
}
#==================================== Edit Staff
function editRole () {
    $output = new stdClass();
    $output->e = 0;
    $output->box = 'form';
    $output->title = 'Edit Role';
    require_once('box/editRole.php');
    $output->action = 'personnel/staffs&a=upRole';
    $output->reloadw = 'staffs_roles';
    $output->head = 1;
    $output->foot = 1;
    echo json_encode($output);
}
#==================================== Add New Departments
function addNewDep () {
    $output = new stdClass();
    $output->e = 0;
    $output->box = 'form';
    $output->title = 'Add New Departments';
    require_once('box/addNewDep.php');
    $output->action = 'personnel/staffs&a=addDep';
    $output->reloadw = 'staffs_departments';
    $output->head = 1;
    $output->foot = 1;
    echo json_encode($output);
}
#==================================== Edit Departments
function editDep () {
    $output = new stdClass();
    $output->e = 0;
    $output->box = 'form';
    $output->title = 'Edit Departments';
    require_once('box/editDep.php');
    $output->action = 'personnel/staffs&a=upDep';
    $output->reloadw = 'staffs_departments';
    $output->head = 1;
    $output->foot = 1;
    echo json_encode($output);
}
#==================================== Edit User
function editUser () {
    $output = new stdClass();
    $output->e = 0;
    $output->box = 'form';
    $output->title = 'Edit User';
    require_once('box/editUser.php');
    $output->action = 'clients/users&a=upUser';
    $output->reloadw = 'user';
    $output->head = 1;
    $output->foot = 1;
    echo json_encode($output);
}
#==================================== PLACE HERE
//    $output->box = 'form'; //large,small
//    $output->title = 'title';
//    $output->body = 'body';
//    $output->action = 'action';
//    $output->reloadw = 'table';
//    $output->head = 1;
//    $output->foot = 1;
//    $output->header = 'header';
//    $output->footer = 'footer';