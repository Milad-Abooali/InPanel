<?php
#==================================== PAGE ID & PATH
$page_id='User_Ajax';
$page_path= (!isset($page_path)) ? $page_id : $page_path.' > '.$page_id;
#==================================== Defualt
function defualt () {
    echo "User Ajax";
}

#==================================== dataT
function dataT () {
    $DataT = new M3_DataT('users');
    $columns = array(
        array( 'db' => 'id','dt' => 0 ),
        array( 'db' => 'email','dt' => 1 ),
        array( 'db' => 'f_name','dt' => 2 ),
        array( 'db' => 'l_name','dt' => 3 ),
        array( 'db' => 'ncode','dt' => 4 ),
        array( 'db' => 'city','dt' => 5 ),
        array( 'db' => 'phone','dt' => 6 ),
        array( 'db' => 'mobile','dt' => 7 ),
        array(
            'db'        => 'groups',
            'dt'        => 8,
            'formatter' => function( $d, $row ) {
                if($d) {
                    $groups = explode(",",$d);
                }
                if ($groups) {
                    foreach ($groups as $groupID) {
                        $group[] = M3::dbRow('user_groups',$groupID);
                    }
                }
                return $group ?? NULL;
            }
        ),
        array( 'db' => 'v_email','dt' => 9 ),
        array( 'db' => 'credit','dt' => 10 ),
        array( 'db' => 'cbpoint','dt' => 11 ),
        array( 'db' => 'invoice_date','dt' => 12 ),
        array( 'db' => 'lastlogin','dt' => 13 ),
        array( 'db' => 'lastip','dt' => 14 ),
        array( 'db' => 'status','dt' => 15 ),
        array(
            'db'        => 'timestamp',
            'dt'        => 16,
            'formatter' => function( $d, $row ) {
                return date( 'Y-m-d H:i:s', strtotime($d));
            }
        ),
        array( 'db' => 'v_ncod','dt' => 17 ),
        array( 'db' => 'v_pass','dt' => 18 ),
        array( 'db' => 'v_phone','dt' => 19 ),
        array( 'db' => 'v_mobile','dt' => 20 ),
        array( 'db' => 'v_bank','dt' => 21 ),
        array( 'db' => 'refrerr','dt' => 22 ),

    );
    $DataT->setColumns ($columns);
    $startDate = ($_GET['startDate']) ?? '1950-01-01';
    $endDate = ($_GET['endDate']) ?? '2050-01-01';
    $dateC = ($_GET['dateCol']) ?? 'timestamp';
    $DataT->setWhere("$dateC >= '$startDate' AND $dateC <= '$endDate'");
    echo $DataT->generate();
}
#==================================== Update User Information
function upUser () {
    $output = new stdClass();
    $DB = new M3_Database('users');
    $id = $_GET['id'] ?? NULL;
    $array['email'] = $_GET['email'] ?? NULL;
    $array['f_name'] = $_GET['f_name'] ?? NULL;
    $array['l_name'] = $_GET['l_name'] ?? NULL;
    $array['birthday'] = $_GET['birthday'] ?? NULL;
    $array['country'] = $_GET['country'] ?? NULL;
    $array['region'] = $_GET['region'] ?? NULL;
    $array['city'] = $_GET['city'] ?? NULL;
    $array['company'] = $_GET['company'] ?? NULL;
    $array['ncode'] = $_GET['ncode'] ?? NULL;
    $array['language'] = $_GET['language'] ?? NULL;
    $array['phone'] = $_GET['phone'] ?? NULL;
    $array['mobile'] = $_GET['mobile'] ?? NULL;
    $array['public_profile'] = $_GET['public_profile'] ?? NULL;
    $array['postcode'] = $_GET['postcode'] ?? NULL;
    $array['address'] = $_GET['address'] ?? NULL;
    $array['invoice_date'] = $_GET['invoice_date'] ?? NULL;
    $array['gateway'] = $_GET['gateway'] ?? NULL;
    $array['groups'] = implode(",",$_GET['groups'] ?? array());
    if ($id) {
        if ($DB->exist("id=$id")) {
            $output->e = 0;
            $output->res = 1;
            $DB->updateID($id, $array);
            $output->val = "User (#$id) information updated.";
            LOGS::user(1,$id,2,$output->val);
        } else {
            $output->e = "Users is not Exist !";
        }
    } else {
        $output->e = 'ID is not set';
    }
    echo json_encode($output);
}
#==================================== PLACE HERE