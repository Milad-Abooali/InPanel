<?php
#==================================== PAGE ID & PATH
$page_id='Members_Ajax';
$page_path= (!isset($page_path)) ? $page_id : $page_path.' > '.$page_id;
#==================================== Defualt
function defualt () {
    echo "Members Ajax";
}

#==================================== Add Staff
function addStaff ($DEBUG) {
    $output = new stdClass();
    $DB = new M3_Database('staffs');
    $array['id'] = $id = $_GET['id'] ?? NULL;
    $array['name'] = $_GET['name'] ?? NULL;
    $array['psk'] = $_GET['psk'] ?? NULL;
    $array['psn'] = $_GET['psn'] ?? NULL;
    $array['role'] = $_GET['role'] ?? NULL;
    $array['departments'] = implode(",",$_GET['departments'] ?? array());
    if (strlen($array['name'])==4 && $array['id']) {
        if (!$DB->exist("id=$id")) {
            $output->e = 0;
            $output->res = 1;
            $insert_id = $DB->insert($array);
			$output->val = "User (#$insert_id) added as staff.";
            LOGS::user(2,$insert_id,1,$output->val);
        } else {
            $output->e = "User (#$id) is staff right now !";
        }
    } elseif ($array['id']) {
        $output->e = 'Name is not set';
    } else {
        $output->e = 'ID is not set';
    }
    echo json_encode($output);
}

#==================================== Update Staff
function upStaff () {
    $output = new stdClass();
    $DB = new M3_Database('staffs');
    $id = $_GET['id'] ?? NULL;
    $array['name'] = $_GET['name'] ?? NULL;
    $array['psk'] = $_GET['psk'] ?? NULL;
    $array['psn'] = $_GET['psn'] ?? NULL;
    $array['role'] = $_GET['role'] ?? NULL;
    $array['departments'] = implode(",",$_GET['departments'] ?? array());
    if (strlen($array['name'])==4 && $id) {
        if ($DB->exist("id=$id")) {
            $output->e = 0;
            $output->res = 1;
            $DB->updateID($id, $array);
			$output->val = "Staff (#$id) information Updated.";
            LOGS::user(2,$id,2,$output->val);
        } else {
            $output->e = "User (#$id) is not staff right now !";
        }
    } elseif ($id) {
        $output->e = 'Name is not set';
    } else {
        $output->e = 'ID is not set';
    }
    echo json_encode($output);
}
#==================================== Add Role
function addRole () {
    $output = new stdClass();
    $DB = new M3_Database('staffs_roles');
    $array['name'] = $name = $_GET['name'] ?? NULL;
    if ($array['name']) {
        if (!$DB->exist("name='$name'")) {
            $output->e = 0;
            $output->res = 1;
            $insert_id = $DB->insert($array);
			$output->val = "Role (#$insert_id) ".SYS::dbIdVal('staffs_roles',$insert_id)." Added.";
            LOGS::user(3,$insert_id,1,$output->val);
        } else {
            $output->e = "Role (#$id) ".SYS::dbIdVal('staffs_roles',$id).' is exist right now !';
        }
    } else {
        $output->e = 'Name is not set';
    }
    echo json_encode($output);
}
#==================================== Update Role
function upRole () {
    $output = new stdClass();
    $DB = new M3_Database('staffs_roles');
    $id = $_GET['id'] ?? NULL;
    $array['name'] = $_GET['name'] ?? NULL;
    if (strlen($array['name'])>2 && $id) {
        if ($DB->exist("id=$id")) {
            $output->e = 0;
            $output->res = 1;
            $DB->updateID($id, $array);
			$output->val = "Role (#$id) ".SYS::dbIdVal('staffs_roles',$id)." Updated To ".$array['name'];
            LOGS::user(3,$id,2,$output->val);
        } else {
            $output->e = "Role (#$id) ".SYS::dbIdVal('staffs_roles',$id).' is not exist !';
        }
    } elseif ($id) {
        $output->e = 'Name is not set';
    } else {
        $output->e = 'ID is not set';
    }
    echo json_encode($output);
}
#==================================== Add Departments
function addDep () {
    $output = new stdClass();
    $DB = new M3_Database('staffs_departments');
    $array['name'] = $name = $_GET['name'] ?? NULL;
    if ($array['name']) {
        if (!$DB->exist("name='$name'")) {
            $output->e = 0;
            $output->res = 1;
            $insert_id = $DB->insert($array);
			$output->val = "Department (#$insert_id) ".SYS::dbIdVal('staffs_departments',$insert_id)." Added.";
            LOGS::user(4,$insert_id,1,$output->val);
        } else {
            $output->e = "Department (#$id) ".SYS::dbIdVal('staffs_departments',$id).' is exist right now !';
        }
    } else {
        $output->e = 'Name is not set';
    }
    echo json_encode($output);
}
#==================================== Update Departments
function upDep () {
    $output = new stdClass();
    $DB = new M3_Database('staffs_departments');
    $id = $_GET['id'] ?? NULL;
    $array['name'] = $_GET['name'] ?? NULL;
    if (strlen($array['name'])>2 && $id) {
        if ($DB->exist("id=$id")) {
            $output->e = 0;
            $output->res = 1;
            $DB->updateID($id, $array);
			$output->val = "Department (#$id) ".SYS::dbIdVal('staffs_departments',$id)." Updated To ".$array['name'];
            LOGS::user(4,$id,2,$output->val);
        } else {
            $output->e = "Department (#$id) ".SYS::dbIdVal('staffs_departments',$id).' is not exist !';
        }
    } elseif ($id) {
        $output->e = 'Name is not set';
    } else {
        $output->e = 'ID is not set';
    }
    echo json_encode($output);
}
#==================================== PLACE HERE