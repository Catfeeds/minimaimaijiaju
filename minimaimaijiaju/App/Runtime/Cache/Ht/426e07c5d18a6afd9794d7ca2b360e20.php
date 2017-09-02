<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minimaimaijiaju/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/action.js"></script>
<style>
.dx1{float:left; margin-left: 17px; margin-bottom:10px; }
.dx2{color:#090; font-size:16px;  border-bottom:1px solid #CCC; width:100% !important; padding-bottom:8px;}
.dx3{width:120px; margin:5px auto; border-radius: 2px; border: 1px solid #b9c9d6; display:block;}
.dx4{border-bottom:1px solid #eee; padding-top:5px; width:100%;}

.file {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
}
.file input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}
</style>
</head>
<body>
<script type="text/javascript">
  function uploadpic(id,obj){
    var filePath=$(obj).val();
    if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
      $("#pic_"+id).val(filePath);
    }else{
      $("#pic_"+id).val("");
      alert("您未上传文件，或者您上传文件类型有误！");
      return false 
    }
  }
</script>
<div class="aaa_pts_show_1">【 产品管理 】</div>

<div class="aaa_pts_show_2">
    <div>
       <div class="aaa_pts_4"><a href="<?php echo U('set_attr');?>?pid=<?php echo ($pro_id); ?>">设置规格</a></div>
       <div class="aaa_pts_4"><a href="<?php echo U('pro_guige');?>?pid=<?php echo ($pro_id); ?>">规格管理</a></div>
       <!-- <div class="aaa_pts_4"><a href="<?php echo U('pro_attr');?>?pid=<?php echo ($pro_id); ?>">属性组合管理</a></div> -->
    </div>
    <div class="aaa_pts_3"><span style="color:red">备注：若有产品属性组合不需要或库存不足，请将对应库存设置为0</span>
      <table class="pro_3">
         <tr class="tr_1">
           <td style="width:80px;">规格ID</td>
           <td style="width:100px;">属性名</td>
           <td>规格名称</td>
           <td style="width:130px;">价格/元<span style="color:red;">(双击修改)</span></td>
           <td style="width:130px;">库存<span style="color:red;">(双击修改)</span></td>
           <!-- <td style="width:120px;">图片</td>
           <td style="width:280px;">图片上传</td> -->
           <td style="width:150px;">操作</td>
         </tr>
         <tbody id="news_option">
         <!-- 遍历 -->
          <?php if(is_array($guige_list)): $i = 0; $__LIST__ = $guige_list;if( count($__LIST__)==0 ) : echo "产品没有规格" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["attr_name"]); ?></td>
            <td><?php echo ($v["name"]); ?></td>
            <td id="td_<?php echo ($v["id"]); ?>"><span ondblclick="upprice(<?php echo ($v["id"]); ?>,this);"><?php echo ($v["price"]); ?></span></td>
            <td id="tds_<?php echo ($v["id"]); ?>"><span ondblclick="upstock(<?php echo ($v["id"]); ?>,this);"><?php echo ($v["stock"]); ?></span></td>
            <!-- <td><img src="/minimaimaijiaju/Data/<?php echo ($v["img"]); ?>" width="60px" height="60px" onerror="this.src='/minimaimaijiaju/Public/ht/images/imgs.png';this.onerror=null" /></td>
            <td>
              <form action="<?php echo U('guige_upload');?>" name="form_<?php echo ($v["id"]); ?>" id="form_<?php echo ($v["id"]); ?>" method="post" enctype="multipart/form-data">
              <input class="inp_1" name="pic_<?php echo ($v["id"]); ?>" id="pic_<?php echo ($v["id"]); ?>" style="width:150px;margin-left:10px;margin-top:1.4%" placeholder="规格图片大小200*200" readonly="readonly">
              <input type="hidden" name="gg_id" id="gg_id" value="<?php echo ($v["id"]); ?>" />
              <a href="javascript:;" class="file">选择文件
                <input type="file" name="file_<?php echo ($v["id"]); ?>" id="file_<?php echo ($v["id"]); ?>" onchange="uploadpic(<?php echo ($v["id"]); ?>,this);">
              </a>
              </form>
            </td> -->
            <td>
              <!-- <a href="#" onclick="uploadimg(<?php echo ($v["id"]); ?>);">上传</a> |  -->
              <a href="#" onclick="del_attr(<?php echo ($v["id"]); ?>);">删除</a>
            </td>
           </tr><?php endforeach; endif; else: echo "产品没有规格" ;endif; ?>
         <!-- 遍历 -->
         </tbody>
      </table>   
    </div>
</div>
<script type="text/javascript">
  function upprice(id,obj){
    var price = $(obj).html();
    $(obj).html('<input type="text" class="inp_1" style="width:80px;margin-left:22px;" name="price_'+id+'" id="price_'+id+'" value="'+price+'" onblur="ajax_upprice('+price+','+id+');">');
    $(obj).children().focus();
    $(obj).removeAttr('ondblclick');
  }

  function upstock(id,obj){
    var stock = $(obj).html();
    $(obj).html('<input type="text" class="inp_1" style="width:80px;margin-left:22px;" name="stock_'+id+'" id="stock_'+id+'" value="'+stock+'" onblur="ajax_upstock('+stock+','+id+');">');
    $(obj).children().focus();
    $(obj).removeAttr('ondblclick');
  }

  //ajax修改价格
  function ajax_upprice(price,id){
    var up_price = document.getElementById('price_'+id).value;
    if (price==up_price) {
      $('#td_'+id).html('<span ondblclick="upprice('+id+',this);">'+price.toFixed(2)+'</span>');
      return ;
    };

    var fix_amountTest=/^(([1-9]\d*)|\d)(\.\d{1,2})?$/;
    if(fix_amountTest.test(up_price)==false){
      alert("请输入有效金额！");
      return false;
    }

    //ajax
    $.post('<?php echo U("ajax_up");?>',{pro_id:'<?php echo ($pro_id); ?>',vals:up_price,id:id,type:'pro_price'},function(data){
      if (data.status==1) {
        $('#td_'+id).html('<span ondblclick="upprice('+id+',this);">'+up_price+'</span>');
      }else{
        alert(data.err);
        return false;
      }
    },'json');
  }

  //ajax修改库存
  function ajax_upstock(stock,id){
    var up_stock = document.getElementById('stock_'+id).value;
    if (stock==up_stock) {
      $('#tds_'+id).html('<span ondblclick="upstock('+id+',this);">'+stock+'</span>');
      return ;
    };

    if(/^\d+$/.test(up_stock)==false) { 
      alert('请输入数字格式的库存！');
      return false;
    }

    //ajax
    $.post('<?php echo U("ajax_up");?>',{pro_id:'<?php echo ($pro_id); ?>',vals:up_stock,id:id,type:'pro_stock'},function(data){
      if (data.status==1) {
        $('#tds_'+id).html('<span ondblclick="upstock('+id+',this);">'+up_stock+'</span>');
      }else{
        alert(data.err);
        return false;
      }
    },'json');
  }

  function uploadimg(id){
    //alert(id);
    $('#form_'+id).submit();
  }

  //删除
  function del_attr(id){
    if (confirm('删除后产品价格库存将需要重置，确定删除吗？')) {
      window.location.href="<?php echo U('del_guige');?>?gg_id="+id;
    };
  }
</script>
</body>
</html>