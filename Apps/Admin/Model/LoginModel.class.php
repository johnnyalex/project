<?php 

	namespace Admin\Model;
	use Think\Model;
	/**
	* 
	*/
	class LoginModel extends Model
	{

		protected $_validate = array(
		array('yzm','require','验证码必须填写!'),
		// array('vcode','check_verify','验证码输入错误!',0,'function',3),
		// array('title','require','图书标题必须填写!'),
		// array('title','','帐号名称已经存在！',0,'unique',1), 
		// array('price','number','图书价格必须为数字!'),
		// array('num','number','图书数量必须为数字!'),
		);

		protected $_auto = array(
		array('pic','dealPic',3,'function')
		);






	}











 ?>