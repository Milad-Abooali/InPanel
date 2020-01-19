<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * SYS.php
 * Created on 8/22/2019 5:29 AM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'm3.php';
$run_pages .= ' > '.$page_id;
#==================================== DEFINE Funcs
if (LIB['SYS']) {
    $M3_Loader['sys']=1;
#==================================== SYS Functions
    class SYS {

#==================================== staffId @ SYS
        static function staff ($id,$col=Null) {
            $DB = new M3_Database('staffs');
            $output = ($col) ? $DB->selectByID ($id, $col) : $DB->selectByID ($id);
            return ($output) ? $output : False;
        }
#==================================== Table ID to Val @ SYS
        static function dbIdVal ($table,$id=Null) {
            switch ($table) {
                case "system_routing":
                    $output = "path";
                    break;
                case "system_pages":
                    $output = "title";
                    break;
                case "users":
                    $output = "ncode";
                    break;
                case "staffs":
                case "staffs_departments":
                case "staffs_roles":
                    $output = "name";
                    break;
                default:
                    $output = NULL;
            }
            if ($id) {
                $output = M3::dbCol ($table, $id, $output);
            }
            return ($output) ? $output : False;
        }
#==================================== Table ID to Val @ SYS
        static function dbStatusVal ($table,$status) {
            switch ($table) {
                case "system_routing":
                    $output = NULL;
                    break;
                case "system_pages":
                    $output = NULL;
                    break;
                case "logs_system":
					switch ($status) {
						case '1':
							$output = "Insert";
							break;
						case '2':
							$output = "Update";
							break;
						case '3':
							$output = "Export";
							break;
						case '4':
							$output = "Delete";
							break;
						default:
							$output = NULL;
					}
                    break;
                case "users":
                case "staffs":
                case "staffs_departments":
                case "staffs_roles":
                    $output = ($status) ? 'Active' : 'Disabled';
                    break;
                default:
                    $output = NULL;
            }
            return $output ?? False;
        }
    }
}





#==================================== ePad
