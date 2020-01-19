<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * user.php
 * Created on 4/24/2019 9:22 PM by Milad Abooali
 */
#==================================== PAGE PATH
$page_id = 'sys members/user';
$run_pages = (!$run_pages) ? $run_pages . ' > ' . $page_id : $page_id;
#==================================== START
$CACH=False;
#==================================== User Row
$VIEW->__['USER'] = M3::dbRow ('users', $_GET['id']);


$date = strtotime($VIEW->__['USER']['timestamp']);
$year = date("Y", $date);
$month = date("m", $date);
$VIEW->__['USER']['path'] =  $year.'/'.$month.'/'.$VIEW->__['USER']['id'].'/';

if($VIEW->__['USER']['groups']) {
    $groups = explode(",",$VIEW->__['USER']['groups']);
}
if ($groups) {
    foreach ($groups as $groupID) {
        $group[] = M3::dbRow('user_groups',$groupID);
    }
    $VIEW->__['USER']['groups'] = $group;
} else {
    $VIEW->__['USER']['groups'] = array();
}

#==================================== ePad
