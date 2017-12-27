<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends AllController{
	public function index(){
		$this->display('Regiser/index');
	}
	public function verify(){
    	//实例化验证码类
    	$Verify=new \Think\Verify();
    	//初始化参数(英文验证码)
    	$Verify->length=4;//验证码的位数
    	$Verify->fontSize=20;//验证码的字体大小
    	$Verify->useNoise=true;//关闭干扰素
    	//写入验证码（把验证码值保存在session）
    	$Verify->entry();
    }
    public function checkname(){
        $username=I('get.username');
        //实例化
        $mod=M('users');
       //获取数据
        $list=$mod->select();
        //遍历
        $arr=array();
        foreach($list as $key=>$value){
            $arr[$key]=$value['username'];
        }
        if(in_array($username,$arr)){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function checkemail(){
        //获取参数
        $email=$_GET['email'];
        //实例化
        $mod=M("Users");
        //获取数据
        $list=$mod->select();
        //遍历
        $arr=array();
        foreach($list as $key=>$value){
            $arr[$key]=$value['email'];
        }

        if(in_array($email,$arr)){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function checkcode(){
        $code=I('get.code');
        //实例化验证码类
        $verify=new \Think\Verify();
        if($verify->check($code,'')){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 短信验证
    public function checkphone(){
        // 第三方类库获取
        // import("Vendor.lib.Ucpaas");
        //初始化必填
        $options['accountsid']='92c498dd3ed60948a3960b908c880286';
        $options['token']='5cdc038caed88551fb261b418544012b';
        // //请求到云之讯平台
        //实例化ucpass类
        $ucpass=new \Vendor\lib\Ucpaas($options);
        // echo $ucpass->getDevinfo('json');
        // //调用短信通知的验证接口
        // //语音验证码,云之讯融合通讯开放平台收到请求后，向对象电话终端发起呼叫，接通电话后将播放指定语音验证码序列
        // // $appId = "896c58f0d4e24ced900dd62d88f03583";
        // // $verifyCode = "10000";//发送的语音内容
        // // $to = "15258036570";

        // // echo $ucpass->voiceCode($appId,$verifyCode,$to);

        //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $post=I('post.phone');
        // echo $post;
        $appId = "52e02c1b222d40dfb22b8a9dbb612743";
        $to = $post;
        $templateId = "40606";//模板id
        $param=rand(100000,999999);
        $_SESSION['param2']=$param;
        $arr=$ucpass->templateSMS($appId,$to,$templateId,$param);
        // echo $arr;
        $a=substr($arr,21,6);
        // echo $a;
        if ( $a!=000000 || $a==null) {
                
                //如果不成功
                echo "短信验证码发送失败，请重新发送";
                
                
            }else{
                //如果成功
                echo "短信验证码已发送成功，请注意查收短信";
                
            }
            // echo 1;
        }
        
    public function checkpcode(){
        $pcode=I('post.pcode');
        if($pcode==$_SESSION['param2']){
            echo 1;
        }else{
            echo 0;
        }
    }

    //执行注册
    public function doregister(){
        //实例化
        $mod=M('Users');
        $data['username']=I('post.username');
        $data['email']=I('post.email');
        $data['password']=md5(I('post.password'));
        $data['phone']=I('post.phone');
        $data['addtime']=time();
        $data['token']=rand(10000,50000);
        if($id=$mod->add($data)){
            $ss=sendMail($data['email'],"用户激活","<a href='http://localhost/test/index.php/Home/Register/jihuo?id={$id}&token={$data["token"]}'>用户激活</a>");
            $this->success('注册成功,请去邮箱激活账户',U('Login/login'));
        }else{
            $this->error('注册失败');
        }
    }

    //用户激活
    public function jihuo(){
        // echo "";
        // var_dump($_GET);
        //实例化
        $mod=M('Users');
        //获取id
        $id=$_GET['id'];
        //获取数据
        $info=$mod->find($id);
        //判断token和数据库的token是否相同
        if($info['token']==$_GET['token']){
             $s['status']=1;
        }
       
        if($mod->where("id=$id")->save($s)){
            $this->success('用户激活成功,请去登录',U('Login/login')) ;
        }else{
            $this->error('用户激活失败');
        }
    }

    public function checkdophone(){
        //获取参数
        $phone1=$_GET['phone1'];
        //实例化
        $mod=M("Users");
        //获取数据
        $list=$mod->select();
        //遍历
        $arr=array();
        foreach($list as $key=>$value){
            $arr[$key]=$value['phone'];
        }

        if(in_array($phone1,$arr)){
            echo 1;
        }else{
            echo 0;
        }
    }

}
?>