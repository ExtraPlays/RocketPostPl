<?php
/**
 * @author Langsdorf
 * @license http://opensource.org/licenses/GPL-2.0 GNU GPL v.2
 * @version 1.0
 */
class MyMysqli {
	
	private $mysql_host;
	private $mysql_user;
	private $mysql_pass;
	private $mysql_db;
	private $my;
	private $site =  "https://rocketbr.com/pp/plugins/";
	
	public function __construct($mysql_host, $mysql_user, $mysql_pass, $mysql_db){
		$this->mysql_host = $mysql_host;
		$this->mysql_user = $mysql_user;
		$this->mysql_pass = $mysql_pass;
		$this->mysql_db   = $mysql_db;
		$this->my = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
	}
	
	public function __destruct(){
		if(is_object($this->my)){
			$this->my->close();
		}
	}
	
	
	public function postPlugin($nome, $versao, $versaosv, $autor, $info, $id){
		$nome = mysqli_real_escape_string($this->my, $nome);
		$versao = mysqli_real_escape_string($this->my, $versao);
		$versaosv = mysqli_real_escape_string($this->my, $versaosv);
		$autor = mysqli_real_escape_string($this->my, $autor);
		$info = mysqli_real_escape_string($this->my, $info);
		$id = mysqli_real_escape_string($this->my, $id);
		
		$sq1 = "SELECT * FROM plugins WHERE id = '" . $id . "';";
		$query1 = $this->my->query($sq1);
		if(mysqli_num_rows($query1) > 0){
			return "1";
		} else {
			$sq2 = "INSERT INTO plugins (`id`, `nome`, `versao`, `versaosv`, `autor`, `info`) values ('" . $id . "','" . $nome . "','" . $versao . "','" . $versaosv . "','" . $autor . "','" . $info . "')";
			$query2 = $this->my->query($sq2);
			header("Location: https://rocketbr.com/pp/index");
		}
	}
	
	public function getPlugin($id)  {
		$sq1 = "SELECT * FROM plugins WHERE id = '" . $id . "';";
		$query1 = $this->my->query($sq1);
		if(mysqli_num_rows($query1) > 0){
			$row = mysqli_fetch_array($query1);
			$arr = array("nome" => $row['nome'], "id" => $row['id'], "versao" => $row['versao'], "versaosv" => $row['versaosv'], "autor" => $row['autor'], "info" => $row['info']);
			return $arr;
		} else {
			return array("1" => 1);
		}
	}
	
	public function deletePlugin($id) {
		$sq1 = "SELECT * FROM plugins WHERE id = '" . $id . "';";
		$query1 = $this->my->query($sq1);
		if(mysqli_num_rows($query1) > 0){
			$sq2 = "DELETE FROM plugins WHERE id = '" . $id . "';";
			$query2 = $this->my->query($sq2);
		} else {
			return "1";
		}
	}
	
	public function getPL() {
		$sq1 = "SELECT * FROM plugins";
		$query1 = $this->my->query($sq1);
		if(mysqli_num_rows($query1) > 0){
			$rows = Array();
			while($row = mysqli_fetch_array($query1)){
				array_push($rows, $row);
			}
			return count($rows);
		} else {
			return "0";
		}
	}
	
}