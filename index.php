<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * index.php
 * Created on 1/31/2019 4:19 PM by Milad Abooali
 */
#==================================== PAGE PATH
$run_pages = $page_id = 'index.php';
#==================================== START
$core_system='core/system.php';
(file_exists($core_system)) ? require_once($core_system) : die("[0] Error: core / system");
#==================================== ePad