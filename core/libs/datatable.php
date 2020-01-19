<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * datatable.php
 * Created on 8/4/2019 3:37 PM by Milad Abooali
 */
#==================================== PAGE PATH
$page_id = 'datatable.php';
$run_pages .= ' > '.$page_id;
#==================================== START
#==================================== DEFINE DataT
if (LIB['DataT']) {
    $M3_Loader['DataT']=1;
#==================================== M3 DataT
    class M3_DataT {
        public $DEBUG;
        private $DB_DETAIL;
        private $TABLE;
        private $KEY;
        private $COLUMNS;
        private $WHERE;
#==================================== Construct @ M3 DataT
        function __construct($table,$key='id',$db=Null,$debug=Null) {
            $this->DEBUG = $debug;
            $this->TABLE = $table;
            $this->KEY = $key;
            $this->DB_DETAIL = ($db) ? $db : array(
                'user' => DB_MAIN['USERNAME'],
                'pass' => DB_MAIN['PASSWORD'],
                'db'   => DB_MAIN['NAME'],
                'host' => DB_MAIN['HOSTNAME']
            );
        }
#==================================== Destruct @ M3 DataT

#==================================== Set Columns @ M3 DataT
        public function setColumns ($array) {
            $this->COLUMNS = $array;
            return True;
        }
#==================================== Add Columns @ M3 DataT
        public function addColumn ($array) {
            $this->COLUMNS [] = $array;
            return True;
        }
#====================================  Set Where @ M3 DataT
        public function setWhere ($where=Null) {
            $this->WHERE = $where;
            return True;
        }
#==================================== Generate @ M3 DataT
        public function generate () {
            (!$this->DEBUG) ?: $this->DEBUG->addRow('DataT',$this->TABLE .' on '. $this->KEY,2);
            return json_encode(SSP::complex($_GET,$this->DB_DETAIL,$this->TABLE, $this->KEY,$this->COLUMNS,$this->WHERE));
        }
    }
}
#==================================== ePad



//    $columns = array(
//        array( 'db' => 'first_name', 'dt' => 0 ),
//        array( 'db' => 'last_name',  'dt' => 1 ),
//        array( 'db' => 'position',   'dt' => 2 ),
//        array( 'db' => 'office',     'dt' => 3 ),
//        array(
//            'db'        => 'start_date',
//            'dt'        => 4,
//            'formatter' => function( $d, $row ) {
//                return date( 'jS M y', strtotime($d));
//            }
//        ),
//        array(
//            'db'        => 'salary',
//            'dt'        => 5,
//            'formatter' => function( $d, $row ) {
//                return '$'.number_format($d);
//            }
//        )
//    );