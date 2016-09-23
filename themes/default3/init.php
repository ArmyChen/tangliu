<?php

function get_advlist_by_id($id)
{
	switch($id)
	{
		case 1:
		return get_advlist('首页-顶部通栏广告', 1);
		break;
		case 2:
		return get_advlist('首页-当季佳品广告', 8);
		break;
		case 3:
		return get_advlist('首页-品牌活动广告', 5);
		break;
		case 4:
		return get_advlist('首页-套餐优惠广告', 5);
		break;
		case 5:
		return get_advlist('首页-最新宝贝广告', 5);
		break;
		case 6:
		return get_advlist('首页-最新品牌广告', 5);
		break;
		case 7:
		return get_advlist('商品页-优惠提示-代码广告', 1);
		break;
		case 8:
		return get_advlist('品牌页-热销品牌', 20);
		break;
		case 9:
		return get_advlist('积分商城页-活动广告', 50);
		case 10:
		return get_advs('特价卖场页-右侧文字广告', 1);
		break;
		case 11:
		return get_advs('天天秒杀页-右侧文字广告', 1);
		break;
		case 12:
		return get_advs('商品页-促销文字广告', 1);
		break;

	}
	
}

function get_flashad_by_index($id)
{
	return get_advlist('首页-flash-右侧广告' . $id, 3);
}

function get_hot_cat_navad()
{
	return get_advlist('首页-导航菜单-热门推荐-热门标签', 40);
}

function get_navad1_by_cat_id($id)
{
	return get_advlist('首页-导航菜单-分类ID' . $id . '-热门标签', 40);
}

function get_navad2_by_cat_id($id)
{
	return get_advlist('首页-导航菜单-分类ID' . $id . '-活动套餐', 40);
}

function get_left_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-图片广告', 7);
}

function get_txt_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-文字广告', 9);
}

function get_brand_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-品牌广告', 10);
}

function get_channel_flash_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-轮播广告', 3);
}
function get_channel_right_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-右侧广告', 2);
}

function get_channel_best_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-精选广告', 6);
}
//1楼
function get_channel_floor1_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-1楼广告', 3);
}

function get_channel_floor1_cat_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-1楼分类', 3);
}

function get_channel_floor1_tit_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-1楼名称', 1);
}
//2楼
function get_channel_floor2_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-2楼广告', 3);
}

function get_channel_floor2_cat_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-2楼分类', 3);
}

function get_channel_floor2_tit_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-2楼名称', 1);
}
//3楼
function get_channel_floor3_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-3楼广告', 3);
}

function get_channel_floor3_cat_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-3楼分类', 3);
}

function get_channel_floor3_tit_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-3楼名称', 1);
}


function get_article_cat_5($id)
{
	return get_article_cat($id, 5);
}

function get_cat_arts_2($id)
{
	return get_cat_arts($id, 2);
}

function get_cat_arts_3($id)
{
	return get_cat_arts($id, 3);
}

function get_cat_arts_4($id)
{
	return get_cat_arts($id, 4);
}

function get_cat_arts_5($id)
{
	return get_cat_arts($id, 5);
}

function get_cat_arts_6($id)
{
	return get_cat_arts($id, 6);
}

function get_cat_arts_7($id)
{
	return get_cat_arts($id, 7);
}

function get_cat_arts_8($id)
{
	return get_cat_arts($id, 8);
}

function get_cat_arts_10($id)
{
	return get_cat_arts($id, 10);
}

function get_cat_arts_16($id)
{
	return get_cat_arts($id, 16);
}

function get_cat_top_arts_1($id)
{
	return get_cat_top_arts($id, 1);
}

function get_cat_new_goods($id)
{
	return get_cat_recommend_goods('new', $id, 4);
}

function get_cat_new_goods_5($id)
{
	return get_cat_recommend_goods('new', $id, 5);
}

function get_cat_new_goods_6($id)
{
	return get_cat_recommend_goods('new', $id, 6);
}

function get_cat_new_goods_10($id)
{
	return get_cat_recommend_goods('new', $id, 10);
}

function get_cat_new_goods_12($id)
{
	return get_cat_recommend_goods('new', $id, 12);
}

function get_cat_new_goods_20($id)
{
	return get_cat_recommend_goods('new', $id, 20);
}

function get_cat_new_goods_8($id)
{
	return get_cat_recommend_goods('new', $id, 8);
}

