function addfav(url,title){var fav_url = url;var fav_title = title;if (document.all && window.external){window.external.AddFavorite(fav_url,fav_title);}else if (window.sidebar){window.sidebar.addPanel(fav_title,fav_url,"");}else{alert('Webkit内核浏览器, 请按"Ctrl+D"收藏, 谢谢!');}	}
function cont(){ window.open('contactus.html#booth','_self');}
function delc(){  return confirm("不可恢复, 真的要删除? Sure to delete?");}
function tabs(tabPreName,pagePrefix,totalPageNum,currentPageNo){
	for( var i = 0; i < totalPageNum; i++){
		document.getElementById(tabPreName+i).className ='b';//按钮背景
		document.getElementById(pagePrefix+i).style.display="none";//切换的页面
	}
	document.getElementById(tabPreName+currentPageNo).className ='h';//按钮背景
	document.getElementById(pagePrefix+currentPageNo).style.display="block";//切换的页面
}