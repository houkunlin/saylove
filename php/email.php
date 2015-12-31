<?php
function send_mail($toemail='',$toname='',$fromname='',$content='',$insert_id=0){
	include('../email/class.phpmailer.php');
	$b_set['mail']['smtp'] = 'smtp.qq.com';//邮箱SMTP
	$b_set['mail']['user'] = '1184511588@qq.com';//用户名
	$b_set['mail']['pass'] = 'houzuquan';//密码
	$b_set['mail']['from'] = '1184511588@qq.com';//发信人地址
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	try {
		$mail->CharSet    =	'UTF-8';
		$mail->Host       = $b_set['mail']['smtp'];
		$mail->Port       = 25;
		$mail->SMTPAuth   = true;
		$mail->Username   = $b_set['mail']['user'];
		$mail->Password   = $b_set['mail']['pass'];
		$mail->AddAddress($toemail, '亲['.$toname.']' );//收件人姓名
		$mail->SetFrom($b_set['mail']['from'],'鹿山易班表白墙');//发件人姓名
		$mail->Subject	= '亲['.$toname.']，您被人表白了';//主标题
		$mail->AltBody	= '';//副标题
		$mail->MsgHTML('
		您在易班表白墙被人表白了，赶快过来看吧！
		<div style="background:red;width:100%;">
		
		'.$content.'
		<br>
		<a href="http://'.$_SERVER['SERVER_NAME'].dirname(dirname($_SERVER['REQUEST_URI'])).'/review.php?uid='.$insert_id.'">背景环境就会看见</a>
		(本邮件由鹿山校易班学生工作站发送，请勿回复。)
		</div>
		');//正文内容
		// $mail->AddAttachment('llq.zip','浏览器');//添加附件
		$mail->Send();
		return '邮件发送成功，我们已通过邮件为您通知对方了！';
	} catch (phpmailerException $e) {
		return '邮件发送失败(0)！';//.$e->errorMessage();
	} catch (Exception $e) {
		return '邮件发送失败(1)！';//.$e->getMessage();
	}
}
?>