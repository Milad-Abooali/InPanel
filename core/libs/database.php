<?php
/*================================== Codebox Framework
 * Mahan 3.0.0
 * database.php
 * Created on 1/31/2019 6:50 PM by Milad Abooali
 */
#==================================== PAGE PATH 
$page_id = 'database.php';
$run_pages .= ' > '.$page_id;
#==================================== DEFINE MYSQL
if (LIB['MYSQL']) {
    $M3_Loader['MYSQL']=1;
#==================================== M3 Database
    class M3_Database {
        private $HOSTNAME;
        private $PORT;
        private $DATABASE;
        private $USERNAME;
        private $PASSWORD;
        private $PREFIX;
        private $TABLE;
        public $CON_DB;
        public $NOW;
        public $DEBUG;
#==================================== Construct @ M3 Database
        function __construct($table, $debug=Null, $database=DB_MAIN) {
            $this->DEBUG = $debug;
            $this->HOSTNAME = $database['HOSTNAME'];
            $this->PORT = $database['PORT'];
            $this->DATABASE = $database['NAME'];
            $this->USERNAME = $database['USERNAME'];
            $this->PASSWORD = $database['PASSWORD'];
            $this->PREFIX = $database['PREFIX'];
            $this->TABLE = $this->PREFIX.$table;
            $this->NOW = date("Y-m-d");
            $this->CON_DB = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DATABASE, $this->PORT) or die ('Cannot connect to server');
            mysqli_set_charset($this->CON_DB, 'utf8');
            mb_internal_encoding('UTF-8');
            mb_http_output('UTF-8');
            mb_http_input('UTF-8');
            mb_language('uni');
            mb_regex_encoding('UTF-8');
            (!mysqli_connect_errno()) ?: die("Failed to connect to MySQL: " . mysqli_connect_error());
        }
#==================================== Destruct @ M3 Database
        public function __destruct() {
            if(mysqli_close($this->CON_DB)) {
                (!$this->DEBUG) ?: $this->DEBUG->addRow('SQL',' DB Connection Closed: ' . $this->DATABASE .'.'. $this->TABLE,1);
            }
        }
#==================================== Test DB @ M3 Database
        public function test() {
            $retval = mysqli_query($this->CON_DB, 'SELECT version() as ver') or die('Test; ' . mysqli_error($this->CON_DB));
            $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
            (!$this->DEBUG) ?: $this->DEBUG->addRow('SQL','Test ver: '.$row['ver'],1);
            return ($row) ? TRUE : False;
        }
#==================================== Table Exists DB @ M3 Database
        public function is_table($tabel) {
            $retval = mysqli_query($this->CON_DB, "SHOW TABLES LIKE '$tabel'") or die('Test; ' . mysqli_error($this->CON_DB));
            $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
            (!$this->DEBUG) ?: $this->DEBUG->addRow('SQL','Table Exists: '.$tabel,1);
            return ($row) ? TRUE : False;
        }
#==================================== Table Column List @ M3 Database
        public function columnList() {
            $retval = $this->run("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE TABLE_NAME='$this->TABLE' AND TABLE_SCHEMA='$this->DATABASE'");
            $list=array();
            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                $list[] = $row;
            }
            foreach ($list as $key => $value) {
                $output[$key] = $value['COLUMN_NAME'];
            }
            return ($output) ? $output : False;
        }
#==================================== Table Info DB @ M3 Database
        public function table_info($tabel) {
            $retval = $this->run("show table status from mahan_m3 WHERE Name='$tabel'");
            $output=array();
            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                $output[] = $row;
            }
            return (count($output)==1) ? $output['0'] : $output;
        }
#==================================== Run @ M3 Database
        private function run($sql, $insert=FALSE) {
            $retval = mysqli_query($this->CON_DB, $sql) or die('RUN Error: ' . mysqli_error($this->CON_DB));
            $insert_id = mysqli_insert_id($this->CON_DB);
            (!$this->DEBUG) ?: $this->DEBUG->addRow('SQL',$sql.' > '.$insert_id,1);
            return ($insert) ? $insert_id : $retval;
        }
#==================================== Query @ M3 Database
        protected function query($sql, $limit=0, $order=0) {
            $order = mysqli_real_escape_string ($this->CON_DB, $order);
            $limit = mysqli_real_escape_string ($this->CON_DB, $limit);
            (!$order) ?: $sql.=" ORDER BY $order ";
            (!$limit) ?: $sql.=" LIMIT $limit ";
            $retval = $this->run($sql);
            $output=array();
            if(is_object($retval)) {
                while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                    $output[] = $row;
                }
                mysqli_free_result($retval);
            }
            return ($limit==1) ? $output['0'] : $output;
        }