function get_cat_promote_goods_5($id)
{
	return get_cat_recommend_goods('promote', $id, 5);
}

function get_cat_promote_goods_100($id)
{
	return get_cat_recommend_goods('promote', $id, 100);
}

function get_cat_best_goods($id)
{
	return get_cat_recommend_goods('best', $id, 18);
}

function get_cat_best_goods_5($id)
{
	return get_cat_recommend_goods('best', $id, 5);
}

function get_cat_best_goods_6($id)
{
	return get_cat_recommend_goods('best', $id, 10);
}

function get_cat_best_goods_8($id)
{
	return get_cat_recommend_goods('best', $id, 8);
}

function get_cat_hot_goods($id)
{
	return get_cat_recommend_goods('hot', $id, 5);
}

function get_cat_hot_goods_3($id)
{
	return get_cat_recommend_goods('hot', $id, 3);
}

function get_cat_hot_goods_5($id)
{
	return get_cat_recommend_goods('hot', $id, 5);
}

function get_cat_hot_goods_6($id)
{
	return get_cat_recommend_goods('hot', $id, 6);
}

function get_cat_hot_goods_8($id)
{
	return get_cat_recommend_goods('hot', $id, 8);
}

function get_cat_hot_goods_9($id)
{
	return get_cat_recommend_goods('hot', $id, 9);
}

function get_cat_hot_goods_10($id)
{
	return get_cat_recommend_goods('hot', $id, 10);
}

function get_new_comment_8($type)
{
	return get_new_comment($type, 8);
}

function get_rand_comment_8($type)
{
	return get_rand_comment($type, 8);
}

function get_rand_comment_img_1($type)
{
	return get_rand_comment_img($type, 1);
}

function insert_article_content_23()
{
	return insert_article_content(23);
}

function insert_article_content_24()
{
	return insert_article_content(24);
}

function insert_comment_list($arr)
{
    $need_cache = $GLOBALS['smarty']->caching;
    $need_compile = $GLOBALS['smarty']->force_compile;

    $GLOBALS['smarty']->caching = false;
    $GLOBALS['smarty']->force_compile = true;

    /* 验证码相关设置 */
    if ((intval($GLOBALS['_CFG']['captcha']) & CAPTCHA_COMMENT) && gd_version() > 0)
    {
        $GLOBALS['smarty']->assign('enabled_captcha', 1);
        $GLOBALS['smarty']->assign('rand', mt_rand());
    }
    $GLOBALS['smarty']->assign('username',     stripslashes($_SESSION['user_name']));
    $GLOBALS['smarty']->assign('email',        $_SESSION['email']);
    $GLOBALS['smarty']->assign('comment_type', $arr['type']);
    $GLOBALS['smarty']->assign('id',           $arr['id']);
    $cmt = assign_comment_list($arr['id'],          $arr['type']);
    $GLOBALS['smarty']->assign('comments',     $cmt['comments']);
    $GLOBALS['smarty']->assign('pager',        $cmt['pager']);


    $val = $GLOBALS['smarty']->fetch('library/comments_list.lbi');

    $GLOBALS['smarty']->caching = $need_cache;
    $GLOBALS['smarty']->force_compile = $need_compile;

    return $val;
}

