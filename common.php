<?
	include_once('config/db_config.php');
	mysql_connect(mysql_host, mysql_user, mysql_pw) or die('MySQL Connect Error!!!');
    mysql_select_db(mysql_db) or die('MySQL DB Error!!!');
	/*sql_set_charset('utf8', $connect_db);*/



?>