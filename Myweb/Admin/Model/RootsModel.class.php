<?php 
  namespace Admin\Model;
  use Think\Model;
  class RootsModel extends Model {

     protected $_validate = array(
        array('username','require','用户名不能为空'), //用户不能为空     
        array('username','/^\w{4,8}$/','用户名必须是4-8位任意数字字母下划线'), //用户正则    
        array('username','','账号名字已经存在',0,'unique',1),
        array('password','require','密码不能为空'),    
        array('repassword','require','确认密码不能为空'),     
        array('repassword','password','两次密码不一致',0,'confirm'), //密码和确认密码一致     
        );
    //自动完成 数据进行处理
     protected $_auto = array (  
        array('password','md5',1,'function') , // 对pass字段在新增的时候使md5函数处理 
        array('addtime','time',1,'function'), // 对addtime字段在新增的时候写入当前时间戳           
     );

}
 ?>