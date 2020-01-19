<?php
/*================================== CODEBOX FrameWoek
 * Mahan 3.0.0
 * plugin.php
 * Created on 6/7/2019 7:39 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'plugin.php';
$run_pages = (!$run_pages) ? $run_pages . ' > ' . $page_id : $page_id;
#==================================== DEFINE MYSQL
if (LIB['PLUGIN']) {
    $M3_Loader['PLUGIN']=1;
#==================================== M3 View
    class M3_Plugin {
        public $DEBUG;

#==================================== Construct @ M3 Plugin
        function __construct($debug=Null) {
            $this->DEBUG = $debug;

        }
#==================================== Destruct @ M3 Plugin

#==================================== LIST PLUGINS @ M3 Plugin
        public function list() {
            $DB_SYSTEM_PLUGINS = new M3_Database('system_plugins', $this->DEBUG);
            $installed_plugins =  $DB_SYSTEM_PLUGINS->selectAll(0,'priority ASC');
            unset($DB_TEST);
            $dirs = array_filter(glob('core/plugins/*'), 'is_dir');
            foreach($dirs as $dir) {
                $plugins[basename($dir)]['path']=$dir;
                $plugins[basename($dir)]['installed']= False;
            }
            foreach($installed_plugins as $installed_plugin) {
                $plugins[$installed_plugin['name']]['installed'] = True;
                $plugin_path='core/plugins/'.$installed_plugin['name'];
                $plugins[$installed_plugin['name']]['exists'] = (file_exists($plugin_path)) ? True : False;
                $plugins[$installed_plugin['name']]['tbl']=explode(",",$installed_plugin['tables']);
                foreach($plugins[$installed_plugin['name']]['tbl'] as $table) {
                    $plugins[$installed_plugin['name']]['tables'][$table] = $DB_SYSTEM_PLUGINS->is_table($table);
                }
                unset($plugins[$installed_plugin['name']]['tbl']);
                if (file_exists($plugin_path.'/info.php')) {
                    require_once($plugin_path.'/info.php');
                    $plugins[$installed_plugin['name']]['update'] = ($plugins[$installed_plugin['name']]['info']['ver'] == $installed_plugin['ver']) ? False : True;
                }
            }
        }
#==================================== Set Theme @ M3 Plugin
        public function priority( ) {

        }
#==================================== Set Theme @ M3 Plugin
        public function status( ) {

        }
#==================================== Set Theme @ M3 Plugin
        public function types( ) {

        }
#==================================== Set Theme @ M3 Plugin
        public function vids( ) {

        }
#==================================== Set Theme @ M3 Plugin
        public function update( ) {

        }
#==================================== Set Theme @ M3 Plugin
        public function run( ) {

        }
#==================================== Set Theme @ M3 View
        public function admin( ) {

        }
#==================================== Set Theme @ M3 View
        public function manage( ) {

        }
    }
}
#==================================== ePad

//M3::echo($plugins);