#==================================== Escape @ M3 Database
        public function escape($string=Null) {
            if ($string) {
                if (is_array($string)) {
                    foreach ($string as $key => $value) {
                        $key = mysqli_real_escape_string($this->CON_DB, $key);
                        $value = mysqli_real_escape_string($this->CON_DB, $value);
                        $output[$key] = $value;
                    }
                } else {
                    $output = mysqli_real_escape_string($this->CON_DB, $string);
                }
            }
            return ($output) ?? False;
        }
#==================================== Run SQL @ M3 Database
        public function runSQL($sql) {
            $retval = $this->run($sql);
            $output=array();
            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                $output[] = $row;
            }
            return (count($output)==1) ? $output['0'] : $output;
        }
#==================================== Decrease @ M3 Database
        public function decrease($column,$where=0,$count=1) {
            $column = mysqli_real_escape_string ($this->CON_DB, $column);
            $count = mysqli_real_escape_string ($this->CON_DB, $count);
            $sql = "UPDATE $this->TABLE SET $column=$column-$count";
            (!$where) ?: $sql.=" WHERE $where ";
            $output = $this->query($sql);
            return ($output) ? True : False;
        }
#==================================== Increase @ M3 Database
        public function increase($column,$where=0,$count=1) {
            $column = mysqli_real_escape_string ($this->CON_DB, $column);
            $count = mysqli_real_escape_string ($this->CON_DB, $count);
            $sql = "UPDATE $this->TABLE SET $column=$column+$count";
            (!$where) ?: $sql.=" WHERE $where ";
            $output = $this->query($sql);
            return ($output) ? True : False;
        }
#==================================== Exist @ M3 Database
        public function exist ($where=0, $end='2050-01-01', $start='000-00-00') {
            $start = mysqli_real_escape_string ($this->CON_DB, $start);
            $end = mysqli_real_escape_string ($this->CON_DB, $end);
            $sql = "SELECT * FROM $this->TABLE WHERE DATE(timestamp) between '$start' and '$end'";
            (!$where) ?: $sql.=" AND $where ";
            $output = $this->query($sql);
            return ($output) ? True : False;
        }
#==================================== Count @ M3 Database
        public function count ($where=0, $end='2050-01-01', $start='000-00-00') {
            $start = mysqli_real_escape_string ($this->CON_DB, $start);
            $end = mysqli_real_escape_string ($this->CON_DB, $end);
            $sql = "SELECT COUNT(*) as count FROM $this->TABLE WHERE DATE(timestamp) between '$start' and '$end'";
            (!$where) ?: $sql.=" AND $where ";
            return $this->query($sql,1)['count'];
        }
#==================================== Sum @ M3 Database
        public function sum ($column, $where=0, $end='2050-01-01', $start='000-00-00') {
            $column = mysqli_real_escape_string ($this->CON_DB, $column);
            $start = mysqli_real_escape_string ($this->CON_DB, $start);
            $end = mysqli_real_escape_string ($this->CON_DB, $end);
            $sql = "SELECT SUM($column) as sum FROM $this->TABLE WHERE DATE(timestamp) between '$start' and '$end' ";
            (!$where) ?: $sql.=" AND $where ";
            return $this->query($sql,1)['sum'];
        }
#==================================== Select @ M3 Database
        public function selectPage ($page=1, $limit=25, $order=0, $column='*', $where=0) {
            mysqli_real_escape_string ($this->CON_DB, $page);
            $offset=($page*$limit)-$limit;
            $r_out = ((strpos($column, ' ') !== false) || (strpos($column, ',') !== false)) ?: TRUE;
            $column = mysqli_real_escape_string ($this->CON_DB, $column);
            $sql = "SELECT $column FROM $this->TABLE";
            (!$where) ?: $sql.=" WHERE $where ";
            $limitOffset = $limit.' OFFSET '.$offset;
            $output = $this->query($sql, $limitOffset, $order);
            return (count($output)==1) ? ($column!='*' && $r_out) ? $output[$column] : $output : $output;
        }
#==================================== Select @ M3 Database
        public function select ($column='*', $where=0, $limit=0, $order=0) {
            $r_out = ((strpos($column, ' ') !== false) || (strpos($column, ',') !== false)) ?: TRUE;
            $column = mysqli_real_escape_string ($this->CON_DB, $column);
            $sql = "SELECT $column FROM $this->TABLE";
            (!$where) ?: $sql.=" WHERE $where ";
            $output = $this->query($sql, $limit, $order);
            return (count($output)==1) ? ($column!='*' && $r_out) ? $output[$column] : $output : $output;
        }
#==================================== Select @ M3 Database
        public function selectRow ($where=0, $order=0) {
            $sql = "SELECT * FROM $this->TABLE";
            (!$where) ?: $sql.=" WHERE $where ";
            return $this->query($sql, 1, $order);
        }
#==================================== Select All @ M3 Database
        public function selectAll ($limit=0, $order=0) {
            $sql = "SELECT * FROM $this->TABLE";
            return $this->query($sql, $limit, $order);
        }
