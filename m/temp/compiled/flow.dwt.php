<!DOCTYPE html>
<html style="font-size: 20px;"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="">
<meta name="Description" content="">
<link rel="shortcut icon" href="favicon.ico">
<link href="<?php echo $this->_var['ecsolve_path']; ?>/style/public.css" rel="stylesheet" type="text/css">
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,shopping_flow.js')); ?>
<script type="text/javascript" src="<?php echo $this->_var['ecsolve_path']; ?>/js/transport.js"></script>


<style>
 .header>img {height:4rem; width:100%;}
</style>

</head>

<body style="padding: 0px; margin: 0px auto;">
<?php if ($this->_var['step'] == "cart"): ?>
<div class="header headerHide">
    <img original="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg" src="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg">
    <h2>购物车</h2>
    <a href="javascript:history.back();"></a>
    <a href="index.php" class="right"></a>
</div>

 

  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?> 
<script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li class="cur">1.购物车列表</li>
    <li>2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>
<?php if ($this->_var['goods_list']): ?>
<div class="toolbar radius10" style="margin-bottom:1rem" >
  <p>合计: <span class="price" id="goods_subtotal" ><?php echo $this->_var['total']['goods_price']; ?></span></p>
  <a href="flow.php?step=checkout">现在结算(<span class="num" id="total_number"><?php echo $this->_var['total']['total_number']; ?></span>)</a> </div>
<div class="wrap" style="padding-bottom:1rem"  >
  <form id="formCart" name="formCart" method="post" action="flow.php">
    <ul class="radius10 cartitemlist">
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
      <li class="new-tbl-type">
        <div class="itemlist_l"  style="float:left;margin-left:1rem;" > 
          <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?> 
          <a  href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"> <img class="lazy" src="<?php echo $this->_var['goods']['goods_img']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /> </a> 
          <?php if ($this->_var['goods']['parent_id'] > 0): ?> 
          <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span> 
          <?php endif; ?> 
          <?php if ($this->_var['goods']['is_gift'] > 0): ?> 
          <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span> 
          <?php endif; ?> 
          <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?> 
          <a href="javascript:void(0)" onClick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
          <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none"> 
            <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?> 
            <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
          </div>
          <?php else: ?> 
          <?php echo $this->_var['goods']['goods_name']; ?> 
          <?php endif; ?> 
        </div>
        <div class="desc "  style="float:left;margin-left:1rem;" > <a style="color:#333" href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="fragment">
          <p style="color:#F7236B;"><?php echo $this->_var['goods']['goods_name']; ?></p>
          </a>
          <div style="clear:both"> </div>
          <?php if ($this->_var['show_goods_attribute'] == 1): ?>
          <p> <?php echo $this->_var['goods']['goods_attr']; ?>  <span class="price"><?php echo $this->_var['goods']['goods_price']; ?></span> </p>
          <?php endif; ?>
          <div class="b"> <span class="txt"> 
		  <button type="button" class="decrease" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,-1)">-</button>
            <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
            <input class="num" type="text" min="1" max="1000" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="4"   onkeyup="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,0)"/>
			<button type="button" class="increase" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,1)">+</button>
 
			<script>
        function changenum(rec_id,diff){
					var num = parseInt(document.getElementById('goods_number_'+rec_id).value);
					var goods_number = num + Number(diff);
					if( goods_number >= 1){
						document.getElementById('goods_number_'+rec_id).value = goods_number;//更新数量
						change_goods_number(rec_id,goods_number);
					}
        }
        
        function change_goods_number(rec_id, goods_number)
        {   
        Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&goods_number=' + goods_number, change_goods_number_response, 'POST','JSON');  
        } 
        
        function change_goods_number_response(result)
        {    
	//alert("bbbb");
          if (result.error == 0)
          {
          var rec_id = result.rec_id;
            document.getElementById('total_number').innerHTML = result.total_number;//更新数量
            document.getElementById('goods_subtotal').innerHTML = result.total_desc;//更新小计
            if (document.getElementById('ECS_CARTINFO'))
              {//更新购物车数量
              document.getElementById('ECS_CARTINFO').innerHTML = result.cart_info;
              }
        }
        else if (result.message != '')
          {
          alert(result.message);
          }                
        }
      </script>
            <?php else: ?> 
            <?php echo $this->_var['goods']['goods_number']; ?> 
            <?php endif; ?> 
            </span> <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; "   class="ico_08 cha"> </a> </div>
        </div>
      </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    <input type="hidden" name="step" value="update_cart" />
  </form>
