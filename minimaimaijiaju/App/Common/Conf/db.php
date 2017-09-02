<?php
return array(
	//'配置项'=>'配置值'
	
// +----------------------------------------------------------------------
// | 数据库配置设定
// +----------------------------------------------------------------------		
	'DB_TYPE'               =>  'mysql',        // 数据库类型
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'lr_',       // 数据库表前缀   ！开发时配置常量 ！
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8		
// +----------------------------------------------------------------------
// | 本地测试服务器和数据库
// +----------------------------------------------------------------------  	 
	'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'minimaimaijiaju',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',      //'1234QWERasdf',          // 密码	
	
	//微信配置参数
    'weixin'=>array(
	    'appid' =>'wx2f36f349d037b5ec',			//微信appid
	    'secret'=>'9184e27722d5f638af6ca9b97211be1b', //微信secret

	    'mchid' => '1472317702', //商户号
	 	'key' => 'O6mbkBsnKo95jhoSKDGSfiXExAHjQoSs', //32位api密钥

	 	//这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
		'notify_url'=>'https://www.gzleren.com/minimaimaijiaju/index.php/Api/Wxpay/notify', 

    ),
	'content' =>array(
		'dir' => '/minimaimaijiaju/Data/'
	),

);