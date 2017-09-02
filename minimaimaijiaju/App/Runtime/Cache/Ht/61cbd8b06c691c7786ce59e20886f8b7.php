<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minimaimaijiaju/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/action.js"></script>
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/mydate.js"></script>
<style>
.dx1{float:left; margin-left: 17px; margin-bottom:10px; }
.dx2{color:#090; font-size:16px;  border-bottom:1px solid #CCC; width:100% !important; padding-bottom:8px;}
.dx3{width:120px; margin:5px auto; border-radius: 2px; border: 1px solid #b9c9d6; display:block;}
.dx4{border-bottom:1px solid #eee; padding-top:5px; width:100%;}
.img-err {
    position: relative;
    top: 2px;
    left: 82%;
    color: white;
    font-size: 20px;
    border-radius: 16px;
    background: #c00;
    height: 21px;
    width: 21px;
    text-align: center;
    line-height: 20px;
    cursor:pointer;
}
</style>
</head>
<body>

<div class="aaa_pts_show_1">【 优惠券管理 】</div>

<div class="aaa_pts_show_2">
    <div>
      <div class="aaa_pts_4"><a href="<?php echo U('index');?>">全部优惠券</a></div>
       <div class="aaa_pts_4"><a href="<?php echo U('add');?>">添加优惠券</a></div>
    </div>
    <div class="aaa_pts_3">
		<form action="<?php echo U('save');?>" method="post" onsubmit="return ac_from();" enctype="multipart/form-data">
		<ul class="aaa_pts_5">
        <li class="product"><div class="d1 dx2">优惠券信息</div></li>
         <li class="product">
            <div class="d1">优惠券名称:</div>
            <div>
              <input class="inp_1" name="title" id="title" value="<?php echo ($voucher["title"]); ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">开始时间:</div>
            <div>
              <input type="text" class="inp_1 inp_6" name="start_time" id="start_time" value="<?php echo $voucher['start_time']=='' ? date('Y-m-d') : $voucher['start_time']; ?>" onfocus="MyCalendar.SetDate(this)" />
              <span style="color:red;margin-left:5px;">&nbsp;* 优惠券的生效时间</span>
            </div>
         </li>
         <li>
            <div class="d1">失效时间:</div>
            <div>
              <input type="text" class="inp_1 inp_6" name="end_time" id="end_time" value="<?php echo $voucher['end_time']=='' ? date('Y-m-d',strtotime('+1 day')) : $voucher['end_time']; ?>" onfocus="MyCalendar.SetDate(this)" />
              <span style="color:red;margin-left:5px;">&nbsp;* 失效时间必须大于生效时间（当天晚上12点失效）</span>
            </div>
         </li>
         <li>
            <div class="d1">满减金额:</div>
            <div>
              <input class="inp_1 inp_6" name="full_money" id="full_money" value="<?php echo ($voucher["full_money"]); ?>" />
              <span style="color:red;margin-left:5px;">&nbsp;* 使用时所需要达到的最低限制金额</span>
            </div>
         </li>
         <li>
            <div class="d1">优惠金额:</div>
            <div>
              <input class="inp_1 inp_6" name="amount" id="amount" value="<?php echo ($voucher["amount"]); ?>" />
              <span style="color:red;margin-left:5px;">&nbsp;* 使用时减免的金额</span>
            </div>
         </li>
         <li>
            <div class="d1">所需积分:</div>
            <div>
              <input class="inp_1 inp_6" name="point" id="point" value="<?php echo intval($voucher['point'])==0?0:$voucher['point']; ?>" />
              <span style="color:red;margin-left:5px;">&nbsp;* 会员领取时所需积分，默认0，免费领取</span>
            </div>
         </li>
         <li>
            <div class="d1">发行数量:</div>
            <div>
              <input class="inp_1 inp_6" name="count" id="count" value="<?php echo ($voucher["count"]); ?>" />
              <span style="color:red;margin-left:5px;">&nbsp;* 开团所需要达到的人数</span>
            </div>
         </li>
         <li>
            <div class="d1">使用范围:</div>
            <div>
              <input class="inp_1" id="proid" name="proid" value="<?php echo $voucher['proid']==''?'all':$voucher['proid']; ?>" readonly="readonly"/>
              <input type="button" value="选择商品" class="aaa_pts_web_3" style="margin-left:15px;" onclick="win_open('<?php echo U('get_pro');?>',1280,800)">
              <span style="color:red;margin-left:5px;">&nbsp;* 默认店铺内所有商品通用</span>
            </div>
         </li>
         <?php if ($voucher['proid']!='all' && $voucher['proid']!='' && $voucher['pro_list']) { ?>
          <li>
            <div class="d1">已选产品:</div>
            <div>
              <?php if(is_array($voucher['pro_list'])): $i = 0; $__LIST__ = $voucher['pro_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><img src="/minimaimaijiaju/Data/<?php echo ($v); ?>" width="100px" height="100px" /><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </li>
         <?php } ?>
        <li><input type="submit" name="submit" value="提交" class="aaa_pts_web_3" border="0" id="aaa_pts_web_s">
          <input type="hidden" name="id" id='id' value="<?php echo ($voucher["id"]); ?>">
        </li>
      </ul>
      </form>
         
    </div>
    
</div>
<script type="text/javascript" src="/minimaimaijiaju/Public/ht/js/product.js"></script>
<script>
function ac_from(){

  var full_money = document.getElementById("full_money").value;
  var amount = document.getElementById("amount").value;
  var count=document.getElementById("count").value;

  if(/^\d+$/.test(count)==false) {
    alert('请输入数字格式的发行数量！');
    return false;
  }

  var fix_amountTest=/^(([1-9]\d*)|\d)(\.\d{1,2})?$/;
    if(fix_amountTest.test(full_money)==false){
      alert("请输入有效格式的满减金额！");
      return false;
    }

    if(fix_amountTest.test(amount)==false){
      alert("请输入有效格式的优惠金额！");
      return false;
    }
  
}

</script>
</body>
</html>