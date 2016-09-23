<?php


define('IN_ECS', true);



require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . '/common.php');
$_REQUEST['act'] = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : '';


/*------------------------------------------------------ */
//-- �������
/*------------------------------------------------------ */

$_REQUEST['article_keywords']   = !empty($_REQUEST['article_keywords'])   ? trim($_REQUEST['article_keywords'])     : '';
$_REQUEST['category']   = !empty($_REQUEST['article_category'])   ? intval($_REQUEST['article_category'])   : 0;

$action = '';
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'form')
{
	/* Ҫ��ʾ�߼������� */
	$adv_value['art_key']  = htmlspecialchars(stripcslashes($_REQUEST['article_keywords']));
	$adv_value['art_cat']  = $_REQUEST['article_category'];

	/* ���ύ�������¸�ֵ */
	/*������������*/
	
	$smarty->assign('adv_val',             $adv_value);
	$smarty->assign('action',              'form');
	
	$action = 'form';
}
	
/* ��ʼ���������� */
    $keywords  = '';
    $tag_where = '';
    if (!empty($_REQUEST['article_keywords']))
    {
        $arr = array();
        if (stristr($_REQUEST['article_keywords'], ' AND ') !== false)
        {
            /* ���ؼ������Ƿ���AND��������ھ��ǲ� */
            $arr        = explode('AND', $_REQUEST['article_keywords']);
            $operator   = " AND ";
        }
        elseif (stristr($_REQUEST['article_keywords'], ' OR ') !== false)
        {
            /* ���ؼ������Ƿ���OR��������ھ��ǻ� */
            $arr        = explode('OR', $_REQUEST['article_keywords']);
            $operator   = " OR ";
        }
        elseif (stristr($_REQUEST['article_keywords'], ' + ') !== false)
        {
            /* ���ؼ������Ƿ��мӺţ�������ھ��ǲ� */
            $arr        = explode('+', $_REQUEST['article_keywords']);
            $operator   = " AND ";
        }
        else
        {
            /* ���ؼ������Ƿ��пո�������ھ��ǻ� */
            $arr        = explode(' ', $_REQUEST['article_keywords']);
            $operator   = " OR ";
        }

        $keywords = 'AND (';
        $article_ids = array();
        foreach ($arr AS $key => $val)
        {
            if ($key > 0 && $key < count($arr) && count($arr) > 1)
            {
                $keywords .= $operator;
            }

            $val        = mysql_like_quote(trim($val));
            $keywords  .= "(title LIKE '%$val%' OR content LIKE '%$val%')";

            $sql = 'SELECT DISTINCT article_id FROM ' . $ecs->table('article') . " WHERE title LIKE '%$val%' OR content LIKE '%$val%'";
            $res = $db->query($sql);
            while ($row = $db->FetchRow($res))
            {
                $article_ids[] = $row['article_id'];
            }

            $db->autoReplace($ecs->table('keywords'), array('date' => local_date('Y-m-d'),
                'searchengine' => 'ecshop', 'keyword' => $val, 'count' => 1), array('count' => 1));
        }
        $keywords .= ')';

        $article_ids = array_unique($article_ids);
        $tag_where = implode(',', $article_ids);
        if (!empty($tag_where))
        {
            $tag_where = 'OR article_id ' . db_create_in($tag_where);
        }
    }
	
	$category   = !empty($_REQUEST['category']) ? intval($_REQUEST['category'])        : 0;
    $categories = ($category > 0)               ? ' AND ' . get_article_children($category)    : '';

	$page       = !empty($_REQUEST['page'])  && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
    $size       = !empty($_CFG['page_size']) && intval($_CFG['page_size']) > 0 ? intval($_CFG['page_size']) : 20;

	//ͳ����������
    $sql   = "SELECT COUNT(*) FROM " .$ecs->table('article').
        "WHERE is_open = 1 AND article_type = 0 ".
        "AND ( 1 " . $categories . $keywords ." ) ";
    $count = $db->getOne($sql);
	
    $max_page = ($count> 0) ? ceil($count / $size) : 1;
    if ($page > $max_page)
    {
        $page = $max_page;
    }
	
    /* ��ѯ���� */
    $sql = "SELECT * FROM " .$ecs->table('article').
		"WHERE is_open = 1 ".
        "AND ( 1 " . $categories . $keywords ." ) ".
		"ORDER BY article_id";;
    $res = $db->SelectLimit($sql, $size, ($page - 1) * $size);
	
	//�����µ�һЩ���Ը�ֵ
	$arr = array();
    while ($row = $db->FetchRow($res))
    {
        $arr[$row['article_id']]['article_id']    = $row['article_id'];
        $arr[$row['article_id']]['title']         = $row['title'];
		  $arr[$row['article_id']]['add_time']         = local_date($GLOBALS['_CFG']['time_format'], $row['add_time']);
		   $arr[$row['article_id']]['file_url']         = $row['file_url'];
        $arr[$row['article_id']]['cat_id']        = $row['cat_id'];
		       $arr[$row['article_id']]['click_count']        = $row['click_count'];
		 $arr[$row['article_id']]['spcdesc']         = $row['spcdesc'];
        $arr[$row['article_id']]['url']           = build_uri('article', array('aid' => $row['article_id']), $row['title']);
    }

   if(count($arr) % 2 != 0)
	{
		$arr[] = array();
	}
	