<?php if ($this->_var['favourable_list']): ?>
<?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
<form action="flow.php" method="post">
    <section class="order_box padd1 radius10 goodsBuy "> 
      <table class="ectouch_table" width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="25%" bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['label_act_name']; ?></td>
          <td width="75%" bgcolor="#ffffff" align="left"><?php echo $this->_var['favourable']['act_name']; ?></td>
        </tr>
        <tr>
          <td width="15%"  bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_period']; ?></td>
          <td width="35%" bgcolor="#ffffff" align="left"><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_range']; ?></td>
          <td bgcolor="#ffffff" align="left"> <?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br />
              <?php echo $this->_var['favourable']['act_range_desc']; ?>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_amount']; ?></td>
          <td bgcolor="#ffffff" align="left"> <?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_type']; ?></td>
          <td bgcolor="#ffffff" align="left"> 
          <span class="STYLE1"><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
                <?php if ($this->_var['favourable']['act_type'] == 0): ?>
                <?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br />
                  <input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
                  <a href="goods.php?id=<?php echo $this->_var['gift']['id']; ?>" target="_blank" class="f6"><?php echo $this->_var['gift']['name']; ?></a> [<?php echo $this->_var['gift']['formated_price']; ?>]
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php endif; ?>  
          </td>
        </tr>
        <?php if ($this->_var['favourable']['available']): ?>
            <tr>
              <td align="right" bgcolor="#ffffff">&nbsp;</td>
              <td bgcolor="#ffffff" align="left">
                <div class="option">
                 <button class="btn cart radius5" type="image">
                <div class="ico_01"></div>
                加入购物车
                </button>
                 </div>
              </td>
            </tr>
            <?php endif; ?>
      </table>
      <input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>" />
          <input type="hidden" name="step" value="add_favourable" />
    </section>
    </form>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

<?php endif; ?>
</div>

<?php else: ?>
<section class="wrap"  >
  <div class="empty-cart">
    <div class="ico_13 cart-logo"></div>
    <p class="message">没有宝贝哦，不如去添加宝贝</p>
    <div class="flex"> <a class="c-btn2  flex_in radius5" href="index.php" style=" background:#6bd0a2"> <i class="ico_04_b"></i> 去购物 </a> <a class="c-btn2  flex_in radius5" href="user.php?act=collection_list" style=" margin-left:0.5rem"> 查看收藏夹</a> </div>
  </div>
</section>

<?php endif; ?> 
<?php if ($_SESSION['user_id'] > 0): ?> 

<script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script> 

<?php endif; ?> 
 



<?php endif; ?> 

<?php if ($this->_var['step'] == "consignee"): ?> 
 
<?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?> 
<script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
<body style="padding: 0px; margin: 0px auto;">
<div class="header headerHide">
    <img original="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg" src="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg">
    <h2>收货人信息 </h2>
    <a href="javascript:history.back();"></a>
    <a href="index.php" class="right"></a>
</div>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li  class="cur">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>
<div class="wrap"> 
   
  <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
  <section class="order_box padd1 radius10" style="padding-top:0;padding-bottom:0;">
    <div class="table_box2 table_box">
      <form style="padding:8px;" action="flow.php" method="post" name="theForm" id="theForm" onSubmit="return checkConsignee(this)">
        <?php echo $this->fetch('library/consignee.lbi'); ?>
      </form>
    </div>
  </section>
  <div class="blank3"></div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
  
</div>

<?php endif; ?> 


<?php if ($this->_var['step'] == "checkout"): ?>

  <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>



