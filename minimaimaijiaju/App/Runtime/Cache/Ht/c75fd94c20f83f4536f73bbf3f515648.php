<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minimaimaijiaju/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/jquery.js"></script>
</head>
<body>

<div class="aaa_pts_show_1">【 产品属性管理 】</div>

<div class="aaa_pts_show_2">
    
    <div class="aaa_pts_3">
      <form action="<?php echo U('save');?>" method="post" onsubmit="return ac_from();">
      <ul class="aaa_pts_5">
         <li>
            <div class="d1">属性名称:</div>
            <div>
              <input class="inp_1" name="attr_name" id="attr_name" value="<?php echo $attr_info['attr_name']; ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">排 序:</div>
            <div>
              <input class="inp_1" name="sort" id="sort" value="<?php echo $attr_info['sort']; ?>"/>
            </div>
         </li>
         <li><input type="submit" name="submit" value="提交" class="aaa_pts_web_3" border="0">
         	<input type="hidden" name="attr_id" value="<?php echo $attr_info['id']; ?>">
         </li>
      </ul>
      </form>
         
    </div>
    
</div>
<script>
function ac_from(){
  //判断栏目名称
  var attr_name=document.getElementById('attr_name').value;
  if(attr_name.length<1){
	  alert('请输入属性名称.');
	  return false;
	  }

  return true;
}
</script>
</body>
</html>