<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minibuysalejiaju/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minibuysalejiaju/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minibuysalejiaju/Public/ht/js/action.js"></script>
</head>
<body>

<div class="aaa_pts_show_1">【 程序配置信息 】</div>

<div class="aaa_pts_show_2">
    

    <div class="aaa_pts_3">
      <form action="<?php echo U('More/setup');?>" method="post" onsubmit="return ac_from();"  enctype="multipart/form-data">
      <ul class="aaa_pts_5">
         <li>
            <div class="d1">小程序名称:</div>
            <div>
              <input class="inp_1" name="title" id="title" value="<?php echo ($info["title"]); ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">负责人:</div>
            <div>
              <input class="inp_1" name="name" id="name" value="<?php echo ($info["name"]); ?>"/>
            </div>
         </li>
         <li>
            <div style="color:#c00; font-size:14px; padding-left:20px;"> logo上传图片大小 ：100*100；<!-- 其它缩略图为200*120; --></div>
         </li>
         <li data-index="0">
            <div class="d1">小程序logo:</div>
            <div>
              <input type='hidden' name="logo" id="photo_sj0" value="<?php echo $info['logo']; ?>">
            <!-- <iframe class="pro_2" src="/minibuysalejiaju/Data/inc/photo_add.php?id=photo_sj0&width=200&height=200" frameborder="0"></iframe> -->
              <?php if ($info['logo']) { ?>
                <img src="/minibuysalejiaju/Data/<?php echo $info['logo']; ?>" width="100" height="100" /><br /><br />
              <?php } ?>
              <input type="file" name="file2" id="logo" />
            </div>
         </li>
         <li>
            <div class="d1">小程序简介:</div>
            <div>
              <input class="inp_1" name="describe" id="describe" value="<?php echo ($info["describe"]); ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">客服微信号:</div>
            <div>
              <input class="inp_1" name="service_wx" id="service_wx" value="<?php echo ($info["service_wx"]); ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">客服电话:</div>
            <div>
              <input class="inp_1" name="tel" id="tel" value="<?php echo ($info["tel"]); ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">版权信息:</div>
            <div>
              <input class="inp_1" name="copyright" id="copyright" value="<?php echo ($info["copyright"]); ?>"/>
            </div>
         </li>
         <li><input type="submit" name="submit" value="提交" class="aaa_pts_web_3" border="0"></li>
      </ul>
      </form>
         
    </div>
    
</div>
<script>
function ac_from(){
  var title=document.getElementById('title').value;
  if(!title){
	  alert('请输入小程序名称！');
	  return false;
	}
}
</script>
</body>
</html>