<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * system.php
 * Created on 1/31/2019 4:39 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'system.php';
$run_pages .= ' > '.$page_id;
#==================================== START
session_save_path('core/sessions');
ini_set('session.gc_probability', 1);
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
mb_regex_encoding('UTF-8');
session_start();
$start_time = microtime(TRUE);
$core_settings='core/setme.php';
(file_exists($core_settings)) ? require_once($core_settings) : die("[0] Error: core / settings");
foreach (glob("core/libs/*.php") as $filename) {
    require_once($filename);
}
$_SESSION['SID']= md5(session_id());
#==================================== DEBUG START
if ($M3_Loader['DEBUG']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $DEBUG = new M3_Debugger($start_time); 
    foreach (glob("core/libs/*.php") as $filename) {
        (!$DEBUG) ?: $DEBUG->addRow("Library", $filename, 3);
    }
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}
#==================================== ROUTING
$path = str_replace(SITE['ROOT'],"", ltrim($_SERVER['REQUEST_URI'], '/'));
$url['path'] = (strpos($path, '?') !== false) ? substr($path, 0, strpos($path, '?')) : $path;
$url['level'] = explode('/', $url['path']);
$url['file'] = urldecode(end($url['level']));
$url['parent'] = str_replace($url['file'],NULL,$url['path']);
//$url['nod'] = unserialize (explode('#', $url['path']) || '');
if ($url['file']=='ajax') {
    require_once('ajax.php');
    exit;
} else {
    if (!M3::csrf($_SESSION['TOKEN'])) {
        $_SESSION['TOKEN'] = 'm3' . substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 30);
        $_SESSION['TOKEN-EXPIRE'] = time() + CSRF;
    }
    $DB_SYSTEM_ROUTING = new M3_Database('system_routing', $DEBUG);
    if (SITE['UP']) {
        $url_path = $DB_SYSTEM_ROUTING->escape($url['path']);
        $where = "status=1 and path='" . $url_path . "'";
        $routing_page = (!$DB_SYSTEM_ROUTING->exist($where)) ? $DB_SYSTEM_ROUTING->selectRow('path=404') : $DB_SYSTEM_ROUTING->selectRow($where);
    } else { // SITE IS DOWN
        $routing_page = $DB_SYSTEM_ROUTING->selectRow('path=503');
    }
    try {
        $vid = $routing_page['id'];
        $CACH = CACHE['ENABLE'];
        $VIEW = new M3_View ($vid, $routing_page['theme'], $routing_page['type'], $DEBUG);
        $vid_model = 'core/model/' . $routing_page['model'] . '.php';
        $vid_sys = 'core/sys/' . $routing_page['sys'] . '.php';
        (!file_exists($vid_model)) ?: require_once($vid_model);
        (!file_exists($vid_sys)) ?: require_once($vid_sys);
        $DB_SYSTEM_PAGES = new M3_Database('system_pages', $DEBUG);
        $PAGE = $DB_SYSTEM_PAGES->selectRow("vid=$VIEW->VID");
        $VIEW->gUI($PAGE, $CACH);
        $DB_SYSTEM_ROUTING->increase('visit', "id=$vid");
    } catch (Exception $e) {
        (!$DEBUG) ?: $DEBUG->addRow("ERROR", $e, 3);
    }
    unset($DB_SYSTEM_ROUTING);
}
#==================================== ePad





#==================================== DEBUG LOG
(!$DEBUG || !$_GET['M3']) ?: $DEBUG->logIt($run_pages);



