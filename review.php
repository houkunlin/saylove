<?php
include('config/mysql_config.php');
$id=isset($_GET['uid'])&&trim($_GET['uid'])!=''?trim($_GET['uid']):0;
$sql="select * from lovelist where id='{$id}'";
$re=hkl_mysql_query($sql);
			$view='';
$ip = get_client_ip();
if($re[0]==1010){
$row=$re[1][0];
$div=' <div class="list1 font" style="background:url(img/img7.gif) rgba(100,100,100,0.5);">
			  <div class="content" data-id="'.$row['id'].'" id="louzhu">
				<strong>To</strong><span class="to">'.$row['to'].'</span>：
				<div class="action">
				  <span class="label label-success font_s" data-review="'.$row['review'].'" id="louzhu_review" >评论'.$row['review'].'</span>
				  <span class="label label-success font_s" id="louzhu_like" >赞'.$row['likenum'].'</span>
				</div>
				<p class="">'.$row['content'].'
				</p>
				<div class="footer">来自<span class="from">'.$row['from'].'</span>，<time>'.$row['add_time'].'</time></div>
			  </div>
			  <div class="clearfix"></div>
			</div> ';
			
			/*
$sql="select * from reviewlog where toid='{$id}' order by id desc";
			$review=hkl_mysql_query($sql);
			$view='';
			if($review[0]==1010){
			
			}else{
			
$view=' 				  <div class="alert alert-success">
					<strong>暂时还没有评论，赶快来评论吧！</strong>
				  </div>
';
			}
			*/
}else{

$div=' 				  <div class="alert alert-success">
					<strong>找不到你需要的表白信息</strong>
				  </div>
';
}




$body=file_get_contents('review.tpl');
$body=str_replace('{louzhu}',$div,$body);
$body=str_replace('{view}',$view,$body);
$body=str_replace('{ip}',$ip,$body);
echo $body;

?>