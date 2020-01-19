<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * language.php
 * Created on 4/25/2019 8:07 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'language.php';
$run_pages = (!$run_pages) ? $run_pages . ' > ' . $page_id : $page_id;
#==================================== DEFINE LANGUAGE
if (LIB['LANG']) {
    $M3_Loader['LANG']=1;
#==================================== M3 Lang
    class M3_LANG {
        private $SELECTED;
        private $PATH;
        public $LANG=array();
#==================================== Construct @ M3 Lang
        function __construct($lang=SITE['LANG'],$debug=Null) {
            $this->DEBUG = $debug;
            $this->setCore($lang);
        }
#==================================== Call File @ M3 Lang
        public function call($file) {
            $lang_file = "core/language/".$this->SELECTED."/$file.ini";
            (file_exists($lang_file)) ? $this->PATH=$lang_file : $this->PATH='core/language/'.SITE['LANG']."/$file.ini";
            $this->LANG=parse_ini_file($this->PATH,true);
            (!$this->DEBUG) ?: $this->DEBUG->addRow('LANG',$this->SELECTED .' > '.$file.' Loaded.',1);
        }
#==================================== Core @ M3 Lang
        public function setCore($lang=SITE['LANG']) {
            $this->SELECTED = $lang;
            $lang_core = "core/language/$lang/core.ini";
            (file_exists($lang_core)) ? $this->PATH=$lang_core : $this->PATH='core/language/'.SITE['LANG'].'/core.ini';
            $this->LANG=parse_ini_file($this->PATH,true);
            (!$this->DEBUG) ?: $this->DEBUG->addRow('LANG',$lang .' Loaded.',1);
        }
#==================================== Add @ M3 Lang
        public function add($value,$section,$lang,$file='core') {
            $lang_core = "core/language/".$lang.'/'.$file.".ini";
            $path=(file_exists($lang_core)) ? $lang_core : False;
            $value=str_replace(null, null, http_build_query($value, null, "\n"));
            $value=';====Updated '.date("Y-m-d h:i:sa")."\n".'['.$section.']'."\n".$value;
            if ($path) {
                $file = fopen($path, "a");
                if ($file) {
                    fwrite($file, "\n\n". $value);
                    fclose($file);
                    (!$this->DEBUG) ?: $this->DEBUG->addRow('LANG',$lang.' > '.$file.' Updated.',1);
                    return True;
                }
            } else {
                (!$this->DEBUG) ?: $this->DEBUG->addRow('ERROR',' LANG update error !',1);
                return False;
            }
        }
#==================================== Get @ M3 Lang
        public function get($value,$section='core') {
            return (array_key_exists($value,$this->LANG[$section])) ? $this->LANG[$section][$value] : ' ['.$section.'_'.$value.'] ';
        }
    }
}
#==================================== ePad

//$en=new MahanLanguage('en');
//echo $en->get('test').'<br />';
//echo $en->get('dir','html').'<br />';
//echo $en->get('dir','user').'<br />';
//echo $en->get('test','user').'<br />';
//
//$test= array(
//    "dir" => "good",
//    "test" => "bad"
//);
//$en->add($test,'user','en','core');