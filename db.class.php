<?php
class db{
	private $host="localhost";
	private $un="USERNAME";
	private $password="PASSWORD";
	public function db($db="urlshortener"){
		if(!isset($connection)||$connection==false){
			$this->db=$db;
			$this->connect=mysql_connect($this->host, $this->un, $this->password);
			mysql_set_charset('utf8', $this->connect);
			if(!$this->connect){
				$connection=false;
				die('Could not connected to server::'.mysql_error());
			}
			$sel_db=mysql_select_db($this->db, $this->connect);
			if(!$sel_db){
				$connection=false;
				die("Could not connect to server : ".mysql_error());
			}else{
				$connection=true;
			}
		}
	}

	public function table_exist($table){
		$sel_sql="SHOW TABLES LIKE '$table'";
		$res=mysql_query($sel_sql);
		$count=mysql_num_rows($res);
		if($count>0){
			return true;
		}else{
			return false;
		}
	}
	public function select($tablename, $column, $where, $order, $limit){
		if(isset($this->select_res)){
			unset($this->select_res);
		}
		$sel_sql="SELECT ".$column." FROM ".$tablename;
		if($where!="none"){
			$sel_sql="SELECT ".$column." FROM ".$tablename." WHERE ".$where;
		}
		if($order!='none'){
			$sel_sql=$sel_sql." ORDER BY ".$order;
		}
		if($limit!='none'){
			$sel_sql=$sel_sql." LIMIT ".$limit;
		}
		$sel_res=mysql_query($sel_sql);
		$this->sel_count_row=mysql_num_rows($sel_res);
		return mysql_fetch_array($sel_res);
	}

	public function insert($table, $column){
		$ins_sql="INSERT into ".$table." SET ".$column;
		$ins_res=mysql_query($ins_sql);
		$id = mysql_insert_id();
		return $id;
	}

	public function update($table, $column, $where, $limit){
		$upd_sql="UPDATE ".$table." SET ".$column." WHERE ".$where;
		if($limit!='none'){
			$upd_sql="UPDATE ".$table." SET ".$column." WHERE ".$where." LIMIT ".$limit;
		}
		$upd_res=mysql_query($upd_sql);
	}

	public function delete($table, $where){
		$del_sql="DELETE FROM ".$table." WHERE ".$where;
		$del_res=mysql_query($del_sql);
	}

	public function disconnect(){
		if($this->connect){
			$diconnect=mysql_close($this->connect);
		}
	}
}

?>
