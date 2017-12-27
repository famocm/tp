<?php 
namespace Home\Controller;
use Think\Controller;
/**
 * 空模块，主要用于显示404页面，请不要删除
 */
class EmptyController extends Controller{
    public function _empty(){
        $src = '/Public/404/u=44056108,772148444&fm=23&gp=0.jpg';
        echo "<img src=".$src." style='width:100%;height:100%;'>";
    }
}
 ?>