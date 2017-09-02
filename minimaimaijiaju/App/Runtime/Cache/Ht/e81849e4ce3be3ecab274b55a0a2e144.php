<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minimaimaijiaju/Public/ht/css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="aaa_pts_show_1">【 首页图标管理 】</div>

<div class="aaa_pts_show_2">

    <div class="aaa_pts_3">
      <form action="<?php echo U('saveimg');?>" method="post" onsubmit="return ac_from();" enctype="multipart/form-data">
      <ul class="aaa_pts_5">
         <?php if($more == NULL): ?><li>
            <div class="d1">栏目名:</div>
            <div>
              <select class="inp_1" name="cid" id="cid">
              <!-- 遍历 -->
      				<?php if(is_array($procat)): $i = 0; $__LIST__ = $procat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $info['cid']): ?>selected="selected"<?php endif; ?>><?php echo ($v["name"]); ?></option>
                <?php if(is_array($v['list'])): $i = 0; $__LIST__ = $v['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vs["id"]); ?>" <?php if($vs["id"] == $info['cid']): ?>selected="selected"<?php endif; ?>>&nbsp;-- <?php echo ($vs["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
      			  <!-- 遍历 -->
              </select>
            </div>
         </li>
         <?php else: ?>
         <li><div style="color:#c00; font-size:14px; padding-left:20px;">更多设置</div></li><?php endif; ?>
         <li><div style="color:#c00; font-size:14px; padding-left:20px;">图标尺寸 100px*100px透明底图</div></li>
         <li data-index="0">
            <div class="d1">图标:</div>
            <div>
              <?php if ($info['photo']) { ?>
                <img src="/minimaimaijiaju/Data/<?php echo $info['photo']; ?>" width="70" height="70" /><br /><br />
              <?php } ?>
              <input type="file" name="file" id="photo" />
            </div>
         </li>
         <li>
          <input type="submit" name="submit" value="提交" class="aaa_pts_web_3" border="0">
          <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
         </li>
      </ul>
      </form>
         
    </div>
    
</div>
</body>
</html>