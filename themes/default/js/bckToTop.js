/*publish time:2011-08-25 11:06:55*/
TMall=TMall||{};
TMall.BackTop=function(){
	function C(){
		this.start=0;
		this.step=100;
		this.updateValue=function(K,N,L,M){
			//平滑滚动
//			E.scrollTo(0,-L*(K/=M)*(K-2)+N)
			//直接到头部
			E.scrollTo(0)
		};
		this.getValue=function(){
			return E.pageYOffset||G.body.scrollTop||G.documentElement.scrollTop
		}
	}
	function H(K){
		if(!(this instanceof H)){
			return new H(K)
		}
		this.config={};
		this.scrollBtn=null;this._init(K)
	}
	var I=KISSY,J=I.DOM,F=I.Event,G=document,E=window,B=I.UA.ie==6,D="hidden",A={triggerId:"J_ScrollTopBtn",triggerClass:"backToTop",style:"",bottom:50,right:10,baseLine:400};
	C.prototype.scrollTop=function(K){
		var Q=this,L=Q.getValue(),M=null,P=Q.start,N=0,O=parseInt(L/100);//L滚动条滚动的高
		if(K!==L){
			N=K-L;
			M=setInterval(function(){
				if(P<=O){Q.updateValue(P,L,N,O);P++}
				else{clearInterval(M)}
			},5)
		}
	};
	I.augment(H,{
		_init:function(K){
		var L=this;
		L.config=I.merge(K,A);
		I.ready(function(M){
			L.createEl();
			L.scrollBtn=M.get("#"+L.config.triggerId);
			L.addEvent()
		})
	},
	createEl:function(){
		var K=this.config,
		
		//创建返回顶部
		L=J.create("<a>",{css:{display:"none",textIndent:"-9999px",position:B?"absolute":"fixed",bottom:K.bottom,right:K.right-10,height:"58px",width:"58px",outline:"none",opacity:"0",overflow:"hidden",background:"#000 url('/themes/aizhigu/images/top.gif') no-repeat"},id:K.triggerId,"class":K.triggerClass+" hidden",text:"",href:"javascript:void(0)", onclick:"location.href='#';"});
		//创建购物车
		
		//创建在线客服
		KF = J.create("<div>",{css:{position:"fixed",bottom:180,right:K.right},id:'BDBridgeFixedWrap'});
		
		K.style||J.attr(L,"style",J.attr(L,"style")+K.style);
		J.addStyleSheet(".vhidden{visibility:hidden}");
		J.append(L,"body");
//		J.append(CI,"body");
//		J.append(KF,"body");
	},
	addEvent:function(){
		var N=this.config,L=I.get("#"+N.triggerId),M=parseInt(N.baseLine);
		if(L){
			(new I.Anim(L,{opacity:1},0.3)).run();
			F.on(E,"scroll",K);
			F.on(L,"click",function(O){
				O.halt();
				(new C(G.documentElement)).scrollTop(0)
			});
			F.on(L,"mouseover",function(){
				var P=J.hasClass(L,D),
				O=parseInt(J.scrollTop(G));
				if(O>M){
					(new I.Anim(L,{opacity:1},0.3)).run()
				}
			});
			F.on(L,"mouseout",function(){
				var P=J.hasClass(L,D),
				O=parseInt(J.scrollTop(G));
				if(O>M){
					(new I.Anim(L,{opacity:0.25},0.3)).run()
				}
			})
		}
		function K(){
			var P=J.hasClass(L,D),
			O=parseInt(J.scrollTop(G));
			if(O>M){
				/*首页右侧购物车客服ico*/
//				ci = new $('#cart_ico').Anim({opacity:0.25},0.3);
				$('#cart_ico').show();
				$('#J_ScrollTopBtn').show();
				ci = new I.Anim(CI,{opacity:0.25},0.3);
				ci.run();
				
				P=new I.Anim(L,{opacity:0.25},0.3);
				P.run();
				J.removeClass(L,D)
			}else{
				if(O<M){
					/*首页右侧购物车客服ico*/
					$('#cart_ico').hide();
					$('#J_ScrollTopBtn').hide();
					ci = new I.Anim(CI,{opacity:0},0.3);
					ci.run();
					
					P=new I.Anim(L,{opacity:0},0.3);
					P.run();
					J.addClass(L,D)
				}
			}
			if(B){
				P=J.viewportHeight(G);
				O=O+P-N.bottom-J.height(L);
				J.css(L,"top",O)
			}
		}
	}});
	H.init=function(K){
		H(K)
	};
	return H
}();