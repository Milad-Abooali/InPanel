<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * staffs.php
 * Created on 4/24/2019 9:22 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'sys members/staffs';
$run_pages = (!$run_pages) ? $run_pages . ' > ' . $page_id : $page_id;
#==================================== START
$CACH=False;
#==================================== List Staffs
$DB_STAFFS = new M3_Database('staffs',$DEBUG);
$VIEW->__['STAFF']['LIST'] = $DB_STAFFS->selectAll();
$VIEW->__['STAFF']['COUNT'] = $DB_STAFFS->count();
$VIEW->__['STAFF']['COUNT_ACTIVE'] = $DB_STAFFS->count('status=1');
$VIEW->__['STAFF']['COUNT_DISABLED'] = $DB_STAFFS->count('status=0');
unset($DB_STAFFS);
#==================================== List Roles
$DB_ROLES = new M3_Database('staffs_roles',$DEBUG);
$VIEW->__['ROLES']['LIST'] = $DB_ROLES->selectAll();
$VIEW->__['ROLES']['COUNT'] = $DB_ROLES->count();
unset($DB_ROLES);
#==================================== List Roles
$DB_DEP = new M3_Database('staffs_departments',$DEBUG);
$VIEW->__['DEP']['LIST'] = $DB_DEP->selectAll();
$VIEW->__['DEP']['COUNT'] = $DB_DEP->count();
unset($DB_DEP);
#==================================== ePad