#==================================== Select in date @ M3 Database
        public function selectInDate ($column='*',$end='2050-01-01', $start='000-00-00', $where=0, $limit=0, $order=0) {
            $r_out = ((strpos($column, ' ') !== false) || (strpos($column, ',') !== false)) ?: TRUE;
            $column = mysqli_real_escape_string ($this->CON_DB, $column);
            $start = mysqli_real_escape_string ($this->CON_DB, $start);
            $end = mysqli_real_escape_string ($this->CON_DB, $end);
            $sql = "SELECT $column FROM $this->TABLE WHERE DATE(timestamp) between '$start' and '$end' ";
            (!$where) ?: $sql.=" AND $where ";
            $output = $this->query($sql, $limit, $order);
            return (count($output)==1) ? ($column!='*' && $r_out) ? $output[$column] : $output : $output;
        }
#==================================== Select by id @ M3 Database
        public function selectByID ($id, $column='*') {
            $r_out = ((strpos($column, ' ') !== false) || (strpos($column, ',') !== false)) ?: TRUE;
            $id = mysqli_real_escape_string ($this->CON_DB, $id);
            $column = mysqli_real_escape_string ($this->CON_DB, $column);
            $sql = "SELECT $column FROM $this->TABLE WHERE id=$id";
            $output = $this->query($sql,1);
            return ($column!='*' && $r_out) ? $output[$column] : $output;
        }
#==================================== Status by id @ M3 Database
        public function status ($id) {
            $id = mysqli_real_escape_string ($this->CON_DB, $id);
            $sql = "SELECT status FROM $this->TABLE WHERE id=$id";
            $output = $this->query($sql,1);
            return ($output) ?  $output['status'] : False;
        }
#==================================== Timestanp by id @ M3 Database
        public function timestamp ($id) {
            $id = mysqli_real_escape_string ($this->CON_DB, $id);
            $sql = "SELECT timestamp FROM $this->TABLE WHERE id=$id";
            $output = $this->query($sql,1);
            return ($output) ?  $output['timestamp'] : False;
        }
#==================================== Delete by id @ M3 Database
        public function delete($id) {
            $id = mysqli_real_escape_string ($this->CON_DB, $id);
            $sql = "DELETE FROM $this->TABLE Where id=$id";
            return $this->run($sql);
        }
#==================================== Delete multi @ M3 Database
        public function deleteMulti($where=0, $end='2050-01-01', $start='000-00-00') {
            $start = mysqli_real_escape_string ($this->CON_DB, $start);
            $end = mysqli_real_escape_string ($this->CON_DB, $end);
            $sql = "DELETE FROM $this->TABLE WHERE DATE(timestamp) between '$start' and '$end' ";
            (!$where) ?: $sql.=" AND $where ";
            return $this->run($sql);
        }
#==================================== Reset @ M3 Database
        public function reset() {
            $sql = "TRUNCATE TABLE $this->TABLE";
            return $this->run($sql);
        }
#==================================== Update by id @ M3 Database
        public function updateID($id, $array) {
            $id = mysqli_real_escape_string ($this->CON_DB, $id);
            $output = array();
            foreach ($array as $column=>$value) {
                $column = mysqli_real_escape_string ($this->CON_DB, $column);
                $value = mysqli_real_escape_string ($this->CON_DB, $value);
                $sql = "UPDATE $this->TABLE SET $column='$value' WHERE id=$id";
                $output[$column] = $this->run($sql);
            }
            return $output;
        }
#==================================== Update multi @ M3 Database
        public function updateMulti($array, $where=0, $end='2050-01-01', $start='000-00-00') {
            $start = mysqli_real_escape_string ($this->CON_DB, $start);
            $end = mysqli_real_escape_string ($this->CON_DB, $end);
            $output = array();
            foreach ($array as $column=>$value) {
                $column = mysqli_real_escape_string ($this->CON_DB, $column);
                $value = mysqli_real_escape_string ($this->CON_DB, $value);
                $sql = "UPDATE $this->TABLE SET $column='$value' WHERE DATE(timestamp) between '$start' and '$end' ";
                (!$where) ?: $sql.=" AND $where ";
                $output[$column] = $this->run($sql);
            }
            return $output;
        }
#==================================== Insert @ M3 Database
        public function insert ($array) {
            foreach ($array as $k=>$v) {
                $n_array [mysqli_real_escape_string ($this->CON_DB, $k)] = mysqli_real_escape_string ($this->CON_DB, $v);
            }
            $columns = implode(", ",array_keys($n_array));
            $values  = implode("', '", $n_array);
            $sql = "INSERT INTO $this->TABLE ($columns) VALUES ('$values')";
            return $this->run($sql,1);
        }
    }
}
#==================================== ePad