<script>
 onload = function() {  
 var sp = document.getElementsByName('shipping');
         
             for (i=0;i<sp.length;i++){
                 if (sp[i].checked){
                    oRadioValue = sp[i];
                   }
            }
             selectShipping(oRadioValue );   

   var py = document.getElementsByName('payment');
   for (i=0;i<py.length;i++){
             if (py[i].checked){
                oRadioValue = py[i];
               }
        }
         selectPayment(oRadioValue );   

var pack = document.getElementsByName('pack');
 for (i=0;i<pack.length;i++){
             if (pack[i].checked){
                oRadioValue = pack[i];
               }
        }
         selectPack(oRadioValue );   
var bonus = document.getElementsByName('bonus');
 for (i=0;i<bonus.length;i++){
             if (bonus[i].checked){
                oRadioValue = bonus[i];
               }
        }
         changeBonus(oRadioValue ); 



var card = document.getElementsByName('card');
 for (i=0;i<card.length;i++){
             if (card[i].checked){
                oRadioValue = card[i];
               }
        }
         selectCard(oRadioValue ); 
 
          }
</script>
<div class="header headerHide">
    <img original="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg" src="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg">
    <h2>确认订单</h2>
    <a href="javascript:history.back();"></a>
    <a href="index.php" class="right"></a>
</div>

<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li class="cur">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>


<div class="wrap">
  <form action="flow.php" method="post" name="theForm" id="theForm" onSubmit="return checkOrderForm(this)">
    <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
        </script>
    <section class="order_box padd1 radius10" style="padding-top:0">
      <div class="in">
        <div class="table_box table_box1">
          <dl>
            <dd class="w50">收 货 人： <span class="f1"><?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></span></dd>
            <dd class="w50 c999">
              <div class="ico_14"></div>
              <?php echo $this->_var['consignee']['tel']; ?> <a href="flow.php?step=consignee" class="modify radius5"><?php echo $this->_var['lang']['modify']; ?></a></dd>
          </dl>
          <dl>
            <dd class="w50 b_no" >收货地址: <?php echo $this->_var['province']; ?><?php echo $this->_var['city']; ?><?php echo $this->_var['district']; ?> <?php echo htmlspecialchars($this->_var['consignee']['address']); ?>; </dd>
          </dl>
        </div>
      </div>
    </div>
    <div class="blank3"></div>
    <section class="order_box padd1 radius10" style="padding-top:0.3rem;padding-bottom:0.3rem;">
      <div class="table_box table_box2"> 
        <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
               <dl>
          <dd class="dd1"><?php echo $this->_var['lang']['shipping_method']; ?> <span class="span1 radius5">必填</span></dd>
          
          <i></i>
        </dl>
		<div class="dl_box" id="shipping"  style="display:block">
		  <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
		  <p>
            <input name="shipping" type="radio" class="radio" id="shipping_<?php echo $this->_var['shipping']['shipping_id']; ?>" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" style="vertical-align:middle" /><label for="shipping_<?php echo $this->_var['shipping']['shipping_id']; ?>"> <?php echo $this->_var['shipping']['shipping_name']; ?> </label>
           </p>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
             <!--  <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
                <?php echo $this->_var['lang']['need_insure']; ?>-->
		</div>
        <?php else: ?>
        <input name="shipping"  type="radio" value = "-1" checked="checked"  />
        <?php endif; ?>
         <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>
        <dl>
          <dd class="dd1"><?php echo $this->_var['lang']['payment_method']; ?> <span class="span1 radius5">必填</span></dd>
         
          <i></i>
        </dl>
		<div class="dl_box" id="payment" style="display:inline-block;width: 100%;" >
		  <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
		  <p style="width:33%;float:left; background:#fff;">
           <input type="radio" class="radio" name="payment" id="payment_<?php echo $this->_var['payment']['pay_id']; ?>" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?> style="vertical-align:middle" /><label for="payment_<?php echo $this->_var['payment']['pay_id']; ?>"><?php echo $this->_var['payment']['pay_name']; ?> </label>
           </p>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
        <?php else: ?>
        <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?> 
       <!-- <dl class="b_no" style="line-height: 40px;">
          <dd class="dd1">是否开票</dd>
		  <span class="modRadio fr" style="margin-top: 10px;">
            <i class="fl"></i>
            <ins>否</ins>
         </span>
        </dl>-->
		<div class="dl_box" id="inviype_box" style="margin-bottom:0.5rem; display:none;">
            <?php if ($this->_var['inv_content_list']): ?>
                <dl style="line-height: 40px;">
                    <dd class="c333">发票类型</dd>
                    <dd>
                     <?php if ($this->_var['inv_type_list']): ?>
                    <?php echo $this->_var['lang']['invoice_type']; ?>
                    <select name="inv_type" id="ECS_INVTYPE"  onchange="changeNeedInv()" style="border:1px solid #ccc;">
                    <?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?></select>
                    <?php endif; ?>
                        </dd>
                      </dl>		
            
                <dl style="line-height: 40px;">
                    <dd class="c333">发票抬头</dd>
                    <dd><input name="inv_payee" type="text"  class="input" id="ECS_INVPAYEE" size="20" value="<?php echo $this->_var['order']['inv_payee']; ?>" onblur="changeNeedInv()" /></dd>
                </dl>	
                 <dl style="line-height: 40px;">
                    <dd class="c333">
                    发票内容
                    </dd>
                    <dd>
                   <select name="inv_content" id="ECS_INVCONTENT"  onchange="changeNeedInv()" style="border:1px solid #ccc;">

                <?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>
                   </select>
                     </dd> 
                </dl>	
            <?php endif; ?>
			  
		</div>	
      </div>
    </section>












  <div class="blank3"></div>


