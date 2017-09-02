<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends PublicController {
	//***************************
	//  首页数据接口
	//***************************
    public function index(){
    	//如果缓存首页没有数据，那么就读取数据库
    	/***********获取首页顶部轮播图************/
    	$ggtop=M('guanggao')->order('sort desc,id asc')->field('id,photo')->limit(10)->select();
		foreach ($ggtop as $k => $v) {
			$ggtop[$k]['photo']=__DATAURL__.$v['photo'];
		}
    	/***********获取首页顶部轮播图 end************/

        //======================
        //首页推荐商家12个
        //======================
        $shop = M('shangchang')->where('status=1 AND type=1')->field('id,logo')->limit(12)->select();
        foreach ($shop as $k => $v) {
            $shop[$k]['logo'] = __DATAURL__.$v['logo'];
        }

    	//======================
    	//首页推荐产品
    	//======================
    	$pro_list = M('product')->where('del=0 AND pro_type=1 AND is_down=0 AND type=1')->order('sort desc,id desc')->field('id,name,photo_x,price_yh,shiyong,price')->limit(8)->select();
    	foreach ($pro_list as $k => $v) {
    		$pro_list[$k]['photo_x'] = __DATAURL__.$v['photo_x'];
    	}

        //======================
        //首页前三个分类
        //======================
        $cat = M('indeximg')->where('1=1')->order('sort desc,id asc')->field('cid,name,photo')->limit(3)->select();
        $first = array();
        foreach ($cat as $k => $v) {
            $first[$k]['name'] = $v['name'];
            $first[$k]['imgs'] = __DATAURL__.$v['photo'];
            $first[$k]['link'] = 'list';
            $first[$k]['ptype'] = intval($v['cid']);
        }

        //======================
        //首页分类 自己组建数组
        //======================
        //前四个
        $first[3]['name'] = '品牌馆';
        $first[3]['imgs'] = __PUBLICURL__.'home/images/icon/shop.png';
        $first[3]['link'] = 'other';
        $first[3]['ptype'] = 'shop';

        //后四个
        $last = array();
        $last[0]['name'] = '最新资讯';
        $last[0]['imgs'] = __PUBLICURL__.'home/images/icon/xianshi.png';
        $last[0]['link'] = 'other';
        $last[0]['ptype'] = 'news';

        $last[1]['name'] = '优惠活动';
        $last[1]['imgs'] = __PUBLICURL__.'home/images/icon/vou.png';
        $last[1]['link'] = 'other';
        $last[1]['ptype'] = 'vou';

        $last[2]['name'] = '加盟合作';
        $last[2]['imgs'] = __PUBLICURL__.'home/images/icon/col.png';
        $last[2]['link'] = 'other';
        $last[2]['ptype'] = 'join';

        $last[3]['name'] = '线下体验';
        $last[3]['imgs'] = __PUBLICURL__.'home/images/icon/all.png';
        $last[3]['link'] = 'other';
        $last[3]['ptype'] = 'offline';

        //尾四个
        $more = M('indeximg')->where('1=1 AND id>3')->order('sort desc,id asc')->field('cid,name,photo')->limit(4)->select();
        foreach ($more as $k => $v) {
            $more[$k]['name'] = $v['name'];
            $more[$k]['imgs'] = __DATAURL__.$v['photo'];
            $more[$k]['link'] = 'list';
            $more[$k]['ptype'] = intval($v['cid']);
        }

    	echo json_encode(array('ggtop'=>$ggtop,'prolist'=>$pro_list,'shop'=>$shop,'first'=>$first,'last'=>$last,'more'=>$more));
    	exit();
    }

    //***************************
    //  首页产品 分页
    //***************************
    public function getlist(){
        $page = intval($_REQUEST['page']);
        $limit = intval($page*8)-8;

        $pro_list = M('product')->where('del=0 AND pro_type=1 AND is_down=0 AND type=1')->order('sort desc,id desc')->field('id,name,photo_x,price_yh,shiyong')->limit($limit.',8')->select();
        foreach ($pro_list as $k => $v) {
            $pro_list[$k]['photo_x'] = __DATAURL__.$v['photo_x'];
        }

        echo json_encode(array('prolist'=>$pro_list));
        exit();
    }

    public function ceshi(){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<32;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        echo $str;
    }

}