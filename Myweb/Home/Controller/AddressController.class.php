 <?php
namespace Home\Controller;
use Think\Controller;
class AddressController extends AllowController {
     

     //执行地址插入
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
          // var_dump($list);
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
    
}
?>