<section class="order_box padd1 radius10" style="padding-top:0.3rem;padding-bottom:0.3rem;">
<div class="table_box table_box2" style=" margin-bottom:0.5rem">
<dl>
          <dd class="dd1">留言备注 </dd>
          <dd class="dd2" >
	   		<input placeholder="请输入订单备注" class="flowaniutxt" name="inv_payee" type="text"   size="20"  style="background:#ebebeb;" />
	  </dd>
        
        </dl>
	
		</div>	
		</section>





  <div class="blank3"></div>




    <section class="order_box padd1 radius10" style="padding-top:0;padding-bottom:0;">
      <div class="table_box table_box3">
        <dl>
          <dd ><?php echo $this->_var['lang']['goods_list']; ?><?php if ($this->_var['allow_edit_cart']): ?><a href="flow.php" class="modify radius5"><?php echo $this->_var['lang']['modify']; ?></a><?php endif; ?></dd>
        </dl>
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <dl>
	<dd> 
	<div class="wrap">
  <form action="flow.php" method="post" name="formCart" id="formCart">
    <ul class="radius10 cartitemlist">
            <li class="new-tbl-type">
        <div class="itemlist_l new-tbl-cell"> 
           
          <a target="_blank" href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"> <img border="0" title="<?php echo $this->_var['goods']['goods_name']; ?>" src="http://www.7wg.com/<?php echo $this->_var['goods']['goods_img']; ?>" class="lazy"> </a> 
           
           
           
        </div>
        <div class="desc new-tbl-cell"> <a class="fragment" target="_blank" href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" style="color:#333">
          <p style="color:#F7236B;"><?php echo $this->_var['goods']['goods_name']; ?></p>
          </a>
          <div style="clear:both"> </div>
                    <p> <?php echo $this->_var['goods']['goods_attr']; ?> <?php echo $this->_var['goods']['goods_number']; ?>件  <?php echo $this->_var['goods']['formated_subtotal']; ?>
 </p>

                
                  
        </div>
      </li>
          </ul>
   
</div>  

	  
	 

         
            
          </dd>
	
        </dl>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        <?php echo $this->fetch('library/order_total.lbi'); ?> </div>
    </section>
    <div class="blank3"></div>
     <input type="hidden" name="zhekou" value="<?php echo $this->_var['zhekou']; ?>" /> 
    <input type="submit" name="submit" value="提交订单" class="c-btn3" />
    <input type="hidden" name="step" value="done" />
  </form>