function assign_comment_list($id, $type, $page = 1)
{
    /* 取得评论列表 */
    $count = $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('comment').
           " WHERE id_value = '$id' AND comment_type = '$type' AND status = 1 AND parent_id = 0");
    $size  = !empty($GLOBALS['_CFG']['comments_number']) ? $GLOBALS['_CFG']['comments_number'] : 5;

    $page_count = ($count > 0) ? intval(ceil($count / $size)) : 1;

    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('comment') .
            " WHERE id_value = '$id' AND comment_type = '$type' AND status = 1 AND parent_id = 0".
            ' ORDER BY comment_id DESC';
    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page-1) * $size);

    $arr = array();
    $ids = '';
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $ids .= $ids ? ",$row[comment_id]" : $row['comment_id'];
        $arr[$row['comment_id']]['id']       = $row['comment_id'];
        $arr[$row['comment_id']]['email']    = $row['email'];
        $arr[$row['comment_id']]['username'] = $row['user_name'];
        $arr[$row['comment_id']]['content']  = str_replace('\r\n', '<br />', htmlspecialchars($row['content']));
        $arr[$row['comment_id']]['content']  = nl2br(str_replace('\n', '<br />', $arr[$row['comment_id']]['content']));
        $arr[$row['comment_id']]['rank']     = $row['comment_rank'];
		$arr[$row['comment_id']]['img']     = $row['img'];
        $arr[$row['comment_id']]['add_time'] = local_date($GLOBALS['_CFG']['time_format'], $row['add_time']);
    }
    /* 取得已有回复的评论 */
    if ($ids)
    {
        $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('comment') .
                " WHERE parent_id IN( $ids )";
        $res = $GLOBALS['db']->query($sql);
        while ($row = $GLOBALS['db']->fetch_array($res))
        {
            $arr[$row['parent_id']]['re_content']  = nl2br(str_replace('\n', '<br />', htmlspecialchars($row['content'])));
            $arr[$row['parent_id']]['re_add_time'] = local_date($GLOBALS['_CFG']['time_format'], $row['add_time']);
            $arr[$row['parent_id']]['re_email']    = $row['email'];
            $arr[$row['parent_id']]['re_username'] = $row['user_name'];
        }
    }
    /* 分页样式 */
    //$pager['styleid'] = isset($GLOBALS['_CFG']['page_style'])? intval($GLOBALS['_CFG']['page_style']) : 0;
    $pager['page']         = $page;
    $pager['size']         = $size;
    $pager['record_count'] = $count;
    $pager['page_count']   = $page_count;
    $pager['page_first']   = "javascript:gotoPage(1,$id,$type)";
    $pager['page_prev']    = $page > 1 ? "javascript:gotoPage(" .($page-1). ",$id,$type)" : 'javascript:;';
    $pager['page_next']    = $page < $page_count ? 'javascript:gotoPage(' .($page + 1) . ",$id,$type)" : 'javascript:;';
    $pager['page_last']    = $page < $page_count ? 'javascript:gotoPage(' .$page_count. ",$id,$type)"  : 'javascript:;';

    $cmt = array('comments' => $arr, 'pager' => $pager);

    return $cmt;
}

function insert_comments_rank($arr)
{

    /* 取得评论列表 */

    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('comment') .
            " WHERE id_value = ".$arr['id']." AND comment_type = 0 AND status = 1 AND parent_id = 0".
            ' ORDER BY comment_id DESC';
    $res = $GLOBALS['db']->getAll($sql);

    $count5 = 0;
	$count4 = 0;
	$count3 = 0;
	$count2 = 0;
	$count1 = 0;
	if (!empty($res))
    {

        foreach($res as $row)
        {
            $rank = $row['comment_rank'];
			switch($rank)
			{
				case 5:
				$count5 ++;
				break;
				case 4:
				$count4 ++;
				break;
				case 3:
				$count3 ++;
				break;
				case 2:
				$count2 ++;
				break;
				case 1:
				$count1 ++;
				break;
			}
        }
        
    }


    $str = $count5.'-'.$count4.'-'.$count3.'-'.$count2.'-'.$count1;
    return $str;
}

function get_cat_rec_3()
{
    $cat_rec = array();
	$sql = "SELECT c.cat_id, c.cat_name, cr.recommend_type FROM " . $GLOBALS['ecs']->table("cat_recommend") . " AS cr INNER JOIN " . $GLOBALS['ecs']->table("category") . " AS c ON cr.cat_id=c.cat_id";
	$cat_recommend_res = $GLOBALS['db']->getAll($sql);
    if (!empty($cat_recommend_res))
    {
        $cat_rec_array = array();
        foreach($cat_recommend_res as $cat_recommend_data)
        {
            $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
        }
        return $cat_rec[3];
    }

}

function get_cat_rec_1()
{
    $cat_rec = array();
	$sql = "SELECT c.cat_id, c.cat_name, cr.recommend_type FROM " . $GLOBALS['ecs']->table("cat_recommend") . " AS cr INNER JOIN " . $GLOBALS['ecs']->table("category") . " AS c ON cr.cat_id=c.cat_id";
	$cat_recommend_res = $GLOBALS['db']->getAll($sql);
    if (!empty($cat_recommend_res))
    {
        $cat_rec_array = array();
        foreach($cat_recommend_res as $cat_recommend_data)
        {
            $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
        }
        return $cat_rec[1];
    }

}

