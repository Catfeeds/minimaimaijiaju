<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minimaimaijiaju/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/action.js"></script>
</head>
<body>

<div class="aaa_pts_show_1">【 产品属性管理 】</div>

<div class="aaa_pts_show_2">
	<div>
       <div class="aaa_pts_4"><a href="<?php echo U('index');?>">全部属性</a></div>
       <div class="aaa_pts_4"><a href="<?php echo U('add');?>">添加属性</a></div>
    </div>
    <div class="aaa_pts_3">
	<div class="pro_4 bord_1">
		<div class="pro_5">
            属性名称：<input type="text" class="inp_1 inp_6" name='attr_name' id="attr_name" value="<?php echo $attr_name;?>">
        </div>
		<div class="pro_6"><input type="button" class="aaa_pts_web_3" value="搜 索" style="margin:0;" onclick="product_option(0);"></div>
	</div>
      <table class="pro_3">
         <tr class="tr_1">
           <td style="width:80px;">ID</td>
		   <td style="width:500px;">属性名称</td>
           <td style="width:80px;">排序</td>
           <td style="width:120px;">操作选项</td>
         </tr>
		  <?php if(is_array($attr_list)): $i = 0; $__LIST__ = $attr_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attr): $mod = ($i % 2 );++$i;?><tr data-id="tr_<?php echo ($attr["id"]); ?>">
			 <td><?php echo ($attr["id"]); ?></td>
			 <td><?php echo ($attr["attr_name"]); ?></td>
			 <td><?php echo ($attr["sort"]); ?></td>
			 <td>
				<a onclick="del_id_url(<?php echo ($attr["id"]); ?>)">删除</a>
			 </td>
		  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		  <tr>
            <td colspan="10" class="td_2">
                 <?php echo ($page); ?>
             </td>
         </tr>
     </table>
    </div>
    
</div>
<script>
//搜索方法
function product_option(page){
  var attr_name = $("#attr_name").val()
  location="<?php echo U('index');?>?attr_name="+attr_name; 
}

//删除方法
function del_id_url(did){
	if (confirm('确认删除吗？')) {
		location='<?php echo U("del");?>?did='+did;
	};
}

</script>
</body>
</html>