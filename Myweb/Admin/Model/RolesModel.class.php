<?php 
	namespace Admin\Model;
	use Think\Model;
	class RolesModel extends Model{
		//自动验证
		protected $_validate = array(
		  array('name','require','角色名不能为空'),
		  array('name','','角色名已经存在',0,'unique',1), 

		  array('descr','require','角色说明不能为空'),
		);
	}