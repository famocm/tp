<?php 
namespace Home\Controller;
use Think\Controller;
class AllController extends Controller {
    public function _empty(){
        $src = '/Public/404/u=44056108,772148444&fm=23&gp=0.jpg';
        echo "<img src=".$src." style='width:100%;height:100%;'>";
    }
}
 ?>