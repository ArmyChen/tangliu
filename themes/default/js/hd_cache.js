$(function(){



    //客服中心下拉框
    $(".cus_c_box").hover(function () {
        $(this).addClass("cus_c_border");
        $(".cus_center").show();
    }, function () {
        $(this).removeClass("cus_c_border");
        $(".cus_center").hide();
    }
	);



   
	  //右侧侧边栏 鼠标移入效果
    $(".pos_relative").hover(function () {
        $(this).addClass("on");
        $(this).find(".f_c_list_tc").show();
    }, function () {
        $(this).removeClass("on");
        $(this).find(".f_c_list_tc").hide();
    });
    //注册按钮点击事件
    $(".uc_login").click(function () {
        $(".err_msg1").show();
    });


     //导航栏关闭弹窗按钮
    $(".uc_close").click(function () {
        $(".user_center").hide();
    });


	/*个人中心*/
	$('#member').hover(
		function(){
			$(this).find('dl').show();
			$('#amember').addClass('imporhover');
		},
		function(){
			$(this).find('dl').hide();
			$('#amember').removeClass('imporhover');
		}
	)
	$('.nav > ul > li').hover(function(){
		$(this).addClass('selected');
		$(this).children('div').show();
	},function(){
		$(this).removeClass('selected');
		$(this).children('div').hide();
	});
	
	/*左侧导航*/
	$(".menuleft").hover(
		function(){
			var s = $(this).find('div[class="menuleft_bottom"]').attr('data');
			if(!s){$(this).find('div[class="menuleft_bottom"]').show();}
		},
		function(){
			var s = $(this).find('div[class="menuleft_bottom"]').attr('data');
			if(!s){$(this).find('div[class="menuleft_bottom"]').hide();}
		}
	);


 


	$(".menuleft_bottom li").hover(
		function(){
			$(this).find(".subItem_hd").show();
			$(this).addClass('hover');
		},
		function(){
			$(this).find(".subItem_hd").hide();
			$(this).removeClass('hover');
		}
	);
	
	/************* 购物车 *************/
	var $prompt_shopcart = $('#prompt_shopcart');
	var timerShopCart = null;
	$("#settleup").hover(function(){
			if(timerShopCart != null){
				clearTimeout(timerShopCart);
			}else{
				if(!$prompt_shopcart.is(":visible")){
					$prompt_shopcart.show();
					$('#dl_settleup').attr('class','hover');
				}	
			}
		},function(){
			timerShopCart = setTimeout(function(){
				$prompt_shopcart.hide();
				$('#dl_settleup').attr('class','');
				timerShopCart = null;
			},500);
			
		}
	);
	
	$prompt_shopcart.hover(
		function(){
			if(timerShopCart != null){
				clearTimeout(timerShopCart);
			}
		},
		function(){
			timerShopCart = setTimeout(function(){
				$prompt_shopcart.hide();
				$('#dl_settleup').attr('class','');
				timerShopCart = null;
			},500);
		}
	);
	/************* 购物车 *************/
	
	/************* 我的爱之谷 *************/
	//我的爱之谷,提示层
	var $loginLayer = $('#prompt_login');
	var timerMyAzg = null;
	$("#myaizhigu_btn").hover(function(){
		if(timerMyAzg != null){
			clearTimeout(timerMyAzg);
		}else{
				if(!$loginLayer.is(":visible")){
					$('#dl_user').attr('class','hover');
					$loginLayer.show();	
				}
		}
	},function(){
			timerMyAzg = setTimeout(function(){
				$loginLayer.hide();
				$('#dl_user').attr('class','');
				timerMyAzg = null;
			},500);
		}
	);
	
	$loginLayer.hover(
		function(){
			if(timerMyAzg != null){
				clearTimeout(timerMyAzg);
			}
		},
		function(){
			timerMyAzg = setTimeout(function(){
				$loginLayer.hide();
				$('#dl_user').attr('class','');
				timerMyAzg = null;
			},500);
		}
	);
	
	/************* 我的爱之谷 *************/
	
	//搜索框
	var text = "";
	
	$(".searchbox").val(text).click(function(){
		if($(this).val() == text){
			$(this).val('').css("color","#000");
		}
		
		$(this).blur(function(){
			if($(this).val() == ""){
				$(this).val(text).css("color","#ccc");
			}
		});
	});
});


//显示购物车
function ShowCart(){
	
}

