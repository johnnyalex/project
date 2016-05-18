<?php 
namespace Home\Model;
use Think\Model;
class AddressModel extends Model{
	protected $_validate = array(
		array('name','require','用户名必须填写'),
		array('tel','number','手机号必须为数字'),
		array('pro','require','省份必须填写'),
		array('city','require','城市必须填写'),
		array('area','require','地区必须填写'),
		array('addr','require','街道必须填写'),
		);
}
 ?>
