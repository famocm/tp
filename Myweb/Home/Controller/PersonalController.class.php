<?php 
namespace Home\Controller;
use Think\Controller;
class PersonalController extends AllowController{
	// 个人中心主页
	public function index(){
        $id=$_SESSION['id2'];
        $mod=M("Users");
        $list=$mod->where("id=$id")->select();
        //查询收藏列表
        $mod1=M("Favorites");
        $list1=$mod1->where("uid=$id")->select();
        // 分配数据
        $this->assign("list1",$list1);
        // 分配数据
        $this->assign("list",$list);
		$this->display("Personal/index");
	}
	
	// 个人资料
	public function information(){
        $id=$_SESSION['id2'];
        $mod=M('Users');
        $list=$mod->where("id=$id")->select();
        $this->assign('list',$list);
		$this->display("Personal/information");
	}

	// 检测昵称
    public function checkename(){
        $name=I('get.username');
        //实例化
        $mod=M('users');
       //获取数据
        $list=$mod->select();
        //遍历
        $arr=array();
        foreach($list as $key=>$value){
            $arr[$key]=$value['username'];
        }
        if(in_array($name,$arr)){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 修改个人信息
    public function doinformation(){
       
        // 上传图片
        //实例化upload类
        $upload=new \Think\Upload();
        //初始化信息
        $upload->maxSize=0;//文件大小
        // $upload->autoSub=false;//关闭日期目录;
        $upload->exts=array('jpg','jpeg','gif','png');//文件后缀
        $upload->rootPath="./Public/Informations/";//路径
        //执行上传
        $info=$upload->upload();
        // var_dump($info);exit;
        if(!$info){
            // var_dump($info)
            $this->error($upload->getError());
        }else{
            foreach ($info as $key=>$file) {
                $arr[$key]="/Public/Informations/".$file['savepath'].$file['savename'];
            }
        }

        //实例化
        $mod=M('Users');
        $data['username']=I('post.usernamee');
        $data['pic']=$arr[$key];
        $data['sex']=I("post.sex");
        $username=I('post.uname');
        $id=$_SESSION['id2'];
        $list=$mod->find($id);
        // echo $username;exit;
        // var_dump($username);exit;
        // $list=$mod->where("username=$username")->select();
        // var_dump($data);exit;
        if($mod->where("username='$username'")->save($data)){
            $this->success("修改成功",U("Personal/information"));
            $_SESSION['username2']=I('post.usernamee');
            $_SESSION['pic2']=$data['pic'];
            unlink(".".$list['pic']);
        }else{
            $this->error("修改失败");
        }


    }
    
	// 安全设置
    public function safety(){
        $id=$_SESSION['id2'];
        $mod=M('Users');
        $list=$mod->where("id=$id")->select();
        $this->assign('list',$list);
        $this->display("Personal/safety");
    }

    //获取当前用户所有的收货地址信息
    public function allgetaddress($id){
        return M("Address")->where("users_id=$id")->select();
    }

	// 收货地址
	public function address(){
        $address=$this->allgetaddress($_SESSION['id2']);
        // var_dump($address);
        //分配到模板
        $this->assign("address",$address);
        // $this->assign("shop",$_SESSION['s']);
		$this->display("Personal/address");
	}

    //城市级联
     public function addresss(){
        //获取参数
        $upid=$_GET['upid'];
        //实例化
        $mod=M("District");
        //查询数据
        $list=$mod->where("upid=$upid")->select();
        //将php数据转换为json格式
        echo json_encode($list);
     }

     public function insert(){
        // var_dump($_POST);
        //实例化
        $mod=M("Address");
        //封装数据
        $data['address']=$_POST['address'];
        $data['name']=$_POST['name'];
        $data['phone']=$_POST['phone'];
        $data['street']=$_POST['street'];
        $data['code']=$_POST['code'];
        $data['users_id']=$_SESSION['id2'];
          // var_dump($data);exit;
        //执行插入
        if($mod->add($data)){
            // echo "11111";
            $this->redirect("Personal/address");
        }
     }

     //执行删除
     public function delete(){
          //获取id
          $id=I('get.id');
          //实例化
          $mod=M('Address');
          if($mod->delete($id)){
               $this->redirect("Personal/address");
          }
     }

      //执行修改
    public function edit(){
          //获取id
          $id=I('get.id');
          //实例化
          $mod=M('Address');
          $list=$mod->find($id);
          // var_dump($list);exit;
          $this->assign('list',$list);
          $this->display('Personal/edit');
    }

    public function update(){
          $id=I('post.id');
          // echo $id;exit;
          //实例化
          $mod=M("Address");
          // var_dump($mod);
          //封装数据
          $data['address']=$_POST['address'];
          $data['name']=$_POST['name'];
          $data['phone']=$_POST['phone'];
          $data['street']=$_POST['street'];
          $data['code']=$_POST['code'];
          // var_dump($data);exit;
          if($mod->where("id=$id")->save($data)){
                $this->redirect("Personal/address");
          }
    
    }

	// 订单管理
    // public function order(){
    //     $this->display("Personal/order");
    // }

    // 加载认证页面
    public function idcard(){
        $this->display('Personal/idcard');
    }

    //实名
    public function doidcard(){
        // echo "实名操作";
        // 实例化
        $mod=M("Users");
        // 接收传输数据
        $data['uname']=I("post.uname");
        $data['card']=I("post.card");
        $username=I("post.username");
        // $list=$mod->where("username=$username")->select();
        // var_dump($username);exit;       
        // var_dump($data);exit;
         if($mod->where("username='$username'")->save($data)){
            $this->success("修改成功",U("Personal/index"));
        }else{
            $this->error("修改失败");
        }
    }

    // 检测身份证
    public function docard(){
        $card=I('get.card');
        // echo $card;
        //实例化
        $mod=M('Users');
       //获取数据
        $list=$mod->select();
        //遍历
        $arr=array();
        foreach($list as $key=>$value){
            $arr[$key]=$value['card'];
        }
        if(in_array($card,$arr)){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 加载修改密码模板
    public function password(){
        $this->display("Personal/password");
    }

    // 检测密码是否一致
    public function checkpass(){
        $pass=md5(I('post.pass'));
        $id=$_SESSION['id2'];
        $mod=M('Users');
        $list=$mod->where("id=$id")->select();
        if($list[0]['password']==$pass){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 重置登录密码
    public function dopassword(){
        $data['password']=md5(I('post.repassword'));
        $id=$_SESSION['id2'];
        $mod=M('Users');
        $re=$mod->where("id=$id")->save($data);
        // echo $mod->getLastSql();die;
        if($re !== false){
            $this->success("修改登录密码成功",U('Personal/safety'));
        }else{
            $this->error("修改失败");
        }

    }

    // 换绑定手机号
    public function bindphone(){
        $id=$_SESSION['id2'];
        $mod=M('Users');
        $list=$mod->where("id=$id")->select();
        $this->assign('list',$list);
        $this->display("Personal/bindphone");
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
    //检测验证码是否一致 
    public function checkpcode(){
        $pcode=I('post.pcode');
        if($pcode==$_SESSION['param2']){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 执行修改手机号
    public function dobindphone(){
        $data['phone']=I('post.newphone');
        $id=$_SESSION['id2'];
        $mod=M('Users');
        if($mod->where("id=$id")->save($data)!==false){
            $this->success("修改绑定手机成功",U("Personal/safety"));
        }else{
            $this->error("修改失败");
        }
    }

    // 换绑邮箱
    public function email(){
        $this->display("Personal/email");
    }

    // 验证邮箱
    public function checkemail(){
        //获取参数
        $email=I('post.email');
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
    
    // 设置支付密码
    public function setpay(){
        $this->display("Personal/setpay");
    }

    // 订单管理
    public function order(){
        // echo "订单表操作";
        $arr=array();
        $arr1=array();
        $arr2=array();
        $id=$_SESSION['id2'];
        // var_dump($id);exit;
        // 实例化查询数据
        // 关联表查询更多信息
        $mod=M("Orders");
        $tot=$mod->where("uid=$id")->Count();
        // var_dump($tot);exit;
        // 实例化page类
        $page=new \Think\Page($tot,6);
        //初始化信息
        $page->setConfig("prev",'上一页');
        $page->setConfig("next",'下一页');
        $page->setConfig("first",'首页');
        $page->setConfig("last",'末页');
        $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");

          // $s=M("Shops")->field("cates.name as cname,shops.id as sid,shops.descr,shops.num,shops.name as sname,shops.pic,shops.price")->join("cates on shops.cate_id=cates.id")->where("shops.cate_id=$id")->select();

         $list=M("Orders")->join("order_goods on orders.id=order_goods.order_id")->where("uid=$id")->limit($page->firstRow,$page->listRows)->select();
         // var_dump($list);exit;
         // 状态为1代表新订单
         $arr['uid']=$id;
         $arr['status']=1;
         //状态为2的
         $arr1['uid']=$id;
         $arr1['status']=2;
         $arr2['uid']=$id;
         $arr2['status']=3;
         // var_dump($arr);exit;
        $list1=M("Orders")->join("order_goods on orders.id=order_goods.order_id")->where($arr)->select();
        $list2=M("Orders")->join("order_goods on orders.id=order_goods.order_id")->where($arr1)->select();
        $list3=M("Orders")->join("order_goods on orders.id=order_goods.order_id")->where($arr2)->select();
        // echo M("Orders")->getLastSql();die;
        // var_dump($list1);exit;
        // var_dump($list2);exit;
        // var_dump($list3);exit;
        //分配数据
        $this->assign("list",$list);
        //分页信息
        $this->assign("pageinfo",$page->show());
        $this->assign("list1",$list1);
        $this->assign("list2",$list2);
        $this->assign("list3",$list3);
        // 加载模板
        $this->display("Personal/order");
    }
    //收藏
    public function collection(){
        // echo "22";
        // 实例化查询数据
        $id=$_SESSION['id2'];
        // var_dump($id);exit;
        $mod=M("Favorites");
        $list=$mod->where("uid='$id'")->select();
        // var_dump($list);exit;
        // 分配数据
        $this->assign("list",$list);
        //加载模板
        $this->display("Personal/collection");
    }

    // 加载评价页面
    public function comment(){
        $id=$_SESSION['id2'];
        $mod=M('Articles');
        $list=$mod->where("user_id=$id")->select();
        // var_dump($list);die;
        $data=array();
        foreach($list as $value){
            $data[]=$value['goods_id'];
        }
        $data=array_unique($data);
        $data3=null;
        foreach($data as $key){
            // var_dump($key);
            $data3[]=M("Goods")->join("articles on articles.goods_id=goods.id")->where("goods.id={$key} and user_id={$id}")->select();
        }
        // var_dump($data3);
        // echo M('Goods')->getLastSql();
        // die;
        $data1=array();
        foreach($data3 as $value1){
            foreach($value1 as $value2){
                // var_dump($value2);
                $data1[]=$value2;
            }
        }
        // var_dump($data1);
        // die;
        $this->assign("data",$data1);
        // var_dump($data1);
        $this->display("Personal/comment");
    }

    // 评价商品页面内
    public  function commentlist(){
        $oid=I("get.id");
        // $gid=I("get.gid");
        $order_id=I('get.orders_id');
        $goods=M("Order_goods")->query("select orders.*,order_goods.* from orders,order_goods where orders.status=3 and order_id=$order_id and orders.id=order_goods.order_id");
        // echo M("Order_goods")->getLastSql();die;
        // var_dump($goods);die;
        $this->assign("goods",$goods);
        $this->display("Personal/commentlist");
    }

    // 插入评论
    public  function docommentlist(){
        $content=$_POST['content'];
        $goods_id=$_POST['goods_id'];
        $a=count($content);
        for($i=0;$i<$a;$i++){
            $data['content']=$content[$i];
            $data['goods_id']=$goods_id[$i];
            $data['user_id']=$_SESSION['id2'];
            $data['addtime']=time();
            // var_dump($data);die;
            M('Articles')->add($data);
        }
        $data1['status']=4;
        $order_code=I("post.order_code");
        M("Orders")->where("order_code=$order_code")->save($data1);
        $this->success("评论成功",U('Personal/comment'));
        
        
        
    }
    
}
 ?>