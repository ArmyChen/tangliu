<style>
.footer {width:32rem;}
.footer p {padding:0 3%; line-height:3rem; color:#666; font-size:1.3rem; text-align:center;}
.footer p:first-child {border-bottom:1px #b6b6b6 dashed;}
.footer a {display:inline-block; padding:0 2%; color:#666; font-size:1.3rem;}
.footer .xuan a {width:6rem; font-size:1.4rem; text-align:center; color:#b6b6b6;}
.footer .xuan .current {color:#333;}
.footer .icp {font-size:1.1rem; text-align:center; line-height:2rem; padding-bottom:1rem;}

.bottomFixCar {position:fixed; margin-left:50%; left:-15rem; bottom:2.5rem; width:3.5rem;}
.bototmFixTop {position:fixed;  margin-right:50%; right:-15rem; bottom:2.5rem; width:3.5rem;}



</style>


<div class="footer" >

</div>



<script src="<?php echo $this->_var['ecsolve_path']; ?>/jsct/analytics.js" async=""></script>
<script type="text/javascript" src="<?php echo $this->_var['ecsolve_path']; ?>/jsct/common.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ecsolve_path']; ?>/jsct/public.js"></script>


<script type="text/javascript">

//顶部固定
$(window).scroll(function(){
	var tuwengao = $('.navHeight').offset().top;
	var tuwenscrollt =  $(window).scrollTop();
	//var tuwenshow =  tuwenscrollt - tuwengao;
	if ( tuwenscrollt >= tuwengao ) { 
		$('.navHeightWap').addClass('navWrapHide');
	}else{
		$('.navHeightWap').removeClass('navWrapHide');
		}
});

$('.jhxx').click(function(){
	$('.jhdown').hide();
	});


//搜索框显隐
$('.headerClose').click(function(){
	$('.header .search').hide();
});
$('.headerOpen').click(function(){
	$('.header .search').show();
	$('.header .search .text').focus();
});



</script>


</div>

