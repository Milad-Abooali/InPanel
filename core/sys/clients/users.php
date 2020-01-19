<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * logs.php
 * Created on 4/24/2019 9:22 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'sys sys/logs';
$run_pages = (!$run_pages) ? $run_pages . ' > ' . $page_id : $page_id;
#==================================== START
$CACH=False;

#==================================== List Groups
$groups = M3::dbTable('user_groups');
$VIEW->__['GROUPS'] = '';
foreach ($groups as $g) {
    $VIEW->__['GROUPS'] .= '<option style="color:#'.$g['color'].'" value="'.$g['id'].'">⬤ '.$g['name'].'</option>';
}


#==================================== ePad