//刷新购物车数据
function RefreshShopCart(data){
	var goodsHtml = '';	
	
	if(data.goods_list.length == 0){
		$('#prompt_shopcart').html('<div class="prompt"><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div></div>').show();
		$('#shopping-amount').html('0');
		return;
	}
	
	for(var i = 0;i < data.goods_list.length;i++){
		goodsHtml += CartGoodsTpl(data.goods_list[i]);
	}
	
	var tpl = '<div class="sm">'
				+ '<div class="smt">'
					+ '<h4 class="fl b">最新加入的商品</h4>'
				+ '</div>'
				+ '<div class="smc">'
					+ '<ul>' + goodsHtml + '</ul>'
				+ '</div>'
				+ '<div class="smb ar">共<b>' + data.total.total_goods_count + '</b>件商品　共计<strong class="D90000">￥' + data.total.goods_price + '</strong><br>'
					+ '<a href="/shop_cart.php" title="去购物车结算" id="btn-payforgoods">去购物车结算</a></div>'
				+ '</div>';
	
	$('#shopping-amount').html(data.total.total_goods_count);
	$('#prompt_shopcart').html(tpl).show();	
}

//商品列表
function CartGoodsTpl(g){
	//删除方法判断
	var del = '';
	if(g.buy_goods_type == 2){
		//组合商品
		del = 'gifts_delete(' + g.is_gift + ')';
	}else{
		del = 'Cart_Delete(' + g.rec_id + ')';
		if(g.is_gift > 0 || (g.buy_goods_type==3 && g.goods_price <= 0)){
			//赠品不可删除
			del = '';
		}
	}
	
	//价格显示
	var price = '';
	if(g.goods_price == 0){
		price = '免费';
	}else{
		price = '￥' + g.goods_price;
	}
	
	var BiaoShi	= '';	//标识
	var ZengPin = '';	//赠品
	var BaoYou 	= '';	//包邮
	var time = NowTime(); //当前时间
	
	if(g.buy_goods_type != 2 && g.is_gift > 0 
	|| g.buy_goods_type == 4 
	|| g.buy_goods_type == 3){
		ZengPin = '<span class ="zp"></span>'
	}else if (g.buy_goods_type == 0 
		&& g.is_promote == 1 
		&& g.promote_start_date < time 
		&& time < g.promote_end_date){
		ZengPin = "<span class ='zk'></span>";
	}
	
	if(g.buy_goods_type == 1){
		BiaoShi = "<span class='b_c'>[积分兑换]</span>";
	}else if(g.buy_goods_type == 2){
		BiaoShi = "<span class='b_c'>[" + g.biaoshi + "件套礼包]</span>";
	}else if(g.buy_goods_type == 3 && g.goods_price > 0){
		BiaoShi = "<span class='b_c'>[换购]</span>";
	}else if(g.buy_goods_type == 4){
		BiaoShi = "<span class='b_c'>[赠品券]</span>";
	}
	
	if(g.is_shipping == 1){
		BaoYou = "<span class='goodname_sale_pro_7'></span>";
	}
	
	var tpl = '<li><div class="p-img fl">'
						+ '<a href="/' + g.url + '" target="_blank" title="' + g.goods_name + '">'
							+ '<img src="' + g.goods_thumb + '" width="50" height="50" alt="' + g.goods_name + '">'
						+ '</a>'
						+ '</div>'
					+ '<div class="p-name fl">'
						+ '<a href="/' + g.url + '" target="_blank" title="' + g.goods_name + '">' + BiaoShi +  g.goods_name + ZengPin + BaoYou + '</a>'
					+ '</div>'
					+ '<div class="p-detail fr ar">'
						+ '<span class="p-price col666">'
							+ '<strong class="D90000">' + price + '</strong>×' + g.goods_number
						+ '</span><br>'
						+ '<a class="delete" href="javascript:' + del + '">删除</a>'
					+ '</div>'
				+ '</li>';
	return tpl;
}

//当前时间
function NowTime(){
	return Math.round(new Date().getTime()/1000);
}

//删除商品
function Cart_Delete(rec_id){

	$.post('/shop_cart.php?act=update_cart',{'step':'drop_goods','rec_id':rec_id},
	function(ret){
	  if(ret.success){
		 ShowCart();
	  }
	},'json');
	return;
}

//删除礼包
function gifts_delete(gift_id){
	$.post('/shop_cart.php?act=update_cart',{'step':'drop_gifts','rec_id':gift_id},
	function(ret){
	  if(ret.success){
		 ShowCart();
	  }
	},'json');
	return;
}


//QQ登录
var qqLoginWin;
function head_qq_login(){
    qqLoginWin = window.open("/qq/login.php","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
}

/*提交搜索*/
function search_Submit(){
	var searchword = $(".searchbox").val().replace(/(^\s*)|(\s*$)/g, "");
	if(searchword == ""){
		$(".searchbox")[0].focus();
		return false;
	}else{
		window.open('/search-' + searchword + '-0-0-1.html');
		return false;
	}
}

/*加入收藏夹*/
function AddFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, '');
        }
        catch (e)
        {
            alert('加入收藏失败，请使用Ctrl+D进行添加');
        }
    }
}

function closeImg(){$('.RoofBanner').hide();}



