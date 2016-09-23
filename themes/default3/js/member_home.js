;
$(function(){
    var INFO_TYPE = ['goods_info'];
    function _ajax_load(type) {
        $.ajax({
           url: SHOP_SITE_URL+"/index.php?act=member&op=ajax_load_"+type,
           success: function(html){
               INFO_TYPE.shift();
               if (INFO_TYPE[0]) {
                   _ajax_load(INFO_TYPE[0]);
               }
               $('#member_center_box').append(html);
           }
        });
    };

    var error_msg = {
        "i" : "<i class=\"icon_err\"></i>",
        "state_error" : "服务器繁忙"
    }

    var msg_log = {
        "show_ec" : function(msg){
            showDialog(msg, 'error', '', '', '1', '', '', '', '', '', '2');
        },
        "alert" : function(msg){
            alert(msg);
        },
        "console" : function(msg){
            console.log(msg);
        }
    }

    function _ajax_count() {
        $.ajax({
            dataType: "json", 
            url: SHOP_SITE_URL+"/index.php?act=member&op=ajax_load_count",
            success: function(data){  
                if (data.state == "1") {              
                     $('#use_saveamt_num').html(data.use_saveamt_num);
                     $('#voucher_count').html(data.voucher_count);
                     $('#order_nopay_count').html("("+data.order_nopay_count+")");
                     $('#order_noreceipt_count').html("("+data.order_noreceipt_count+")");
                     $('#order_noeval_count').html("("+data.order_noeval_count+")");
                } else if(data.state == '-10'){
                    
                } else {      
                    msg_log.show_ec(error_msg.state_error);        
                }
           }
        });
    };
    
    _ajax_count();
    _ajax_load(INFO_TYPE[0]);

});

