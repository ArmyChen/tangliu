function BoxAddcartClose(){
$('#popupbox_addcart a.close').trigger('click');
}

function addToCart(goodsId, parentId)
{
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var formBuy      = document.forms['ECS_FORMBUY'];
  var quick		   = 0;

  // 检查是否有商品规格 
  if (formBuy)
  {
    spec_arr = getSelectedAttributes(formBuy);

    if (formBuy.elements['number'])
    {
      number = formBuy.elements['number'].value;
    }

	quick = 1;
  }

  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goodsId;
  goods.number   = number;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);

  Ajax.call('flow.php?step=add_to_cart', 'goods=' + obj2str(goods), addToCartResponse, 'POST', 'JSON');
}
function addToCartResponse(result)
{
  if (result.error > 0)
  {
    // 如果需要缺货登记，跳转
    if (result.error == 2)
    {
      if (confirm(result.message))
      {
        location.href = 'user.php?act=add_booking&id=' + result.goods_id + '&spec=' + result.product_spec;
      }
    }
    // 没选规格，弹出属性选择框
    else if (result.error == 6)
    {
      openSpeDiv(result.message, result.goods_id, result.parent);
    }
    else
    {
      //alert(result.message);
    }
  }
  else
  {
        
		$('#popupbox_addcart_totalcount').html(result.goods_number);
		$('#popupbox_addcart_subtotal').html(result.goods_price);
    	$.blockUI({
			message: $('#popupbox_addcart')
		});
		$('#close').click(
			function(){
				$.unblockUI();
				location.href = location.href;
			}
		);
	
  }
}


function BoxAddcartscClose(){
$('#popupbox_addcartsc a.closesc').trigger('click');
}



/* *
 * 添加商品到收藏夹
 */
function collectcat(goodsId)
{
  Ajax.call('user.php?act=collect', 'id=' + goodsId, collectResponsecat, 'GET', 'JSON');
}

/* *
 * 处理收藏商品的反馈信息
 */
function collectResponsecat(result)
{
  



if (result.error > 0)
  {
$.blockUI({
			message: $('#popupbox_addcartsc')
		});
		$('#closesc').click(
			function(){
				$.unblockUI();
				location.href = location.href;
			}
		);
  }
  else
  {
        
		
    alert(result.message);	
	
  }





}










function obj2str(o){
    var r = [];
    if(typeof o =="string") return "\""+o.replace(/([\'\"\\])/g,"\\$1").replace(/(\n)/g,"\\n").replace(/(\r)/g,"\\r").replace(/(\t)/g,"\\t")+"\"";
    if(typeof o =="undefined") return "undefined";
    if(typeof o == "object"){
        if(o===null) return "null";
        else if(!o.sort){
            for(var i in o)
                r.push("\""+i+"\""+":"+obj2str(o[i]))
            r="{"+r.join()+"}"
        }else{
            for(var i =0;i<o.length;i++)
                r.push(obj2str(o[i]))
            r="["+r.join()+"]"
        }
        return r;
    }
    return o.toString();
}