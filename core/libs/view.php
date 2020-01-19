<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * view.php
 * Created on 3/4/2019 8:37 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'view.php';
$run_pages .= ' > '.$page_id;
#==================================== START
#==================================== DEFINE MYSQL
if (LIB['VIEW']) {
    $M3_Loader['VIEW']=1;
#==================================== M3 View
    class M3_View {
        public $DEBUG;
        public $UI;
        private $THEME;
        private $TYPE;
        public $PATH;
        public $VID;
        public $__ = array();
#==================================== Construct @ M3 View
        function __construct($vid,$them=Null,$type=Null,$debug=Null) {
            (!$this->DEBUG) ?: $this->DEBUG->addRow('VIEW',$them .' > ' . $type .' | Called '. $vid ,2);
            $this->DEBUG = $debug;
            $this->VID = $vid;
            $this->setTheme($them);
            $this->setType($type);
            (!$this->DEBUG) ?: $this->DEBUG->addRow('VIEW',$this->THEME .' > ' . $this->TYPE .' | Loaded',2);
            $this->setPath();
        }
#==================================== Destruct @ M3 View

#==================================== Set Theme @ M3 View
        public function setTheme($them) {
            $them = (!$them) ? 'Termeh' : $them;
            $them_folder="core/views/$them";
            $this->THEME = (file_exists($them_folder.'/info.json')) ? $them : False;
            $this->UI = (file_exists($them_folder.'/info.json')) ? json_decode(file_get_contents($them_folder.'/info.json')) : False;
        }
#==================================== Set Type @ M3 View
        public function setType($type) {
            $this->TYPE = $type;
        }
#==================================== Set Path @ M3 View
        private function setPath() {
            $this->PATH = 'core/views/'.$this->THEME .'/'.$this->TYPE.'.php';
        }

#==================================== Set Type @ M3 View
        private function readPHP ($string) {
            $string=str_replace("<PHP>"," <?php ",$string);
            $string=str_replace("<PHP=>"," <?= ",$string);
            $string=str_replace("</PHP>"," ?> ",$string);
            return $string;
        }
#==================================== Generate UI @ M3 View
        public function gUI($PAGE,$CACH) {
            define('THEME', "core/views/$this->THEME/");
            $output = NULL;
            $cachefile = 'cache/'.str_replace("/","_",$this->THEME).'_'.str_replace("/","_",$this->TYPE).'_'.$this->VID;
            foreach($_GET as $key => $var) {
                $cachefile .= '_'.$key.'-'.$var;
            }
            $cachefile .= '.php';
            $cachetime = CACHE['EXPIRY'];
            if (CACHE['ENABLE'] && file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile)) && $CACH) {
                $cachetime_date=date('Y-m-d H:i:s', filemtime($cachefile));
                $output = file_get_contents($cachefile);
                $output = $this->readPHP($output);
                eval ("?> $output");
                (!$this->DEBUG) ?: $this->DEBUG->addRow('VIEW',"Load page From cache [$cachetime_date] > [$cachefile]",2);
                M3::console("Load page From cache [$cachetime_date]");
            } else {
                $cachetime_date=date('Y-m-d H:i:s', time());
                $output .= (file_exists($this->PATH)) ? file_get_contents ($this->PATH) :  file_get_contents ("core/views/notheme.php");
                if (CACHE['ENABLE'] && $CACH) {
                    ob_start();
                    eval ("?> $output");
                    $cached = fopen($cachefile, 'w');
                    if(is_resource($cached)) {
                        fwrite($cached, ob_get_clean());
                        fclose($cached);
                        (!$this->DEBUG) ?: $this->DEBUG->addRow('VIEW',"Create cache on $cachetime_date > [$cachefile]",2);
                        $output = file_get_contents($cachefile);
                    } else {
                        (!$this->DEBUG) ?: $this->DEBUG->addRow('ERROR',"Create cache on $cachetime_date > [$cachefile]",2);
                        M3::console('Error: '.$cachefile);
                    }
                } else {
                    $output = $this->readPHP($output);
                    $output = eval ("?> $output");
                }
                $output = $this->readPHP($output);
                eval ("?> $output");
                M3::console("Load page From cache [ NO ]");
            }
         }
#==================================== Clear Cache @ M3 View
        public function clearCache($them=Null,$type=Null,$vid=Null) {
            $mask = M3::path('cache').'/'.$them ?? '*'.'_'.$type ?? '*'.'_'.$vid ?? '*'.'.php';
            array_map('unlink', glob($mask));
        }
    }
}
#==================================== ePad


#==================================== ePad

