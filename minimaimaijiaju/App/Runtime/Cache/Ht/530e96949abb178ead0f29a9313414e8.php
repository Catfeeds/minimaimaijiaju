<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minimaimaijiaju/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/action.js"></script>
</head>
<body>

<div class="aaa_pts_show_1">【 产品管理 】</div>

<div class="aaa_pts_show_2">
    <div class="aaa_pts_3">
      
      <div class="pro_4 bord_1">
         <div class="pro_5">产品名称：<input type="text" class="inp_1 inp_6" id="name" value="<?php echo ($name); ?>"></div>
         <div class="pro_5">
               推荐产品：
               <select class="inp_1 inp_6" id="tuijian">
			      <option value="">全部产品</option>
                  <option value="1" <?php echo $tuijian=='1' ? 'selected="selected"' : NULL ?>>推荐产品</option>
                  <option value="0" <?php echo $tuijian=='0' ? 'selected="selected"' : NULL ?>>非推荐产品</option>
	           </select>
         </div>
		 <!--获取url上的pid-->
         <div class="pro_6"><input type="button" class="aaa_pts_web_3" value="搜 索" style="margin:0;" onclick="product_option(0);"></div>
      </div>
      
      <table class="pro_3">
         <tr class="tr_1">
           <td style="width:80px; border-right:0px;">ID</td>
           <td style="width:90px; border-left:0px; border-right:0px;">图片</td>
           <td style="border-right:0px; border-left:0px;">[分类名]商品名称</td>
           <td style="width:80px; border-right:0px; border-left:0px;">价格/元</td>
           <td style="width:150px; border-left:0px;">操作</td>
         </tr>
         <tbody id="news_option">
         <!-- 遍历 -->
          <?php if(is_array($productlist)): $i = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($v["id"]); ?>" data-photo="<?php echo ($v["photo_x"]); ?>">
             <td><?php echo ($v["id"]); ?></td>
             <td style="padding:8px;">
              <?php if($v["import_id"] != 0): ?><img src="<?php echo C('IMPORT_IMG_URL'); echo ($v["photo_x"]); ?>" width="60px;" height="60px;" />
              <?php else: ?>
                <img src="/minimaimaijiaju/Data/<?php echo ($v["photo_x"]); ?>" width="60px;" height="60px;" /><?php endif; ?>
            </td>
             <td><span style="color:red;">[<?php echo ($v["cat_name"]); ?>]</span><?php echo ($v["name"]); ?></td>
             <td><?php echo ($v["price_yh"]); ?></td>
            <td>
              <!-- <a href="#" onclick="window_opener(this)">选择</a> -->
              <input type="checkbox" name="proid" value="<?php echo ($v["id"]); ?>" width="40px" height="40px";>
             </td>
           </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
         <!-- 遍历 -->
         </tbody>
         <tr>
            <td colspan="10" class="td_2">
                <input type="button" name="button" id='button' value="确  定" onclick="window_opener();">
             </td>
         </tr>
         <tr>
            <td colspan="10" class="td_2">
                  <?php echo ($page_index); ?>  
             </td>
         </tr>
      </table>      
    </div>
    
</div>
<script>
function product_option(page){
  var obj={
	   "name":$("#name").val(),
	   "tuijian":$("#tuijian").val()
	  }
	  //alert(obj);exit();
  var url='?page='+page;
  $.each(obj,function(a,b){
	  url+='&'+a+'='+b;
	 });
  location=url;
}

//选择返回
function window_opener(){
  var obj=document.getElementsByName('proid'); //选择所有name="'test'"的对象，返回数组
  //取到对象数组后，我们来循环检测它是不是被选中
  var s='';
  for(var i=0; i<obj.length; i++){
    if(obj[i].checked) s+=obj[i].value+','; //如果选中，将value添加到变量s中
  }

  //那么现在来检测s的值就知道选中的复选框的值了
  if (s=='') {
    alert('你还没有选择任何内容！');
    return false;
  };

  window.opener.document.getElementById('proid').value=s;

  window.close();
}
</script>
</body>
</html>