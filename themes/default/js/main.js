$(function(){
	$('.aside').addClass('show');
	
	/*控制go-top*/
	var subGoTop=$(".aside .top-btn");
	$(document).scroll(function(){
		var scrolltop=$(document).scrollTop();			//滚动条的高度
		if(scrolltop==0){
			subGoTop.removeClass('show');
		}else{
			subGoTop.addClass('show');
		}
	})
	
	subGoTop.click(function(){
		$('body,html').animate({scrollTop:0},500);
	})
	/*控制go-top  end*/
	
	/*控制二维码显示*/
	var ewm=$(".aside .ewm-btn");
	ewm.hover(
		function(){
			$('.aside .ewm').addClass('show');
		},function(){
			$('.aside .ewm').removeClass('show');
		}
	)
	/*控制二维码显示  end*/
	
	
	/*点击计算价格后移动到工程预算表*/
	$('.product-total .count').click(function(){
		var gcysb_top = $('.gcysb').offset().top;
		$('body').stop().animate({ scrollTop:gcysb_top },500);
	})
	/*点击计算价格后移动到工程预算表 end*/
})


/*侧边栏的显示*/
$(function(){
	$('.goods-btn').click(function(){
		$('.aside').toggleClass('show-goods');
		return false;
	})
	
	$(".banner-nav,.aside-main").click(function(event){
            event.stopPropagation();
    });
	
	$('body').click(function(){
		$('.aside').removeClass('show-goods');
	})
})
/*侧边栏的显示*/

/*动态修改侧边栏的高度*/
$(function(){
	var winH = $(window).height()-150;
	$('#product-box').height(winH);
})
/*动态修改侧边栏的高度  end*/

/*显示二级导航*/
$(function(){
	$('.nav>ul>li').mouseenter(function(){
		var _this=$(this);
		$('.nav').find('.sub-nav').css('z-index','5');
		_this.find('.sub-nav').css('z-index','10');
		function show(_this){
			$('.nav').find('.sub-nav').slideDown(400);
		}
		var _show=window.setTimeout(function(){show(_this)},400);
		return
	});
	
	$('.nav').mouseleave(function(){
		function hidden(){
			$('.nav').find('.sub-nav').slideUp(400);
		}
		var _hidden =window.setTimeout(hidden,300);
		$('.nav>ul>li').mouseover(function(){
			clearInterval(_hidden); 
		})
		return
	});
	
})
/*显示二级导航  end*/


/*模拟下拉框*/
$(function(){
  	$('.arrow_right').click(function(e){
		$(this).parent().parent().find('.select-list').toggle();
		e.stopPropagation();
		$('body').click(function(){
			$(this).parent().parent().find('.select-list').hide();
		})
  	})
  	$('.select-list li').click(function(){
  		$(this).parent().parent().find('.text_left').text(($(this).text())); 
		var _value=$(this).attr('value');
		$(this).parent().parent().find('.text_left').attr('value',_value);
  	}) 
})
/*模拟下拉框  end*/

