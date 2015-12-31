<?php
include('config/mysql_config.php');
$div='';
$top='';
$ip = get_client_ip();
// print_r($_SERVER);
/*
$select="select * from lovelist order by id desc limit 0,10;";
$re=hkl_mysql_query($select);
if($re[0]==1010){
foreach($re[1] as $row){
}
}elseif($re[0]==1002){
$div=' 				  <div class="alert alert-success">
					<strong>目前还没有人表白，赶快点击上方的【我要表白】去表白吧</strong>
				  </div>
';
}else{

$div=' 				  <div class="alert alert-success">
					<strong>数据库连接失败，请联系易班工作站技术运营中心！</strong>
				  </div>
';
}

$select="select * from lovelist order by likenum desc limit 0,10;";
$re2=hkl_mysql_query($select);
if($re2[0]==1010){
$i=1;
foreach($re2[1] as $row2){
}
}elseif($re2[0]==1002){
$top=' 				  <div class="alert alert-success">
					<strong>目前还没有人表白，赶快点击上方的【我要表白】去表白吧</strong>
				  </div>
';
}else{

$top=' 				  <div class="alert alert-success">
					<strong>数据库连接失败，请联系易班工作站技术运营中心！</strong>
				  </div>
';
}
*/
$body=file_get_contents('index.tpl');
$body=str_replace('{lovelist}',$div,$body);
$body=str_replace('{top}',$top,$body);
$body=str_replace('{ip}',$ip,$body);
echo $body;

?>