<!DOCTYPE html>
<html style="font-size: 20px;"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录注册</title>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link href="<?php echo $this->_var['ecsolve_path']; ?>/style/public.css" rel="stylesheet" type="text/css">
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js')); ?>
<script type="text/javascript" src="<?php echo $this->_var['ecsolve_path']; ?>/mobjs/common.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ecsolve_path']; ?>/mobjs/utils.js"></script>
<style type="text/css">
body {background:white;}
.main {min-height:30rem;}


.footer {width:32rem; margin:0 auto;}
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
    display: none;
    height: 0.2rem;}
.bottomFixCar {display:none;}
.bototmFixTop {display:none;}
.navHeight {height:4rem;}
</style>





<div id="wrap">
    

<div class="navHeight">	
    <div class="navHeightWap">	
        <div class="header">
          
            
             <h2>登录/注册</h2>
    <a href="javascript:history.back();"></a>
          <a href="index.php" class="right"></a>
        </div>

      

    </div>
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
                <div class="u_sright inputBox passWord clearfix"><input name="password"  placeholder="<?php echo $this->_var['lang']['label_password']; ?>" type="password"><img original="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" style="display:none;"></div>
              </dd>
            </dl>
            <dl>
              <dd><div style="width:90%;height:3rem;margin:4% auto;    line-height: 3rem;">
               <label> <input type="checkbox" value="1" name="remember" id="remember" style="vertical-align:middle;" /></label>
		<label for="remember"> 一个月内免登录</label>
		</div>
              </dd>
            </dl>
            <dl>
              <dd>
                 <input type="submit" name="login" class="c-btn3" value="登陆" />
                 <?php if ($this->_var['anonymous_buy'] == 1): ?>
                <br/>
                 <input type="button" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" class="c-btn3" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                 <?php endif; ?>
                 <input name="act" type="hidden" value="signin" />
              </dd>
            </dl>
          </form>
          
          <!--<div class="hezuo">
            <p class="t">使用合作账号登录</p>
            <p class="b"><a href="user.php?act=oath&type=qq"><img src="<?php echo $this->_var['ecsolve_path']; ?>/images/quicklogin/qq.png"></a> </p>
          </div>-->
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
                <input id="agreement" name="agreement" type="checkbox" value="1" checked="checked" style="vertical-align:middle ;" /><label for="agreement"> 我已看过并同意《<a href="article.php?cat_id=-1">用户协议</a>》</label>
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
<img original="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" style="display:none;"></div>

              </dd>
            </dl>
            <dl>
              <dd>
              <div class="u_sright inputBox passWord clearfix">
<input name="confirm_password" id="confirm_password" type="password"   placeholder="请重新输入一遍密码" >
<img original="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" src="<?php echo $this->_var['ecsolve_path']; ?>/images/eyepassword.png" style="display:none;"></div>
              </dd>
            </dl>
           
            <dl>
              <dd>
	      <div style="width:90%;height:3rem;margin:4% auto;    line-height: 3rem;">
                <input id="agreement" name="agreement" type="checkbox" value="1" checked="checked" style="vertical-align:middle; " /><label for="agreement"> 我已看过并同意《<a href="article.php?cat_id=-1">用户协议</a>》</label>
		</div>
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


  <?php echo $this->fetch('library/page_footer2.lbi'); ?>
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
 

                       </body></html>






