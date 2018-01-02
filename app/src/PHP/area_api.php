<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_connect("localhost","root","")or die("服务器不存在");
	mysql_select_db("db_weather")or("数据库不存在");
	mysql_query("set names utf8");
	$sql = "select distinct province_name from tb_weather";
	if(isset($_GET['province'])){
		$sql = "select city_name,area_name from tb_weather where province_name='".$_GET['province']."'";
		$r = mysql_query($sql);
		$result = array();//返回结果：是一个二维数组
		$prow = array();//保存每一行的数据，只保存市名和地区名。
		while($row = mysql_fetch_array($r)){
			$prow['city'] = $row['city_name'];
			$prow['area'] = $row['area_name'];
			$result[] = $prow;
		}		
		echo json_encode($result);
	}else{
		$sql = "select distinct province_name from tb_weather";
		$r = mysql_query($sql);
		$result = array();//返回结果，将是一个一维数组
		while($row = mysql_fetch_array($r)){
			$result[]=$row[0];
		}
		echo json_encode($result); 
	}
	
	
?>