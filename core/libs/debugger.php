<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * debugger.php
 * Created on 1/31/2019 6:14 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'debugger.php';
$run_pages .= ' > '.$page_id;
#==================================== DEFINE DEBUG
if (LIB['DEBUG'] && DEBUG['LEVEL']>0) {
    $M3_Loader['DEBUG']=1;
#==================================== M3 Debugger
    class M3_Debugger {
        private $LEVEL;
        private $LOG;
        private $VIEW;
        private $START;
        public $AJAX;
        public $JSON;
        private $ROWS = array();
#==================================== Construct @ M3 Debugger
        function __construct($start_time, $level = DEBUG['LEVEL'], $log = DEBUG['LOG'], $view = DEBUG['VIEW'])
        {
            $this->LEVEL = $level;
            $this->LOG = $log;
            $this->VIEW = $view;
            $this->START = $start_time;
            if ($this->LEVEL) {
                ini_set("error_reporting", E_ALL);
                error_reporting(E_ALL & ~E_NOTICE);
            }
            $this->AJAX = False;
        }
#==================================== Set Ajax Debuger @ MahanDebugger
        public function setAjax()
        {
            $this->AJAX = True;
        }
#==================================== Add Row @ MahanDebugger
        public function addRow($type = NULL, $value = NULL, $level = 3)
        {
            $this->ROWS[$level][$type][] = microtime(TRUE) . ' | ' . $value;
            return count($this->ROWS);
        }
#==================================== Print Rows @ MahanDebugger
        public function logIt($run_pages)
        {
            $date = date("Y-m-d");
            $time = round(microtime(TRUE) - $this->START, 5);
            $this->addRow("PageGen", "Page generated in <b>$time</b> seconds");
            $this->addRow("RUN", "Run on: $run_pages");
            $this->JSON = json_encode($this->ROWS);
            if ($this->LOG) {
                $value = "###################################### \n";
                $value .= '####### ' . date("Y-m-d h:i:sa") . "  Mahan 3 Debegger Level:$this->LEVEL \n";
                $value .= "####### Session: " . session_id() . " \n";
                $value .= "####### SID: " . $_SESSION['SID'] . " \n";
                $value .= "###################################### \n";
                if ($this->ROWS) {
                    foreach ($this->ROWS as $level => $types) {
                        if ($level <= $this->LEVEL) {
                            foreach ($types as $type => $item) {
                                $value .= '== ' . $type . "\n";
                                foreach ($item as $key => $val) {
                                    $value .= $key . ' | ' . $val . "\n";
                                }
                            }
                        }
                    }
                }
                $filepath = (!$this->AJAX) ? 'core/logs/' . $date . '.log' : 'core/logs/' . $date . '_ajax.log';
                $file = (file_exists($filepath)) ? fopen($filepath, 'a') : fopen($filepath, 'w');
                fwrite($file, $value);
                fclose($file);
            }
            if ($this->VIEW) {
                if (!$this->AJAX) {
                    $class = "active";
                    $value = "<div style='direction:ltr' class='table-responsive'><table class='table'><tr><th class='text-center'>" . date("Y-m-d h:i:sa") . " -  Mahan 3 Debegger Level:$this->LEVEL </th></tr>";
                    if ($this->ROWS) {
                        foreach ($this->ROWS as $level => $types) {
                            if ($level <= $this->LEVEL) {
                                foreach ($types as $type => $item) {
                                    ($type == "PageGen") ? $class = "info" : NULL;
                                    ($type == "Library") ? $class = "success" : NULL;
                                    ($type == "SQL") ? $class = "info" : NULL;
                                    ($type == "RUN") ? $class = "default" : NULL;
                                    ($type == "ERROR") ? $class = "danger" : NULL;
                                    ($type == "") ? $class = "warning" : NULL;
                                    $value .= '<tr class="' . $class . '"><td class="text-center">' . $type . "</td></tr>";
                                    foreach ($item as $key => $val) {
                                        $value .= '<tr><td class="text-left">' . $key . ' | ' . $val . "</td></tr></div>";
                                    }
                                }
                            }
                        }
                    }
                    $value .= "</table>";
                    echo $value;
                } else {
                    echo $this->JSON;
                }
            }
        }
    }
}
#==================================== ePad
