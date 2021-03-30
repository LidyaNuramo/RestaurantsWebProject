<?php

class Database
{	
	private $connection = null;
	private $results = array();
	private $host = "localhost";
	private $port = 3307;
	private $db = "cars";
	private $user = "root";
	private $password = "";
	private $db_prefix = "";

	/* MySQL functions */
	private function connect($host, $user, $password, $db, $port) {
		return mysqli_connect($host, $user, $password, $db, $port);
	}

	function query($sql) {
		$query = mysqli_query($this->connection, $sql);
		if(!$query) {
			die(htmlspecialchars(mysqli_error($this->connection)));
		}
		return $query;	
	}

	function prepareSqlData($value) {
		return mysqli_real_escape_string($this->connection, $value);
	}

	private function fetchRows($result) {
		return mysqli_fetch_assoc($result);
	}

	function freeResult($result) {
		mysqli_free_result($result);
	}

	function __construct() {
		$this->connection = $this->connect($this->host, $this->user, $this->password, $this->db, $this->port);
		$this->query("SET NAMES 'utf8'");
	}

	function insertRows($table, $data) {
		$cnt_data = count($data);
		$mysql_fields = array();
		$mysql_values = array();

		if($cnt_data) {
			foreach($data as $key => $value) {
				$mysql_fields[] = "`".$key."`";
				$mysql_values[] = "'".$this->prepareSqlData($value)."'";	
			}

			$q = "INSERT INTO `".$this->db_prefix.$table."`(".implode(",", $mysql_fields).") VALUES(".implode(",", $mysql_values).")";
			$result = $this->query($q);
		}
	}

	function getRows($table, $fields = "*", $data = array(), $glue = "AND", $orderBy = null, $limit = null) {
		$cnt_data = count($data);
		$clause = "";
		$this->results = array();

		if(is_array($fields)) {
			$fields = implode(",", array_map(function($value) {return "`".$value."`";}, $fields));
		}
		
		if($cnt_data) {
			$where = array();

			foreach ($data as $key => $value) {
				$where[] = "`".$key."` ".$value;
			}

			$clause = " WHERE ".implode(" ".$glue." ", $where);
		}

		if($orderBy) {
			$orderBy = " ORDER BY ".$orderBy;	
		}

		if($limit) {
			$limit = " LIMIT ".$limit;
		}

		$q = "SELECT ".$fields." FROM `".$this->db_prefix.$table."`".$clause.$orderBy.$limit;
		$result = $this->query($q);

		while($row = $this->fetchRows($result)) {
			$this->results[] = $row;	
		}

		$this->freeResult($result);
		return $this->results;
	}
}

$database=new Database();
$d=new DateTime();
$date=$d->format('Y-m-d H:i:s');
$data=array(
	"ID"=>null,
	"Date_"=>$date,
);
$database->insertRows("test",$data);
$where['ID']= "";
$database=new Database();
$results=$database->getRows("Test","*",$where);
$rr="<form method='get' action='home.html'>
    <button type='submit'>Back</button>
</form><table style='width:100%' border='1' bordercolor='black'>
        <caption><font size=10><b>Test Information</b></font></caption>
        <tr>
            <th>ID</th>
            <th>Date</th>
        </tr>";
foreach($results as $result){
    $rr=$rr."<tr>";
    $rr=$rr."<td>".$result['ID']."</td>";
    $rr=$rr."<td>".$result['Date_']."</td>";
    $rr=$rr."</tr>";
};
$rr=$rr."</table>";
echo $rr;
?>