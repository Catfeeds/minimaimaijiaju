// pages/panic/panic.js
var app = getApp();
Page({
  data:{
    vou:[],
    proid:0
  },
   getvou:function(e){
    var that = this;
    var vid = e.currentTarget.dataset.vid;
    var uid = app.d.userId;
    wx.request({
      url: app.d.ceshiUrl + '/Api/Voucher/get_voucher',
      method:'post',
      data: {vid:vid,uid:uid},
      header: {
        'Content-Type':  'application/x-www-form-urlencoded'
      },
      success: function (res) {  
        var status = res.data.status;
        var proid = that.data.proid;
        if(status==1){
          if(proid != 0){
            wx.showModal({
              title: '领取成功！',
              content: '是否继续购买商品？',
              success: function (res) {
                if (res.confirm) {
                  wx.redirectTo({
                    url: "../product/detail?productId=" + proid
                  })
                } else if (res.cancel) {

                }
              }
            })
          }else{
            wx.showToast({
              title: '领取成功！',
              duration: 2000
            });
          }
         
        }else{
          if (proid != 0) {
            wx.showModal({
              title: res.data.err,
              content: '是否继续购买商品？',
              success: function (res) {
                if (res.confirm) {
                  wx.redirectTo({
                    url: "../product/detail?productId=" + proid
                  })
                } else if (res.cancel) {

                }
              }
            })
          } else {
            wx.showToast({
              title: res.data.err,
              duration: 2000
            });
          }
        }
        
        //endInitData
      },
      fail:function(e){
        wx.showToast({
          title: '网络异常！',
          duration: 2000
        });
      },
    });
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    var that = this;
    if (options.proid != undefined){
      var proid = options.proid;
    }else{
      var proid = 0;
    }
    
    that.setData({
      proid:proid,
    });
    wx.request({
      url: app.d.ceshiUrl + '/Api/Voucher/index',
      method:'post',
      data: {},
      header: {
        'Content-Type':  'application/x-www-form-urlencoded'
      },
      success: function (res) {  
        var vou = res.data.vou;
        that.setData({
          vou:vou,
        });
        //endInitData
      },
      error:function(e){
        wx.showToast({
          title: '网络异常！',
          duration: 2000
        });
      },
    });
  },
  onReady:function(){
    // 页面渲染完成
  },
  onShow:function(){
    // 页面显示
  },
  onHide:function(){
    // 页面隐藏
  },
  onUnload:function(){
    // 页面关闭
  }
})