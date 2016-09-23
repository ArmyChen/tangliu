window.bfd_onload = function(){
	var p = new brs.PackedRequest();
	var bfd_session_id = brs.getSid();	
	if (typeof(bfd_user_id) == 'undefined' || bfd_user_id == '' || bfd_user_id == '0' || bfd_user_id == null){
		bfd_user_id = bfd_session_id;	
	}
	var bfd_obj = {};
	var bfd_category = [];
	for(var i=0;i<bfd_item_category.length;i++){
		if(!bfd_obj[bfd_item_category[i]]){
			if(bfd_item_category[i]!=''){
				bfd_category.push(bfd_item_category[i]);
			}
			bfd_obj[bfd_item_category[i]]=1;
		}
	}
	if(bfd_del_item == "0"){ //如果客户给提供下架条件这里请填写下架条件 比如bfd_del_item==1
		p.r = new brs.RemoveItem(bfd_item_id);
	}
	else {
		var url	 = self.location.href;
		if(isFromRecommend(url)){
			var req_id = getReqId(url);
			p.cr = new brs.ClickRecItem(bfd_user_id, bfd_item_id, bfd_session_id, req_id);
		}else{
			p.a = new brs.AddItem(bfd_item_id, bfd_item_name, bfd_item_link);
			p.a.image_link = bfd_image_link;
			p.a.price = bfd_item_price;
			p.a.category = bfd_category;
			p.v = new brs.VisitItem(bfd_user_id, bfd_item_id, bfd_session_id);
		}
	}
	//p.recBAB = new brs.RecByBoughtAlsoBought(new Array(bfd_item_id), bfd_session_id, 12);
	p.recBAB = new brs.RecByViewAlsoView(new Array(bfd_item_id), bfd_session_id, 12);
	client.invoke(p, "cb_recommend");	
}
function cb_recommend(json) {
	var result_BAB = json.recBAB;
	var code_BAB = result_BAB[0];
	if(code_BAB == 0){
		var req_id_BAB = result_BAB[1];
		var item_info_BAB = result_BAB[2];		
		if (item_info_BAB instanceof Array){
			window.brs.onGetGoodsInfo(item_info_BAB, req_id_BAB);	
		}
	}
}
function getReqId(url){
	var str = "req_id=";
	var idx = url.indexOf(str);
	var reqid = url.slice(idx + str.length);
    var re = /[a-zA-Z0-9]+/;
	return reqid.match(re);
}
function isFromRecommend(url){
	if(url.indexOf("req_id=") == -1){
		return false;
	}else{
		return true;
	}
}