function group_buy_list_ex($size, $page=1)
{
    /* 取得团购活动 */
    $gb_list = array();
    $now = gmtime();
    $sql = "SELECT b.*, IFNULL(g.goods_thumb, '') AS goods_thumb,g.goods_name, g.market_price, g.shop_price, b.act_id AS group_buy_id, ".
                "b.start_time AS start_date, b.end_time AS end_date " .
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS b " .
                "LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ON b.goods_id = g.goods_id " .
            "WHERE b.act_type = '" . GAT_GROUP_BUY . "' " .
            "AND b.start_time <= '$now' AND b.is_finished < 3 ORDER BY b.act_id DESC";
    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);
    while ($group_buy = $GLOBALS['db']->fetchRow($res))
    {
        $ext_info = unserialize($group_buy['ext_info']);
        $group_buy = array_merge($group_buy, $ext_info);

        /* 格式化时间 */
        $group_buy['formated_start_date']   = local_date($GLOBALS['_CFG']['time_format'], $group_buy['start_date']);
        $group_buy['formated_end_date']     = local_date($GLOBALS['_CFG']['time_format'], $group_buy['end_date']);

        /* 格式化保证金 */
        $group_buy['formated_deposit'] = price_format($group_buy['deposit'], false);

        /* 处理价格阶梯 */
        $price_ladder = $group_buy['price_ladder'];
        if (!is_array($price_ladder) || empty($price_ladder))
        {
            $price_ladder = array(array('amount' => 0, 'price' => 0));
        }
        else
        {
            foreach ($price_ladder as $key => $amount_price)
            {
                $price_ladder[$key]['formated_price'] = price_format($amount_price['price']);
            }
        }
        $group_buy['price_ladder'] = $price_ladder;

        /* 处理图片 */
        if (empty($group_buy['goods_thumb']))
        {
            $group_buy['goods_thumb'] = get_image_path($group_buy['goods_id'], $group_buy['goods_thumb'], true);
        }
        /* 处理链接 */
        $group_buy['url'] = build_uri('group_buy', array('gbid'=>$group_buy['group_buy_id']));
		
		
		/* 统计信息 */
		$stat = group_buy_stat($group_buy['group_buy_id'], $group_buy['deposit']);
		$group_buy = array_merge($group_buy, $stat);
	
		/* 计算当前价 */
		$cur_price  = $price_ladder[0]['price']; // 初始化
		$cur_amount = $stat['valid_goods']; // 当前数量
		foreach ($price_ladder as $amount_price)
		{
			if ($cur_amount >= $amount_price['amount'])
			{
				$cur_price = $amount_price['price'];
			}
			else
			{
				break;
			}
		}
		$group_buy['cur_price'] = price_format($cur_price);
		$group_buy['cur_amount'] = $cur_amount+$group_buy['product_id'];
		
		
		$market_price = $group_buy['market_price'];
		
		$group_buy['saving']       = $market_price - $cur_price;
	    $group_buy['save_rate'] = $market_price ? round(($cur_price/ $market_price), 2)*10 : 0;
		
		$group_buy['market_price'] = price_format($group_buy['market_price']);
		
        /* 加入数组 */
        $gb_list[] = $group_buy;
    }

    return $gb_list;
}

function get_catid_byurl($url)
{
	$rs = strpos($url,"category");
	$cat_id = 0;
	if($rs!==false)
	{
		preg_match("/\d+/i",$url,$matches);
		$cat_id = $matches[0];
	}
	return $cat_id;
}




function insert_article_content($article_id)
{
    /* 获得文章的信息 */
    $sql = "SELECT a.*, IFNULL(AVG(r.comment_rank), 0) AS comment_rank ".
            "FROM " .$GLOBALS['ecs']->table('article'). " AS a ".
            "LEFT JOIN " .$GLOBALS['ecs']->table('comment'). " AS r ON r.id_value = a.article_id AND comment_type = 1 ".
            "WHERE a.is_open = 1 AND a.article_id = '$article_id' GROUP BY a.article_id";
    $row = $GLOBALS['db']->getRow($sql);

    return $row['content'];
}

function get_child_cat($tree_id = 0)
{
    $three_arr = array();
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$tree_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $tree_id == 0)
    {
        $child_sql = 'SELECT cat_id, cat_name, parent_id, is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$tree_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
        $res = $GLOBALS['db']->getAll($child_sql);
        foreach ($res AS $row)
        {
            if ($row['is_show'])
             {
               $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
               $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
			   $three_arr[$row['cat_id']]['name2'] = mb_substr($row['cat_name'], 0, 2, 'utf-8');
               $three_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);


            }
        }
    }
    return $three_arr;
}







?>