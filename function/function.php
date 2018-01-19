<?php

function  opensql($hostname,$username,$password,$db){
	//链接数据库

		$link=mysql_connect($hostname,$username,$password);
	if(!$link){
				echo '服务器连接失败';
				}
	//解决中文乱码
	mysql_query('set names "utf8"');
	//选择数据库
	$db='db_lzy';
		$dblink=mysql_select_db($db,$link);
			if(!$dblink){
			echo "链接".$db."失败";
				}
}


?>