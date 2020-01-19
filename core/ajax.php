<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * ajax.php
 * Created on 1/31/2019 4:43 PM by Milad Abooali
 */
#==================================== PAGE PATH
$page_id = 'ajax.php';
$run_pages .= ' > '.$page_id;
#==================================== START

class MahanAjax {
    public $DEBUG;
    public $TOKEN;
    private $ST;
    private $SI;
    private $CLASS;
#==================================== Construct @ MahanAjax
    function __construct($debug = Null) {
        $this->DEBUG = $debug;
        $this->TOKEN = ($_POST['st']) ?? $_GET['st'];
        $this->ST = M3::csrf($this->TOKEN);
        $s_id = ($_GET['si']) ?? Null;
        $this->SI = ($s_id == $_SESSION['SID']) ? 1 : 0;
        ($this->DEBUG) ? $this->DEBUG->addRow('AJAX',"ST: ".$this->ST) : Null;
        ($this->DEBUG) ? $this->DEBUG->addRow('AJAX',"SI: ".$this->SI) : Null;
        if ($this->ST && $this->SI) {
            $this->CLASS = ($_GET['c']) ?? 'system';
            ($this->DEBUG) ? $this->DEBUG->addRow('AJAX', "Class: " . $this->CLASS) : Null;
        }
    }
    public function act () {
        if ($this->ST && $this->SI) {
            $_SESSION['TOKEN-EXPIRE'] = time() + CSRF;
            (file_exists('core/ajax/' . $this->CLASS . '.php')) ? require_once('core/ajax/' . $this->CLASS . '.php') : die("Error: AJAX(0) - Class Missing !");
            $action = ($_GET['a']) ?? 'defualt';
            ($this->DEBUG) ? $this->DEBUG->addRow('AJAX', "Action: $action") : Null;
            $id = ($_GET['id']) ?? ($_POST['id']) ?? 0;
            ($this->DEBUG) ? $this->DEBUG->addRow('AJAX', "id: $id") : Null;
            (function_exists($action)) ? $action($DEBUG) : http_response_code(404);
        } else {
            $output = new stdClass();
            $output->e = 'CSRF Token is not Valid';
            echo json_encode($output);
        }
    }
}
$AJAX_DEBUG = new M3_Debugger($start_time,3,DEBUG['$AJAX'],0);
$AJAX_DEBUG->AJAX = True;
$AJAX = new MahanAjax($AJAX_DEBUG);
$AJAX->act();
(!$AJAX_DEBUG) ?: $AJAX_DEBUG->logIt($run_pages);