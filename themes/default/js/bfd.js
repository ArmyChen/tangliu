//百分点js

//放入购物车
function Bfd_Add_Cart(bfd_info){
	var client = new brs.Client("Caizhigu");    
	var bfd_session_id = brs.getSid();
	var p = new brs.PackedRequest();
	if (typeof(bfd_info.user_id) == 'undefined' || bfd_info.user_id == '' || bfd_info.user_id == '0' || bfd_info.user_id == null){
		bfd_info.user_id = bfd_session_id;
	}
	if (bfd_info.items.length > 0){
		for(var i=0; i<bfd_info.items.length; i++) {
			p["sc"+i] = new brs.AddShopCart(bfd_info.user_id,bfd_info.items[i],bfd_session_id);
		}
		client.invoke(p);
	}
}