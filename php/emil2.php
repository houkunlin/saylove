<?php



echo send_mail('778380017@qq.com','侯坤林','侯坤林222','我喜欢你！');
function send_mail($toemail='',$toname='',$fromname='',$content='',$insert_id=0){
	include('../email/class.phpmailer.php');
	$b_set['mail']['smtp'] = 'smtp.aliyun.com';//邮箱SMTP
	$b_set['mail']['user'] = 'hk0901@aliyun.com';//用户名
	$b_set['mail']['pass'] = 'houkunlin011215';//密码
	$b_set['mail']['from'] = 'hk0901@aliyun.com';//发信人地址
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
		$mail->SetFrom($b_set['mail']['from'],'鹿山逐梦者表白墙');//发件人姓名
		$mail->Subject	= '亲['.$toname.']，您被人表白了';//主标题
		$mail->AltBody	= '';//副标题
		$mail->MsgHTML('
		您在鹿山逐梦者表白墙被人表白了，赶快过来看吧！
		<div style="background:;width:100%;">
		
		'.$content.'
		
		<a href="http://'.$_SERVER['SERVER_NAME'].dirname(dirname($_SERVER['REQUEST_URI'])).'/review.php?uid='.$insert_id.'">点击这里查看表白详情</a>
		(本邮件由鹿山逐梦者发送，请勿回复。)
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
