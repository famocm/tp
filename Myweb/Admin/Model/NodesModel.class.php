<?php 
	namespace Admin\Model;
	use Think\Model;
	class NodesModel extends Model{
		//自动验证
		protected $_validate = array(
		  array('name','require','节点名不能为空'), 
		  array('contraller','require','控制器名不能为空'), 
		  array('function','require','方法名不能为空'), 
		);
	}