/* ��ҳ */
    $url_format = "article_search.php?category=$category&amp;article_keywords=" . urlencode(stripslashes($_REQUEST['article_keywords'])) . "&amp;brand=" . $_REQUEST['brand']."&amp;action=".$action."&amp;goods_type=" . $_REQUEST['goods_type'] . "&amp;sc_ds=" . $_REQUEST['sc_ds'];
    if (!empty($intromode))
    {
        $url_format .= "&amp;intro=" . $intromode;
    }
    if (isset($_REQUEST['pickout']))
    {
        $url_format .= '&amp;pickout=1';
    }
    $url_format .= "&amp;min_price=" . $_REQUEST['min_price'] ."&amp;max_price=" . $_REQUEST['max_price'] . "&amp;sort=$sort";

    $url_format .= "$attr_url&amp;order=$order&amp;page=";

    $pager['search'] = array(
        'article_keywords'   => stripslashes(urlencode($_REQUEST['article_keywords'])),
        'category'   => $category,
        'brand'      => $_REQUEST['brand'],
        'sort'       => $sort,
        'order'      => $order,
        'min_price'  => $_REQUEST['min_price'],
        'max_price'  => $_REQUEST['max_price'],
        'action'     => $action,
        'intro'      => empty($intromode) ? '' : trim($intromode),
        'goods_type' => $_REQUEST['goods_type'],
        'sc_ds'      => $_REQUEST['sc_ds'],
        'outstock'   => $_REQUEST['outstock']
    );
    $pager['search'] = array_merge($pager['search'], $attr_arg);

    $pager = get_pager('article_search.php', $pager['search'], $count, $page, $size);
    $pager['display'] = $display;

    $smarty->assign('url_format', $url_format);
    $smarty->assign('pager', $pager);

	assign_template();
	   assign_dynamic('article_keywords');
    $smarty->assign('search_article_list', $arr);                  //�����������б�
    $smarty->assign('category',     $category);
    $smarty->assign('keywords',   htmlspecialchars(stripslashes($_REQUEST['article_keywords'])));
    $smarty->assign('search_keywords',   stripslashes($_REQUEST['article_keywords']));

	
		
	assign_dynamic('article_search');
	$position = assign_ur_here(0, trim($_REQUEST['article_keywords']));
	
	$smarty->assign('page_title',            $position['title']);    // ҳ�����
	$smarty->assign('ur_here',               $position['ur_here']);  // ��ǰλ��
	$smarty->assign('intromode',             $intromode);
	
	$smarty->assign('top_goods',             get_top10());           // ��������
	$smarty->assign('navigator_list',        get_navigator($ctype, $catlist));  //�Զ��嵼����
	
	$smarty->display('article_search.dwt');

/*------------------------------------------------------ */
//-- PRIVATE FUNCTION
/*------------------------------------------------------ */
/**
 *�������ַ��Ƿ�Ϊ��
 *
 * @access public
 * @param
 *
 * @return void
 */
function is_not_null($value)
{
    if (is_array($value))
    {
        return (!empty($value['from'])) || (!empty($value['to']));
    }
    else
    {
        return !empty($value);
    }
}
?>