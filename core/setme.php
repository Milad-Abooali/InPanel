<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * setme.php
 * Created on 1/31/2019 4:43 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'setme.php';
$run_pages .= ' > '.$page_id;
#==================================== SITE SETTINGS
define("SITE", [
    "NAME"      => "InPanel",
    "LANG"      => "en",
    "UP"        => True, // for maintenance set False;
    "ROOT"      => "", // test.com/example/test/ > example/test/
    "COPYRIGHT"      => "InPanel v 1.0 - Crafted by <a href='https://codebox.ir' title='کدباکس'>CODEBOX</a> © 2012 -  ".date("Y"),
 ]);



#==================================== DATABASE SETTINGS
define("DB_MAIN", [
    "HOSTNAME"  => "localhost",
    "PORT"      => 3306,
    "NAME"      => "inpanel_1",
    "PREFIX"    => '',  // NULL
    "USERNAME"  => "root",
    "PASSWORD"  => "root"
]);
#==================================== URLS & CDN
define('URL', 'http://inpanel.codebox.localhost/');
define('CDN', "http://cdn.codebox.localhost/");
define("CDN_STATUS", [ // 0 (LOCAL) - 1 (CDN)
    "ALL"   => 0,
    "JS"        => 1,
    "CSS"       => 1,
    "IMG"       => 1,
    "ICO"       => 0,
]);
function loudAsset ($type) {return (CDN_STATUS['ALL']) && (CDN_STATUS[$type]) ? CDN : URL;}
define('JS', loudAsset('JS')."asset/js/");
define('CSS', loudAsset('CSS')."asset/css/");
define('IMG', loudAsset('IMG')."asset/img/");
define('ICO', loudAsset('ICO')."asset/favico/");
define('ASSET', loudAsset('ALL')."asset/");
#==================================== CACHE SETTINGS
define("CACHE", [
    "ENABLE"    => 0, // 0 (OFF) - 1 (ON)
    "EXPIRY"    => 3600, // Seconds
]);
#==================================== SESSION SETTINGS
define('CSRF', 930); // Seconds
#==================================== DEBUG SETTINGS
define("DEBUG", [
    "LEVEL"  => 3, // 0 (OFF) - 1 (SQL) - 2 (IMPORTANT) - 3 (FULL)
    "VIEW"     => True,
    "LOG"      => False,
    "AJAX"     => False
]);
#==================================== LIBRARIES
define("LIB", [
    "M3"           => True,
    "SYS"          => True, 
    "LOGS"         => True,
    "DEBUG"        => True,
    "MYSQL"        => True,
    "VIEW"         => True,
    "PLUGIN"       => True,
    "JDATE"        => True,
    "LANG"         => False, // Not Ready Yet
    "SSP"          => True,  // Requier For DataTables
    "DataT"        => True,  // Need SSP
]);
#==================================== PLUGINS
define('PLUGINS', False);
#==================================== ePad