/*选择产品添加到表格*/
/*
	说明: 	导航里面类目必须要和表格里的类目一样
			用序号判断是否重复选择
*/
$(function(){
	
	/*解决IE8不支持arr.indexOf方法*/
	if (!Array.prototype.indexOf)
	{
	  Array.prototype.indexOf = function(elt /*, from*/)
	  {
		var len = this.length >>> 0;
		var from = Number(arguments[1]) || 0;
		from = (from < 0)
			 ? Math.ceil(from)
			 : Math.floor(from);
		if (from < 0)
		  from += len;
		for (; from < len; from++)
		{
		  if (from in this &&
			  this[from] === elt)
			return from;
		}
		return -1;
	  };
	}
	/*解决IE8不支持arr.indexOf方法  end*/
	
	//制保留2位小数，如：2，会在2后面补上00.即2.00    
    function toDecimal2(x) {    
        var f = parseFloat(x);    
        if (isNaN(f)) {    
            return false;    
        }    
        var f = Math.round(x*100)/100;    
        var s = f.toString();    
        var rs = s.indexOf('.');    
        if (rs < 0) {    
            rs = s.length;    
            s += '.';    
        }    
        while (s.length <= rs + 2) {    
            s += '0';    
        }    
        return s;    
    } 
	
	
	/*调整表格最前方的类目*/
	function change_lm(ele){
		var sub_table_this_tr2=ele.find('tr');
		var tr_num2 = sub_table_this_tr2.length;
		if(tr_num2>=3){
			tr_num3=tr_num2-2;
			ele.find('tr:eq(1)').find('.lm').attr('rowspan',tr_num3);
		}
	}
	/*调整表格最前方的类目  end*/
	
	/*现实表格删除tr*/
	function table_tr_dele(now_add_table){
		$('.gcysb .sub-table .close').click(function(index){
			var now_tr=$(this).closest('tr');
			var nav_tr=$(this).closest('tr');
			var now_xh=$(this).closest('tr').find('.xh').text();
			var now_table=$(this).closest('table');
			var all_tr_len=now_table.find('tr').length;
			if(all_tr_len<=3){
				now_table.find('.default').css('display','table-row');
				now_table.find('.add').css('display','none');
			}else{
				if(now_tr.find('.lm').length>0){
					var now_lm=now_tr.find('.lm').clone();
					now_tr.next('tr').prepend(now_lm);
				}
			}
			now_tr.remove();

			/*表格删除时导航的颜色变回绿色*/
			$('.banner-box .product').each(function() {
				var all_xh=$(this).find('.xh').text();
				if(now_xh==all_xh){
					$(this).find('.opt').removeClass('on');
				}
			});
			

			/*同时删除侧边栏里相同的*/
			array=[];
			var now_xh=$(this).closest('tr').find('.xh').text();
			$('#product-box .product').each(function(index) {
				array.push($(this).find('.xh').text());
				var num=array.indexOf(now_xh);
				if(num!=-1){
					$(this).remove();
					return false;
				}
			})
			/*同时删除侧边栏里相同的*/
			
			aside_price();						/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价(传入的参数是当个tr)*/
					
			table_price();						/*计算表格的综合单价  合计金额  某类目小计金额 总价(传入的参数是当个tr)*/
					
			change_lm(now_add_table);			/*调整表格最前方的类目*/
			
			var product_num =$('.aside-main .product-box .product').length;		//统计侧边栏有多少商品
			$('.aside .goods-btn .num').text(product_num);
			
		})
	}
	/*现实表格删除tr  end*/
	
	/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
	function table_price(){
		$('.gcysb .sub-table tr').each(function() {
			/*计算综合价格*/
			var now_rgdj=parseInt($(this).find('.rgdj').text())||parseInt($(this).find('.rgdj input').val());
			var now_cldj=parseInt($(this).find('.cldj').text())||parseInt($(this).find('.cldj input').val());
			var now_zhdj = now_rgdj + now_cldj;
			if(!isNaN(now_zhdj)){
				$(this).find('.zhdj').text(now_zhdj);
			}
			
			/*计算合计金额*/
			var now_sl=parseInt($(this).find('.sl').find('input').val());
			var now_hjje=now_sl*now_zhdj;
			if(!isNaN(now_hjje)){
				$(this).find('.hjje').find('p').text(now_hjje);
			}
		});
		
		/*计算表格小计*/
		var hjje =0;
		$('.gcysb .sub-table').each(function(index, element) {
			$(this).find('tr').each(function(index, element) {
				o_hjje=parseInt($(this).find('.hjje').find('p').text());
				if(isNaN(o_hjje)){
					o_hjje=0;
				}
				hjje = hjje + o_hjje;
				var xiaoji=toDecimal2(hjje);
				$(this).closest('.sub-table').find('.sub-total').find('b').text(xiaoji);
			});
			hjje=0;
		});
		/*计算表格小计  end*/
		
		/*计算表格总金额*/
		var all_xiaoji=$('.gcysb').find('.add').find('.sub-total').find('b');
		var zongji=$('.gcysb').find('.zongjia').find('b');
		var xiaoji =0;
		all_xiaoji.each(function(index, element) {
			o_hjje=parseInt($(this).text());
			if(isNaN(o_hjje)){
				o_hjje=0;
			}
			xiaoji = xiaoji + o_hjje;
			zongji=toDecimal2(xiaoji);
			$('.gcysb').find('.zongjia').find('b').text(zongji);
		});
		/*计算表格总金额  end*/
		
		if(zongji==0){
			$('.zongjia').css('display','none');
			$('.aside').removeClass('show-goods');
			$('.book-box').css('display','none');
		}
		return false;

	}
	/*计算表格的综合单价  合计金额  某类目小计金额 总价  end*/
	
	
	/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价  */
	function aside_price(){
		$('.aside-main .product').each(function(index, element) {
			/*计算综合价格*/
			var now_rgdj=parseInt($(this).find('.rgdj').text());
			var now_cldj=parseInt($(this).find('.cldj').text());
			var now_zhdj = now_rgdj + now_cldj;
			$(this).find('.zhdj').text(now_zhdj);
			
			/*计算合计金额*/
			var now_sl=parseInt($(this).find('.sl').find('input').val());
			var now_hjje=now_sl*now_zhdj;
			$(this).find('.hjje').find('p').text(now_hjje);

		});
		
		/*计算侧边栏总价*/
		var all_xiaoji=$('.aside-main').find('.hjje').find('p');
		var zongji=$('.aside-main').find('.product-total').find('.total').find('b');
		var xiaoji =0;
		all_xiaoji.each(function(index, element) {
			o_hjje=parseInt($(this).text());
			if(isNaN(o_hjje)){
				o_hjje=0;
			}
			xiaoji = xiaoji + o_hjje;
		});
		xiaoji=toDecimal2(xiaoji);
		zongji.text(xiaoji);
		/*计算侧边栏总价  end*/
		
		if(xiaoji==0){
			$('.zongjia').css('display','none');
			//$('.aside-main').css('display','none');
			$('.book-box').css('display','none');
		}else{
			$('.zongjia').css('display','block');
			$('.aside-main').css('display','block');
			$('.book-box').css('display','block');
		}
		return false;
	}
	/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价  end*/
		
	
	var json={};
	$('.banner-nav .opt').click(function(){
		var _this=$(this);
		var nav_btn=$(this);											//点击的商品的按钮
		var nav_tr=$(this).closest('tr');								//点击的商品的tr
		var nav_lm=$(this).closest('.sub-box').find('.sub').text();		//点击的商品导航的类目
		var nav_xh=$(this).closest('tr').find('.xh').text();			//点击的商品导航商品的序号
		var arr=[];
		$(this).addClass('on');
		
		/*添加到表格里*/
		$('.gcysb .sub-table').each(function() {
			var now_add_table=$(this);									
            var tab_lm=$(this).find('.lm:eq(0) span').text();			//表格每个小table的第一个tr的类目
			if(tab_lm==nav_lm){
				
				/*判断是否添加到表格中*/
				var sub_table_this_tr=$(this).find('tr');
				var tr_num = sub_table_this_tr.length;
				
				sub_table_this_tr.each(function() {
                    var sub_table_tr_xh=$(this).find('.xh').text();
					arr.push(sub_table_tr_xh);
                });
				
				var num=arr.indexOf(nav_xh);							//判断表格里的序号有没有商品序号
				if(num==-1){
					$(this).find('.default').css('display','none');		//隐藏默认的tr
					var default_lm=$(this).find('.default .lm').clone();
					$(this).find('.add').css('display','table-row');	//显示自定义添加按钮
					
					var oProduct=nav_tr.closest('.product').clone();	//点击的商品的product
					$('.aside-main .product-box').append(oProduct);		//添加到侧边栏	
					
					var product_num =$('.aside-main .product-box .product').length;		//统计侧边栏有多少商品
					$('.aside .goods-btn .num').text(product_num);
					
					
					var this_num=$(this).find('tr').length;
					nav_tr=nav_tr.clone(true);
					if(this_num>2){
						nav_tr.find('.lm').remove();
					}else{
						nav_tr.find('.lm').remove();
						nav_tr.prepend(default_lm);
					}
					
					$(this).find('.add').before(nav_tr);				//添加到表格
					
					aside_price();						/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价(传入的参数是当个tr)*/
					
					table_price();						/*计算表格的综合单价  合计金额  某类目小计金额 总价(传入的参数是当个tr)*/
					
					table_tr_dele(now_add_table);		//现实表格删除tr
			
					change_lm(now_add_table);			//调整表格最前方的类目
					
				}else{
					/*再次点击导航时,删除表格里重复的*/
					_this.removeClass('on');
					var now_table=$(this);								
					var all_tr=$(this).find('tr');						
					var all_tr_num=$(this).find('tr').length		
					all_tr.each(function() {						
                        var all_tr_xh=$(this).find('.xh').text();	
						if(all_tr_xh==nav_xh){						
							if(all_tr_num<=3){						
								now_table.find('.default').css('display','table-row');
								now_table.find('.add').css('display','none');
							}else{
								if($(this).find('.lm').length>0){		
									var now_lm=$(this).find('.lm').clone();
									$(this).next('tr').prepend(now_lm);
								}
							}
							
							$(this).remove();
							all_tr_num=now_table.find('tr').length
							
							if(all_tr_num>=3){
								var all_tr_num2=all_tr_num-2;
								now_table.find('tr:eq(1)').find('.lm').attr('rowspan',all_tr_num2);
							}
							return false;
						}
                    });
					/*再次点击导航时,删除表格里重复的*/
					
					/*同时删除侧边栏的*/
					$('.aside-main .product').each(function(index, element) {		//每一个侧边栏里面的商品
                        var all_xh = $(this).find('.xh').text();					//全部侧边栏里的序号的值
						if(all_xh==nav_xh){											//某一个序号等于点击商品的序号
							$(this).closest('.product').remove();
							
						}
                    });
					/*同时删除侧边栏的  end*/
					
					table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
					
					aside_price();			/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价*/
					
					var product_num =$('.aside-main .product-box .product').length;		//统计侧边栏有多少商品
					$('.aside .goods-btn .num').text(product_num);
					
				}
				/*判断是否添加到表格中 end*/

				
				/*表格数量框的改变*/
				$('.gcysb .sl_input').unbind('change');
				$('.gcysb .sl_input').change(function(){
					var now_xh_table=$(this).closest('tr').find('.xh').text();
					var oSl=$(this).val();
					var now_tr=$(this).closest('tr');
					
					table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
					
					
					/*表格数量的改变同步到侧边栏*/
					array=[];
					$('.aside-main .product').each(function(index) {
						var aside_xh=$(this).find('.xh').text();
						if(now_xh_table==aside_xh){
							$(this).find('.sl_input').val(oSl);
						}
					})
					
					aside_price();			/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价*/
					

				})
				/*表格数量框的改变  end*/
				
				/*侧边栏数量框的改变*/
				$('.aside .sl_input').unbind('change');
				$('.aside .sl_input').change(function(){
					var now_xh_aside=$(this).closest('tr').find('.xh').text();
					var oSl=$(this).val();
					var now_tr=$(this).closest('tr');
					
					
					aside_price();			/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价*/


					/*侧边栏数量的改变同步到侧边栏*/
					array=[];
					$('.gcysb .sub-table tr').each(function(index) {
						var aside_xh=$(this).find('.xh').text();
						if(now_xh_aside==aside_xh){
							$(this).find('.sl_input').val(oSl);
						}
					})
					
					table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
					
					
				})
				/*侧边栏数量框的改变  end*/
				
				/*实现自定义添加*/
				$('.sub-table .add .add-btn').unbind('click');
				$('.sub-table .add .add-btn').click(function(){
			
					var zdyAdd=$('.table-box>tbody>.zdyAdd').clone(true);			//zdyAdd的模板
					var now_table=$(this).closest('table');							//现在的table
					
					var all_tr_len=now_table.find('tr').length+1;
					if(all_tr_len>=3){
						var tr_num=all_tr_len-2;
						now_table.find('tr:eq(1)').find('.lm').attr('rowspan',tr_num);
					}
			
					$(this).closest('.add').before(zdyAdd);
					table_tr_dele(now_table);
					
					table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
				
				})
				/*实现自定义添加  end*/
				
				/*实现自定义添加的人工单价修改*/
				$('.rgdj input').change(function(){
					
					table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/

				})
				
				/*实现自定义添加的材料单价修改*/
				$('.cldj input').change(function(){
					
					table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
					
				})
				
				/*选择下拉列表的时候换材料单价*/
				$('.select-list li').unbind('click');
				$('.select-list li').click(function(){
					$(this).parent().parent().find('.text_left').text(($(this).text()));
					/*替换表格的材料单价和计算表格的总价*/
					var new_cldj=$(this).val();
					var new_cldj00=toDecimal2(new_cldj);
					$(this).closest('tr').find('.cldj').text(new_cldj00);
					
					table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
					
					
					/*替换侧边栏的材料单价和计算表格的总价*/
					var now_xh = $(this).closest('tr').find('.xh').text();
					$('.aside-main .product').each(function(index, element) {
                        var all_xh=$(this).find('.xh').text();
						if(now_xh==all_xh){
							$(this).find('.cldj').text(new_cldj00);
						}
                    });
					aside_price();			/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价*/
				}) 
				
				

				/*实现侧边栏的删除*/
				$('#product-box .product .close').unbind('click');
				$('#product-box .product .close').click(function(index) {
					var array=[];
					$(this).closest('.product').remove();
					var now_tr=$(this).closest('tr');
					var now_xh=$(this).closest('table').find('.xh').text();
					
					/*同时删除表格对应的那个*/
					$('.gcysb .sub-table tr').each(function(index) {
						
						array.push($(this).find('.xh').text());
						var num=array.indexOf(now_xh);
						
						if(num!=-1){
							var now_table=$(this).closest('.sub-table');
							var all_tr_len=now_table.find('tr').length;
							
							if(all_tr_len<=3){
								now_table.find('.default').css('display','table-row');
								now_table.find('.add').css('display','none');

							}else{
								if($(this).find('.lm').length>0){
									var now_lm=$(this).find('.lm').clone();
									$(this).next('tr').prepend(now_lm);
								}
							}				
							$(this).remove();
							
							
							aside_price();			/*计算侧边栏的综合单价  合计金额  某类目小计金额 总价*/
							
							
							table_price();			/*计算表格的综合单价  合计金额  某类目小计金额 总价*/
							
							
							change_lm(now_table);	//调整表格最前方的类目
							
							var product_num =$('.aside-main .product-box .product').length;		//统计侧边栏有多少商品
							$('.aside .goods-btn .num').text(product_num);
							
							return false;
						}
					})
					
					
					/*侧边栏删除时导航的颜色变回绿色*/
					$('.banner-box .product').each(function() {
                        var all_xh=$(this).find('.xh').text();
						if(now_xh==all_xh){
							$(this).find('.opt').removeClass('on');
						}
                    });
				})
				/*实现侧边栏的删除 end*/
				
				
			}
			
        })
		/*添加到表格里 end*/
	})
	
	
	
})
/*选择产品添加到表格  end*/

/* 查看工期表 */
var time_limit = $('#time_limit');
$('#viewTimeLimit,#time_limit').click(
	function(){
		$(time_limit).toggle(0)
	}
);

/* 备注查看更多*/
$('.bz').mouseover(function(){ $(this).find('.tip').show(0);
}).mouseout(function(){$(this).find('.tip').hide(0);});
/* 查看工期表 end*/

