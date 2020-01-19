<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * LOGS.php
 * Created on 8/22/2019 5:29 AM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'logs.php';
$run_pages .= ' > '.$page_id;
#==================================== DEFINE Funcs
if (LIB['LOGS']) {
    $M3_Loader['logs']=1;
#==================================== LOGS Functions
    class LOGS {

	/* 
			Status:	
					1.Insert
					2.Update
					3.Export
					4.Delete
					
			Types:	
					1. User
					2. Staff
					3. Staff Roles
					4. Staff Department
	*/
	
#==================================== Types @ LOGS
        static function type ($int_type) {
			switch ($int_type) {
				case 1:
					$output = "User";
					break;
				case 2:
					$output = "Staff";
					break;
				case 3:
					$output = "Staff Roles";
					break;
				case 4:
					$output = "Staff Department";
					break;
				default:
					$output = NULL;
			}
            return $output;
        }
#==================================== System @ LOGS
        static function sys ($who,$t_type,$t_id,$status,$log) {
            $DB = new M3_Database('logs_system');
            $array['who'] = $who;
            $array['t_type'] = $t_type;
            $array['t_id'] = $t_id;
            $array['log'] = $log;
            $array['status'] = $status;
            return $DB->insert($array);
        }
#==================================== User @ LOGS
        static function user ($t_type,$t_id,$status,$log) {
            $DB = new M3_Database('logs_user');
            $array['who'] = $_SESSION['USER'] ?? 0;
            $array['t_type'] = $t_type;
            $array['t_id'] = $t_id;
            $array['log'] = $log;
            $array['ip']= M3::getIP();
            $array['status'] = $status;
            return $DB->insert($array);
        }

    }
}

#==================================== ePad
