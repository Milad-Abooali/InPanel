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

$types = array (
					1 => 'Insert',
					2 => 'Update',
					3 => 'Export',
					4 => 'Delete',
				);
foreach ($types as $k => $v) {
    $VIEW->__['TYPES'] .= '<option value="'.$k.'">'.$v.'</option>';
}



#==================================== ePad