</section>

<?php endif; ?> 

<?php if ($this->_var['step'] == "done"): ?> 

<style type="text/css">
/* 本例子css */
.pay_bottom{
	display: inline-block;
	min-width: 60px;
	height: 40px;
	padding: 0 15px;
	border: 0;
	background: #f40;
	text-align: center;
	text-decoration: none;
	line-height: 40px;
	color: #fff;
	font-size: 14px;
	font-weight: 700;
	-webkit-border-radius: 2px;
	background: -webkit-gradient(linear,0 0,0 100%,color-stop(0,#f50),color-stop(1,#f40));
	text-shadow: 0 -1px 1px #ca3511;
	-webkit-box-shadow: 0 -1px 0 #bf3210 inset;
}	
</style>



<div class="header headerHide">
    <img original="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg" src="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg">
    <h2>订单提交成功</h2>
    <a href="javascript:history.back();"></a>
    <a href="index.php" class="right"></a>
</div>






<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li>2.确认订单</li>
    <li class="cur">3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>

<section class="content">
  <div id="J_plugin_cart">
    
    <div class="bcont">
      <div id="J_allGoods">
        <div class="cont">
          <section class="order on">
            <h6 style="text-align:center;line-height:20px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></h6>
            <table width="90%" align="center" border="0" cellpadding="15" cellspacing="0" style="border:1px solid #ddd; margin:10px auto;" bgcolor="#FFFFFF">
              <tr>
                <td align="left" style="padding: 5px;line-height: 24px;"><?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?>: <strong><?php echo $this->_var['order']['shipping_name']; ?></strong><br><?php endif; ?><?php echo $this->_var['lang']['select_payment']; ?>: <strong><?php echo $this->_var['order']['pay_name']; ?></strong><br><?php echo $this->_var['lang']['order_amount']; ?>: <strong><?php echo $this->_var['total']['amount_formated']; ?></strong><br><?php echo $this->_var['order']['pay_desc']; ?></td>
              </tr>
              <?php if ($this->_var['pay_online']): ?> 
              
              <tr>
                <td align="center"><?php echo $this->_var['pay_online']; ?></td>
              </tr>
              <?php endif; ?>
            </table>
            <?php if ($this->_var['virtual_card']): ?>
            <div  style="text-align:center;overflow:hidden;border:1px solid #E2C822; background:#FFF9D7;margin:10px;padding:10px 50px 30px; margin:10px;"> 
              <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
              <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
              <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
              <ul style="list-style:none;padding:0;margin:0;clear:both">
                <?php if ($this->_var['card']['card_sn']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['card_password']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['end_date']): ?>
                <li style="float:left;"> <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?> </li>
                <?php endif; ?>
              </ul>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php endif; ?>
            <p style="text-align:center; margin-bottom:20px;"><?php echo $this->_var['order_submit_back']; ?></p>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>




<?php if ($this->_var['step'] == "ok"): ?> 

<style type="text/css">
/* 本例子css */
.pay_bottom{
  display: inline-block;
  min-width: 60px;
  height: 40px;
  padding: 0 15px;
  border: 0;
  background: #f40;
  text-align: center;
  text-decoration: none;
  line-height: 40px;
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  -webkit-border-radius: 2px;
  background: -webkit-gradient(linear,0 0,0 100%,color-stop(0,#f50),color-stop(1,#f40));
  text-shadow: 0 -1px 1px #ca3511;
  -webkit-box-shadow: 0 -1px 0 #bf3210 inset;
} 
</style>
<div class="header headerHide">
    <img original="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg" src="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg">
    <h2>返回</h2>
    <a href="javascript:history.back();"></a>
    <a href="index.php" class="right"></a>
</div>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li>2.确认订单</li>
    <li class="cur">3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>

<section class="content">
  <div id="J_plugin_cart">
    
    <div class="bcont">
      <div id="J_allGoods">
        <div class="cont">
          <section class="order on">
            <h6 style="text-align:center;line-height:20px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></h6>
            <table width="90%" align="center" border="0" cellpadding="15" cellspacing="0" style="border:1px solid #ddd; margin:10px auto;" bgcolor="#FFFFFF">
              <tr>
                <td align="left" style="padding: 5px;line-height: 24px;"><?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?>: <strong><?php echo $this->_var['order']['shipping_name']; ?></strong><br><?php endif; ?><?php echo $this->_var['lang']['select_payment']; ?>: <strong><?php echo $this->_var['order']['pay_name']; ?></strong><br><?php echo $this->_var['lang']['order_amount']; ?>: <strong><?php echo $this->_var['order']['order_amount_formated']; ?></strong><br><?php echo $this->_var['order']['pay_desc']; ?></td>
              </tr>
              <?php if ($this->_var['pay_online']): ?> 
              
              <tr>
                <td align="center"><?php echo $this->_var['pay_online']; ?></td>
              </tr>
              <?php endif; ?>
            </table>
            <?php if ($this->_var['virtual_card']): ?>
            <div  style="text-align:center;overflow:hidden;border:1px solid #E2C822; background:#FFF9D7;margin:10px;padding:10px 50px 30px; margin:10px;"> 
              <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
              <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
              <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
              <ul style="list-style:none;padding:0;margin:0;clear:both">
                <?php if ($this->_var['card']['card_sn']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['card_password']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['end_date']): ?>
                <li style="float:left;"> <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?> </li>
                <?php endif; ?>
              </ul>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php endif; ?>
            <p style="text-align:center; margin-bottom:20px;"><?php echo $this->_var['order_submit_back']; ?></p>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>  
<?php if ($this->_var['step'] == "login"): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js')); ?>

<style type="text/css">
body {background:white;}
.main {min-height:30rem;}
.inputBox {height:4rem; width:90%; margin:3% auto 0; font-size:1.3rem; border:1px #d7d7d7 solid; border-radius:0.3rem; background:white;}
.inputselectBox {width:90%; margin:2% auto 0; font-size:1.3rem;   background:white;}
.phoneCode label {display:inline-block; width:1.35rem; height:3.1rem; padding:0.9rem 1.6rem 0; border-right:1px #d7d7d7 solid; text-align:center;}
.phoneCode label img {width:1.35rem;}
.phoneCode input {padding:0 1rem; width:21rem; border:none; font-size:1.3rem;color:#d7d7d7; line-height:4rem;  height:4rem; vertical-align:top;}
.verification {border:none; color:#d7d7d7; background:#f5f5f5;}
.verification input {width:15rem; padding:0 1rem;font-size:1.3rem; line-height:3.8rem; height:3.8rem; border:1px #d1d1d1 solid; background:white; color:#d7d7d7; border-radius:0.3rem;}
.verification label {float:right; display:inline-block; width:8rem; padding:0 1rem;  background:#d1d1d1; font-weight:normal; line-height:4rem; font-size:1.3rem; color:white; border-radius:0.3rem; text-align:center;}
.passWord input {width:23rem; padding-left:1rem; line-height:4rem; border-radius:0.3rem; font-size:1.3rem; color:#d7d7d7;}
.passWord img {float:right; display:inline-block; width:10%; padding:1.3rem 1rem 0 0;}
.registersubmit {background:#E6117E; border:0;}
.registersubmit input {width:100%; height:90%; border-radius:0.3rem; font-size:1.6rem; color:white; background:#EF22A1; font-family:Microsoft Yahei;}
.lanDing p {width:90%; margin:2% auto 0;}
.lanDing p a {font-size:1.3rem; color:#666;}
.lanDing dl {width:90%; margin:2% auto 0;}
.lanDing dl dt{ padding:1.5rem 0; background:url(<?php echo $this->_var['ecsolve_path']; ?>/images/lineregister.png) repeat-x 0 center; text-align:center;}
.lanDing dl dt span {padding:0 0.5rem; font-size:1.4rem; color:#666; background:#f5f5f5;}
.lanDing dl dd a {display:inline-block; padding:0 8%; width:16%; font-size:1.1rem; line-height:2rem; color:#666;}
.lanDing {padding-bottom:3%;}


.hd {float:left; width:32rem; margin:0 auto; background: none repeat scroll 0 0 white;
    border-bottom: 1px solid #d7d7d7;
    border-top: 1px solid #d7d7d7;
    color: #333;
    font-size: 1.3rem;
    margin-top: 1rem;
width:100%;}
.hd ul { padding:0 1.5rem ; 
    }
.hd ul li{float: left;line-height: 3rem; margin-right: 2.5rem;}
.on {color: #fd19af;}
.hd ul li hr{background: none repeat scroll 0 0 #fd19af;
    border: 0 none;
    display: block;
    height: 0.2rem;}
.bottomFixCar {display:none;}
.bototmFixTop {display:none;}

</style>
<div class="header headerHide">
    <img original="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg" src="<?php echo $this->_var['ecsolve_path']; ?>/images/allwaplist.jpg">
    <h2>登录/注册</h2>
    <a href="javascript:history.back();"></a>
    <a href="index.php" class="right"></a>
</div>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li class="cur">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank2"></div>
<section class="wrap"> <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,user.js')); ?> 
  <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        
  </script> 
  
  <div id="leftTabBox" class="loginBox">
<div class="hd">
      <ul>
         <li<?php if ($this->_var['action'] == 'login'): ?> class="on"<?php endif; ?>><a>登录</a></li>
         <li<?php if ($this->_var['action'] == 'register'): ?> class="on"<?php endif; ?>><a>注册</a></li>
      </ul>
    </div>
    <div class="bd" id="tabBox1-bd" <?php if ($this->_var['action'] == 'register'): ?> style="display:none"<?php endif; ?>>
      <ul>
      <div class="table_box">
          <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
            <dl style="padding:0px;">
              <dd>
                </dd>
            </dl>
            <dl>
	    <dl>
              <dd>
                 <div class="u_sright inputBox phoneCode"><label><img original="<?php echo $this->_var['ecsolve_path']; ?>/images/username.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/username.png"></label><input type="text" placeholder="<?php echo $this->_var['lang']['username']; ?>/<?php echo $this->_var['lang']['mobile']; ?>/<?php echo $this->_var['lang']['email']; ?>" name="username" ></div>
              </dd>
            </dl>
            <dl>
              <dd>
                <div class="u_sright inputBox passWord clearfix"><input name="password"  placeholder="<?php echo $this->_var['lang']['label_password']; ?>" type="password"><img original="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png"></div>
              </dd>
            </dl>
            <dl>
              <dd>
                <input type="checkbox" value="1" name="remember" id="remember" style="vertical-align:middle; " /><label for="remember"> 一个月内免登录</label>
              </dd>
            </dl>
            <dl>
              <dd>
                 <input type="submit" name="login" class="c-btn3" value="<?php echo $this->_var['lang']['forthwith_login']; ?>" />
                 <?php if ($this->_var['anonymous_buy'] == 1): ?>
                <br/>
                 <input type="button" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" class="c-btn3" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                 <?php endif; ?>
                 <input name="act" type="hidden" value="signin" />
              </dd>
            </dl>
          </form>
          
          <div class="hezuo">
            <p class="t">使用合作账号登录</p>
            <p class="b"><a href="user.php?act=oath&type=qq"><img src="<?php echo $this->_var['ecsolve_path']; ?>/images/quicklogin/qq.png"></a></p>
          </div>
        </div>
      </ul>
      </div>
        <div class="bd"<?php if ($this->_var['action'] == 'login'): ?> style="display:none"<?php endif; ?>>
          <ul >
      	<?php if ($this->_var['enabled_sms_signin'] == 1): ?>
        <form action="user.php" method="post" name="formUser" onsubmit="return register2();">
          <input type="hidden" name="flag" id="flag" value="register" />
          <div class="table_box">
            <dl>
              <dd>
                <input placeholder="请输入手机号码" class="inputBg" name="mobile" id="mobile_phone" type="text" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="请输入帐号密码" class="inputBg" name="password" id="mobile_pwd" type="password" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="请输入验证码" class="inputBg" name="mobile_code" id="mobile_code" type="text" />
              </dd>
              <dd>
              <input id="zphone" name="sendsms" type="button" value="获取手机验证码" onClick="sendSms();" class="c-btn3" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input id="agreement" name="agreement" type="checkbox" value="1" checked="checked" style="vertical-align:middle; " /><label for="agreement"> 我已看过并同意《<a href="article.php?cat_id=-1">用户协议</a>》</label>
              </dd>
            </dl>
            <dl>
              <dd>
                <input name="act" type="hidden" value="act_register" />
                <input name="enabled_sms" type="hidden" value="1" />
                <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                <input name="Submit" type="submit" value="下一步" class="c-btn3" />
              </dd>
            </dl>
          </div>
        </form>
        <?php else: ?>
        <form action="user.php" method="post" name="formUser" onsubmit="return register();">
          <input type="hidden" name="flag" id="flag" value="register" />
          <div class="table_box">
          <dl style="padding:0px;">
              <dd>
             
              </dd>
            </dl>
	     <dl>
              <dd>
               <div class="u_sright inputBox phoneCode">
	       <label><img original="<?php echo $this->_var['ecsolve_path']; ?>/images/username.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/username.png"></label>

 <input type="text" placeholder="<?php echo $this->_var['lang']['username']; ?>" name="username"  ></div>
              </dd>
            </dl>
            
            <dl>
              <dd>
         <div class="u_sright inputBox passWord clearfix">
<input name="password" id="password1"  placeholder="请输入登录密码" type="password">
<img original="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png"></div>

              </dd>
            </dl>
            <dl>
              <dd>
              <div class="u_sright inputBox passWord clearfix">
<input name="confirm_password" id="confirm_password" type="password"   placeholder="请重新输入一遍密码" >
<img original="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png"></div>
              </dd>
            </dl>
            <?php if ($this->_var['enabled_captcha']): ?>
            <dl>
              <dd>
                <input placeholder="请输入验证码" class="inputBg" name="captcha" id="captcha" type="text" />
              </dd>
              <dd>
              <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="height:34px;vertical-align: middle; margin-left:5px;" onClick="this.src='captcha.php?'+Math.random()" />
              </dd>
            </dl>
            <?php endif; ?>
            <dl>
              <dd>
                <input id="agreement" name="agreement" type="checkbox" value="1" checked="checked" style="vertical-align:middle; " /><label for="agreement"> 我已看过并同意《<a href="article.php?cat_id=-1">用户协议</a>》</label>
              </dd>
            </dl>
            <dl>
              <dd>
                <input name="act" type="hidden" value="act_register" />
                <input name="enabled_sms" type="hidden" value="0" />
                <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                <input name="Submit" type="submit" value="下一步" class="c-btn3" />
              </dd>
            </dl>
          </div>
        </form>
        <?php endif; ?>
        <?php if ($this->_var['need_rechoose_gift']): ?>
        <?php echo $this->_var['lang']['gift_remainder']; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo $this->_var['ecsolve_path']; ?>/js/sms.js"></script>
</section>

<script type="text/javascript">
jQuery(function($){
	$('.hd ul li').click(function(){
		var index = $('.hd ul li').index(this);
		$(this).addClass('on').siblings('li').removeClass('on');
		$('.loginBox .bd:eq('+index+')').show().siblings('.bd').hide();
	})
})
</script>
 
<?php endif; ?>

  <?php echo $this->fetch('library/page_footer2.lbi'); ?>

<div class="blank3"></div>

<div style="width:1px; height:1px; overflow:hidden"><?php $_from = $this->_var['lang']['p_y']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pv');if (count($_from)):
    foreach ($_from AS $this->_var['pv']):
?><?php echo $this->_var['pv']; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
    
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
</html>
