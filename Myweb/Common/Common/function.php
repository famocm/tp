<?php 
	// 获取PHPMailer类
	// 实例化
	// 设置参数或者是方法
	// $to接收方$title主题 $countent发送的内容
	function sendMail($to,$title,$content){
		$mail=new \Org\Util\PHPMailer();
		// 设置字符集
		$mail->CharSet="utf-8";
		// 设置采用SMTP方式发送邮件
		$mail->IsSMTP();
		// 设置邮件服务器地址
		$mail->Host=C('mail1.smtp');//C获取配置文件信息
		// 设置邮件服务器的端口 默认的是25 如果需要谷歌邮件端口号式443
		$mail->Port=25;
		// 设置发件人的邮箱地址
		$mail->From=C('mail1.username');
		// $mail->FormName='我';
		// 设置SMTP是否需要密码验证
		$mail->SMTPAuth=true;
		// 发送方
		$mail->Username=C('mail1.username');
		$mail->Password=C('mail1.password');
		// 发送邮件的主题
		$mail->Subject=$title;
		// 内容类型 文本型
		$mail->AltBody="text/html";
		//发送的内容
		$mail->Body=$content;
		// 设置内容是否为html格式
		$mail->IsHTML(true);
		// 设置接收方
		$mail->AddAddress(trim($to));
		if(!$mail->send()){
			echo "失败".$mail->ErrorInfo;
			return false;
		}else{
			return true;
		}
}
// 获取第三方类库
// function test1(){
// 	import("Vendor.lib.Ucpaas");
//   	//初始化必填
// 	$options['accountsid']='b70ea9ba6c9bcef4e612f0219d88e902';
// 	$options['token']='dd6af6d60d2051e89a24de85d50bece2';
// 	//请求到云之讯平台
// 	//实例化ucpass类
// 	$ucpass=new Ucpaas($options);
// 	// echo $ucpass->getDevinfo('json');
// 	//调用短信通知的验证接口
// 	//语音验证码,云之讯融合通讯开放平台收到请求后，向对象电话终端发起呼叫，接通电话后将播放指定语音验证码序列
// 	// $appId = "896c58f0d4e24ced900dd62d88f03583";
// 	// $verifyCode = "10000";//发送的语音内容
// 	// $to = "15258036570";

// 	// echo $ucpass->voiceCode($appId,$verifyCode,$to);

// 	//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
// 	$appId = "896c58f0d4e24ced900dd62d88f03583";
// 	$to = $_POST['phone'];
// 	$templateId = "40606";//模板id
// 	$param=rand(100000,999999);
// 	$_SESSION['param2']=$param;
// 	$arr=$ucpass->templateSMS($appId,$to,$templateId,$param);
// 	if (substr($arr,21,6) == 000000) {
//             //如果成功
//             echo "短信验证码已发送成功，请注意查收短信";
            
//         }else{
//             //如果不成功
//             echo "短信验证码发送失败，请重新发送";
            
//         }


// }
 ?>
