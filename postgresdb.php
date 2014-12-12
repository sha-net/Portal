<?php
class PostgresDB{
	var $host        = "host=127.0.0.1";
	var $port        = "port=5432";
	var $dbname      = "dbname=phpDB";
	var $credentials = "user=phpPortal password=phpPortal";
	var $db;
	
	function dbConnect(){
	   $this->db = pg_connect( "$this->host $this->port $this->dbname $this->credentials"  );
	   if(!$this->db){
	   	echo "Error : Unable to open database\n";
	   } else {
	   	echo "Opened database successfully\n";
	   }
	}
	
	function dbCreateTBL(){
	   $sql =<<<EOF
	      CREATE TABLE shavit
	      (ID INT PRIMARY KEY     NOT NULL,
	      NAME           TEXT    NOT NULL,
	      AGE            INT     NOT NULL,
	      ADDRESS        CHAR(50),
	      SALARY         REAL);
EOF;
	   
	   $ret = pg_query($this->db, $sql);
	   if(!$ret){
	   	echo pg_last_error($this->db);
	   } else {
	   	echo "Table created successfully\n";
	   }
	}

	function dbCreateTBLHSS(){
		$sql =<<<EOF1
			CREATE TABLE serversList
			(IP text,
			Hostname text,
			LOB text,
			Customer text,
			Location text,
			Role text,
			URL text,
			version text,
			upgrade_date text,
			Connection_type text,
			GENERAL_INFO text,
			Cstmr_level text,
			preffered_upgrade_date text,
			Custoemr_Upgrade_notes text,
			upgrade_length text,
			CSM	text); 
EOF1;
		$ret = pg_query($this->db,$sql);
		if(!$ret){
			echo pg_last_error($this->db);
		} else {
			echo "Table created successfully\n";
		}			
	}
	
	function dbClose(){
	   pg_close($this->db);
	}
}
?>