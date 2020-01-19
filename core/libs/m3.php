<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * M3.php
 * Created on 1/31/2019 6:09 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'm3.php';
$run_pages .= ' > '.$page_id;
#==================================== DEFINE Funcs
if (LIB['M3']) {
    $M3_Loader['M3']=1;
#==================================== M3 Functions
    class M3 {
#==================================== ROOT @ M3
        static function path ($folder=NULL) {
            $output=$_SERVER['DOCUMENT_ROOT'].SITE['ROOT'];
            if ($folder) {
                $output.=$folder;
            }
            return $output;
        }
#==================================== Ge column of Row by ID @ M3
        static function dbCol ($table, $id, $col) {
            $DB = new M3_Database($table);
            $id = $DB->escape($id);
            $col = $DB->escape($col);
            $output = ($id) ? $DB->selectByID ($id, $col) : NULL;
            return ($output) ? $output : False;
        }
#==================================== Get Row by ID @ M3
        static function dbRow ($table, $id) {
            $DB = new M3_Database($table);
            $id = $DB->escape($id);
            $output = ($id) ? $DB->selectByID ($id) : NULL;
            return ($output) ? $output : False;
        }
#==================================== Get Table @ M3
        static function dbTable ($table) {
            $DB = new M3_Database($table);
            $output = $DB->selectAll ();
            return ($output) ? $output : False;
        }
#==================================== Delete Row @ M3
        static function dbDel ($table, $id) {
            $DB = new M3_Database($table);
            $DB_TRASH = new M3_Database('system_trash');
            $table = $DB->escape($table);
            $id = $DB->escape($id);
            $data = $DB->selectByID($id);
            $data = json_encode($DB->escape($data));
            $array['tbl']=$table;
            $array['data']=$data;
            $array['user']=$_SESSION['USER'];
            $trashed = $DB_TRASH->insert($array);
            $deleted = ($trashed) ? $DB->delete($id) : False;
            return ($deleted) ? $trashed : False;
        }
#==================================== Update Row Status @ M3
        static function upStatus ($table, $id, $status) {
            $DB = new M3_Database($table);
            $id = $DB->escape($id);
            $array['status'] = $status;
            $output = $DB->updateID($id,$array);
            return ($output) ? $output : False;
        }
#==================================== CSRF @ M3
        static function csrf($token=NULL) {
            return (($_SESSION['TOKEN']==$token) && (time() < $_SESSION['TOKEN-EXPIRE'])) ? 1 : 0;
        }
#==================================== View @ M3
        static function echo ($data=NULL) {
            print("<pre>".print_r($data,true)."</pre>");
        }
#==================================== Console Log @ M3
        static function console($data=NULL) {
            echo '<script>console.log('.json_encode($data).')</script>';
        }
#==================================== Alert @ M3
        static function alert($data) {
            echo '<script>alert('.json_encode($data).')</script>';
        }
#==================================== JS @ M3
        static function js($data) {
            echo '<script> $data </script>';
        }
#==================================== Get User IP @ M3
        static function getIP () {
            return (!empty($_SERVER['HTTP_CLIENT_IP'])) ? $_SERVER['HTTP_CLIENT_IP'] : (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        }
#==================================== Get User Agent @ M3
        static function getUserAgent ($user_agent) {
			$user_agent=$_SERVER['HTTP_USER_AGENT'];
			if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
			elseif (strpos($user_agent, 'Edge')) return 'Edge';
			elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
			elseif (strpos($user_agent, 'Safari')) return 'Safari';
			elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
			elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
			return 'Other';
		}
#==================================== WebP Image @ M3
        static function webp ($original) {
		  $BrowserAgentName = M3::GetBrowserAgentName();
		  $imageFile = $original;
		  If ($BrowserAgentName == 'Chrome' || $BrowserAgentName =='Opera') {
			$filename = str_replace('.', '-',$original);
			$webp = "$filename.webp";
			echo (!file_exists($webp)) ? $original : $webp;
		  } else {
			echo $original;
		  }
		}
#==================================== NUMBER FORMAT @ M3
        static function vColor ($verify) {
            return ($verify == 0) ? ' text-light ' : ' text-success ';
        }
#==================================== NUMBER FORMAT @ M3
         static function nf ($num=0, $dot=0) {
            if ($dot==0) {
                $num = round ($num);
                $output = number_format ($num, 0, '.', ',');
            } else {
                $output = number_format ($num, $dot, '.', ' ');
            }
            return $output;
        }

    }
}





#==================================== ePad
