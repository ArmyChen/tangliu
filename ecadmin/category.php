<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
/***�����ӵĿ�ʼ***/
include_once(ROOT_PATH . 'includes/cls_image.php');
$image = new cls_image($_CFG['bgcolor']);
/***�����ӵĽ���***/

$exc = new exchange($ecs->table("category"), $db, 'cat_id', 'cat_name');


/* act�������ĳ�ʼ�� */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'list';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

/*------------------------------------------------------ */
//-- ��Ʒ�����б�
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{
    /* ��ȡ�����б� */
    $cat_list = cat_list(0, 0, false);

    /* ģ�帳ֵ */
    $smarty->assign('ur_here',      $_LANG['mgoodscat_list']);
    $smarty->assign('action_link',  array('href' => 'category.php?act=add', 'text' => $_LANG['mgoodscat_add']));
    $smarty->assign('full_page',    1);

    $smarty->assign('cat_info',     $cat_list);

    /* �б�ҳ�� */
    assign_query_info();
    $smarty->display('category_list.htm');
}

/*------------------------------------------------------ */
//-- ���򡢷�ҳ����ѯ
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $cat_list = cat_list(0, 0, false);
    $smarty->assign('cat_info',     $cat_list);

    make_json_result($smarty->fetch('category_list.htm'));
}
/*------------------------------------------------------ */
//-- ������Ʒ����
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add')
{
    /* Ȩ�޼��� */
    admin_priv('goods_cat_add');



    /* ģ�帳ֵ */
    $smarty->assign('ur_here',      $_LANG['mgoodscat_add']);
    $smarty->assign('action_link',  array('href' => 'category.php?act=list', 'text' => $_LANG['mgoodscat_list']));

    $smarty->assign('goods_type_list',  goods_type_list(0)); // ȡ����Ʒ����
    $smarty->assign('attr_list',        get_attr_list()); // ȡ����Ʒ����
    $smarty->assign('is_pc',            $_LANG['is_pc']);
    $smarty->assign('is_mobile',        $_LANG['is_mobile']);
		$smarty->assign('banben2',        $_LANG['banben2']);
    $smarty->assign('cat_select',   cat_list(0, 0, true));
    $smarty->assign('form_act',     'insert');
    $smarty->assign('cat_info',     array('is_show' => 1));



    /* ��ʾҳ�� */
    assign_query_info();
    $smarty->display('category_info.htm');
}

/*------------------------------------------------------ */
//-- ��Ʒ��������ʱ�Ĵ���
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert')
{
    /* Ȩ�޼��� */
    admin_priv('goods_cat_add');

    /* ��ʼ������ */
    $cat['cat_id']       = !empty($_POST['cat_id'])       ? intval($_POST['cat_id'])     : 0;
    $cat['parent_id']    = !empty($_POST['parent_id'])    ? intval($_POST['parent_id'])  : 0;
    $cat['sort_order']   = !empty($_POST['sort_order'])   ? intval($_POST['sort_order']) : 0;
    $cat['keywords']     = !empty($_POST['keywords'])     ? trim($_POST['keywords'])     : '';
    $cat['cat_image']     = !empty($_POST['cat_image'])     ? trim($_POST['cat_image'])     : '';
    $cat['cat_desc']     = !empty($_POST['cat_desc'])     ? $_POST['cat_desc']           : '';
    $cat['measure_unit'] = !empty($_POST['measure_unit']) ? trim($_POST['measure_unit']) : '';
	$cat['moban']     = !empty($_POST['moban'])     ? trim($_POST['moban'])     : '';
		$cat['smallmoban']     = !empty($_POST['smallmoban'])     ? trim($_POST['smallmoban'])     : '';
    $cat['cat_name']     = !empty($_POST['cat_name'])     ? trim($_POST['cat_name'])     : '';
    $cat['show_in_nav']  = !empty($_POST['show_in_nav'])  ? intval($_POST['show_in_nav']): 0;
    $cat['style']        = !empty($_POST['style'])        ? trim($_POST['style'])        : '';
    $cat['is_show']      = !empty($_POST['is_show'])      ? intval($_POST['is_show'])    : 0;
    $cat['grade']        = !empty($_POST['grade'])        ? intval($_POST['grade'])      : 0;
    $cat['filter_attr']  = !empty($_POST['filter_attr'])  ? implode(',', array_unique(array_diff($_POST['filter_attr'],array(0)))) : 0;

    $cat['cat_recommend']  = !empty($_POST['cat_recommend'])  ? $_POST['cat_recommend'] : array();

	/*  ����һ�д��� By www.ecshop120.com */
	$cat['title_define']  = !empty($_POST['title_define'])  ? $_POST['title_define'] : '';

	/* ���Ӵ���_start  By  www.ecshop120.com */
	$cat['define_url']  = !empty($_POST['define_url'])  ? $_POST['define_url'] : '';
	$exist_define_url=$db->getOne("select count(*) from ". $ecs->table('category') ." where define_url='$cat[define_url]' ");
    if ($exist_define_url)
    {
           $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
           sys_msg('�Ѿ�������ͬ���Զ���URL', 0, $link);
     }
	 /* ���Ӵ���_end  By  www.ecshop120.com */

    if (cat_exists($cat['cat_name'], $cat['parent_id']))
    {
        /* ͬ�����²������ظ��ķ������� */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG['catname_exist'], 0, $link);
    }

    if($cat['grade'] > 10 || $cat['grade'] < 0)
    {
        /* �۸�������������Χ */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG['grade_error'], 0, $link);
    }







/*����ͼƬ*/
$img_name = basename($image->upload_image($_FILES['thumb'],'catthumb'));
if($img_name) $cat['thumb'] = $img_name;


    /* �����Ĳ��� */
    if ($db->autoExecute($ecs->table('category'), $cat) !== false)
    {
        $cat_id = $db->insert_id();
        if($cat['show_in_nav'] == 1)
        {
            $vieworder = $db->getOne("SELECT max(vieworder) FROM ". $ecs->table('nav') . " WHERE type = 'middle'");
            $vieworder += 2;
            //��ʾ���Զ��嵼������
            $sql = "INSERT INTO " . $ecs->table('nav') .
                " (name,ctype,cid,ifshow,vieworder,opennew,url,type)".
                " VALUES('" . $cat['cat_name'] . "', 'c', '".$db->insert_id()."','1','$vieworder','0', '" . build_uri('category', array('cid'=> $cat_id), $cat['cat_name']) . "','middle')";
            $db->query($sql);
        }
        insert_cat_recommend($cat['cat_recommend'], $cat_id);

        admin_log($_POST['cat_name'], 'add', 'category');   // ��¼����Ա����
        clear_cache_files();    // ��������

        /*��������*/
        $link[0]['text'] = $_LANG['continue_add'];
        $link[0]['href'] = 'category.php?act=add';

        $link[1]['text'] = $_LANG['back_list'];
        $link[1]['href'] = 'category.php?act=list';

        sys_msg($_LANG['catadd_succed'], 0, $link);
    }
 }

/*------------------------------------------------------ */
//-- �༭��Ʒ������Ϣ
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit')
{
    admin_priv('goods_cat_add');   // Ȩ�޼���
    $cat_id = intval($_REQUEST['cat_id']);
    $cat_info = get_cat_info($cat_id);  // ��ѯ������Ϣ����
    $attr_list = get_attr_list();
    $filter_attr_list = array();

    if ($cat_info['filter_attr'])
    {
        $filter_attr = explode(",", $cat_info['filter_attr']);  //�Ѷ���ɸѡ���Էŵ�������

        foreach ($filter_attr AS $k => $v)
        {
            $attr_cat_id = $db->getOne("SELECT cat_id FROM " . $ecs->table('attribute') . " WHERE attr_id = '" . intval($v) . "'");
            $filter_attr_list[$k]['goods_type_list'] = goods_type_list($attr_cat_id);  //ȡ��ÿ�����Ե���Ʒ����
            $filter_attr_list[$k]['filter_attr'] = $v;
            $attr_option = array();

            foreach ($attr_list[$attr_cat_id] as $val)
            {
                $attr_option[key($val)] = current ($val);
            }

            $filter_attr_list[$k]['option'] = $attr_option;
        }

        $smarty->assign('filter_attr_list', $filter_attr_list);
    }
    else
    {
        $attr_cat_id = 0;
    }

    /* ģ�帳ֵ */
    $smarty->assign('attr_list',        $attr_list); // ȡ����Ʒ����
    $smarty->assign('attr_cat_id',      $attr_cat_id);
    $smarty->assign('ur_here',     $_LANG['category_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['mgoodscat_list'], 'href' => 'category.php?act=list'));

    //�����Ƿ�������ҳ�Ƽ�
    $res = $db->getAll("SELECT recommend_type FROM " . $ecs->table("cat_recommend") . " WHERE cat_id=" . $cat_id);
    if (!empty($res))
    {
        $cat_recommend = array();
        foreach($res as $data)
        {
            $cat_recommend[$data['recommend_type']] = 1;
        }
        $smarty->assign('cat_recommend', $cat_recommend);
    }

    $smarty->assign('cat_info',    $cat_info);
    $smarty->assign('form_act',    'update');
	$smarty->assign('is_pc',            $_LANG['is_pc']);
    $smarty->assign('is_mobile',        $_LANG['is_mobile']);
	$smarty->assign('banben2',        $_LANG['banben2']);
    $smarty->assign('cat_select',  cat_list(0, $cat_info['parent_id'], true));
    $smarty->assign('goods_type_list',  goods_type_list(0)); // ȡ����Ʒ����

    /* ��ʾҳ�� */
    assign_query_info();
    $smarty->display('category_info.htm');
}

elseif($_REQUEST['act'] == 'add_category')
{
    $parent_id = empty($_REQUEST['parent_id']) ? 0 : intval($_REQUEST['parent_id']);
    $category = empty($_REQUEST['cat']) ? '' : json_str_iconv(trim($_REQUEST['cat']));

    if(cat_exists($category, $parent_id))
    {
        make_json_error($_LANG['catname_exist']);
    }
    else
    {
        $sql = "INSERT INTO " . $ecs->table('category') . "(cat_name, parent_id, is_show)" .
               "VALUES ( '$category', '$parent_id', 1)";

        $db->query($sql);
        $category_id = $db->insert_id();

        $arr = array("parent_id"=>$parent_id, "id"=>$category_id, "cat"=>$category);

        clear_cache_files();    // ��������

        make_json_result($arr);
    }
}

/*------------------------------------------------------ */
//-- �༭��Ʒ������Ϣ
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'update')
{
    /* Ȩ�޼��� */
    admin_priv('goods_cat_add');

    /* ��ʼ������ */
    $cat_id              = !empty($_POST['cat_id'])       ? intval($_POST['cat_id'])     : 0;
    $old_cat_name        = $_POST['old_cat_name'];
    $cat['parent_id']    = !empty($_POST['parent_id'])    ? intval($_POST['parent_id'])  : 0;
    $cat['sort_order']   = !empty($_POST['sort_order'])   ? intval($_POST['sort_order']) : 0;
    $cat['keywords']     = !empty($_POST['keywords'])     ? trim($_POST['keywords'])     : '';
    $cat['cat_image']     = !empty($_POST['cat_image'])     ? trim($_POST['cat_image'])     : '';
    $cat['cat_desc']     = !empty($_POST['cat_desc'])     ? $_POST['cat_desc']           : '';
    $cat['measure_unit'] = !empty($_POST['measure_unit']) ? trim($_POST['measure_unit']) : '';
    $cat['cat_name']     = !empty($_POST['cat_name'])     ? trim($_POST['cat_name'])     : '';
	$cat['moban']     = !empty($_POST['moban'])     ? trim($_POST['moban'])     : '';
		$cat['smallmoban']     = !empty($_POST['smallmoban'])     ? trim($_POST['smallmoban'])     : '';
    $cat['is_show']      = !empty($_POST['is_show'])      ? intval($_POST['is_show'])    : 0;
    $cat['show_in_nav']  = !empty($_POST['show_in_nav'])  ? intval($_POST['show_in_nav']): 0;
    $cat['style']        = !empty($_POST['style'])        ? trim($_POST['style'])        : '';
    $cat['grade']        = !empty($_POST['grade'])        ? intval($_POST['grade'])      : 0;
    $cat['filter_attr']  = !empty($_POST['filter_attr'])  ? implode(',', array_unique(array_diff($_POST['filter_attr'],array(0)))) : 0;
    $cat['cat_recommend']  = !empty($_POST['cat_recommend'])  ? $_POST['cat_recommend'] : array();


	/* ����һ�д��� By www.ecshop120.com */
	$cat['title_define']  = !empty($_POST['title_define'])  ? $_POST['title_define'] : '';

	/* ���Ӵ���_start By  www.ecshop120.com */
	$old_define_url        = $_POST['old_define_url'];
	$cat['define_url']  = !empty($_POST['define_url'])  ? $_POST['define_url']: '';
	if ($cat['define_url'] != $old_define_url)
    {
		$exist_define_url=$db->getOne("select count(*) from ". $ecs->table('category') ." where define_url='$cat[define_url]' ");
        if ($exist_define_url)
        {
           $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
           sys_msg('�Ѿ�������ͬ���Զ���URL', 0, $link);
        }
    }
	/* ���Ӵ���_end By  www.ecshop120.com */

    /* �жϷ������Ƿ��ظ� */

    if ($cat['cat_name'] != $old_cat_name)
    {
        if (cat_exists($cat['cat_name'],$cat['parent_id'], $cat_id))
        {
           $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
           sys_msg($_LANG['catname_exist'], 0, $link);
        }
    }

    /* �ж��ϼ�Ŀ¼�Ƿ��Ϸ� */
    $children = array_keys(cat_list($cat_id, 0, false));     // ���õ�ǰ�����������¼�����
    if (in_array($cat['parent_id'], $children))
    {
        /* ѡ���ĸ����ǵ�ǰ��������ǰ�������¼����� */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG["is_leaf_error"], 0, $link);
    }

    if($cat['grade'] > 10 || $cat['grade'] < 0)
    {
        /* �۸�������������Χ */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG['grade_error'], 0, $link);
    }

    $dat = $db->getRow("SELECT cat_name, show_in_nav FROM ". $ecs->table('category') . " WHERE cat_id = '$cat_id'");
/* ����ͼƬ */
$img_name = basename($image->upload_image($_FILES['thumb'],'catthumb'));
if($img_name) $cat['thumb'] = $img_name;

    if ($db->autoExecute($ecs->table('category'), $cat, 'UPDATE', "cat_id='$cat_id'"))
    {
        if($cat['cat_name'] != $dat['cat_name'])
        {
            //�����������Ʒ����˸ı�
            $sql = "UPDATE " . $ecs->table('nav') . " SET name = '" . $cat['cat_name'] . "' WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'";
            $db->query($sql);
        }
        if($cat['show_in_nav'] != $dat['show_in_nav'])
        {
            //�Ƿ���ʾ�ڵ����������˱仯
            if($cat['show_in_nav'] == 1)
            {
                //��ʾ
                $nid = $db->getOne("SELECT id FROM ". $ecs->table('nav') . " WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'");
                if(empty($nid))
                {
                    //������
                    $vieworder = $db->getOne("SELECT max(vieworder) FROM ". $ecs->table('nav') . " WHERE type = 'middle'");
                    $vieworder += 2;
                    $uri = build_uri('category', array('cid'=> $cat_id), $cat['cat_name']);

                    $sql = "INSERT INTO " . $ecs->table('nav') . " (name,ctype,cid,ifshow,vieworder,opennew,url,type) VALUES('" . $cat['cat_name'] . "', 'c', '$cat_id','1','$vieworder','0', '" . $uri . "','middle')";
                }
                else
                {
                    $sql = "UPDATE " . $ecs->table('nav') . " SET ifshow = 1 WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'";
                }
                $db->query($sql);
            }
            else
            {
                //ȥ��
                $db->query("UPDATE " . $ecs->table('nav') . " SET ifshow = 0 WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'");
            }
        }

        //������ҳ�Ƽ�
        insert_cat_recommend($cat['cat_recommend'], $cat_id);
        /* ���·�����Ϣ�ɹ� */
        clear_cache_files(); // ��������
        admin_log($_POST['cat_name'], 'edit', 'category'); // ��¼����Ա����

        /* ��ʾ��Ϣ */
        $link[] = array('text' => $_LANG['back_list'], 'href' => 'category.php?act=list');
        sys_msg($_LANG['catedit_succed'], 0, $link);
    }
}



/*------------------------------------------------------ */
//-- ɾ��Ʒ��ͼƬ
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'drop_thumb')
{
/* Ȩ���ж� */
admin_priv('goods_cat_add');
$cat_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
/* ȡ��logo���� */
$sql = "SELECT thumb FROM " .$ecs->table('category'). " WHERE cat_id = '$cat_id'";
$thumb_name = $db->getOne($sql);
if (!empty($thumb_name))
{
@unlink(ROOT_PATH . DATA_DIR . '/catthumb/' .$thumb_name);
$sql = "UPDATE " .$ecs->table('category'). " SET thumb = '' WHERE cat_id = '$cat_id'";
$db->query($sql);
}
$link= array(array('text' => '�༭��Ʒ����', 'href' => 'category.php?act=edit&cat_id=' . $cat_id), array('text' =>'��Ʒ�����б�', 'href' => 'category.php?act=list'));
sys_msg('ɾ����Ʒ����Сͼ�ɹ�', 0, $link);
}








/*------------------------------------------------------ */
//-- ����ת����Ʒ����ҳ��
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'move')
{
    /* Ȩ�޼��� */
    admin_priv('goods_cat_add');

    $cat_id = !empty($_REQUEST['cat_id']) ? intval($_REQUEST['cat_id']) : 0;

    /* ģ�帳ֵ */
    $smarty->assign('ur_here',     $_LANG['move_goods']);
    $smarty->assign('action_link', array('href' => 'category.php?act=list', 'text' => $_LANG['mgoodscat_list']));

    $smarty->assign('cat_select', cat_list(0, $cat_id, true));
    $smarty->assign('form_act',   'move_cat');

    /* ��ʾҳ�� */
    assign_query_info();
    $smarty->display('category_move.htm');
}

/*------------------------------------------------------ */
//-- ��������ת����Ʒ�����Ĵ�������
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'move_cat')
{
    /* Ȩ�޼��� */
    admin_priv('goods_cat_add');

    $cat_id        = !empty($_POST['cat_id'])        ? intval($_POST['cat_id'])        : 0;
    $target_cat_id = !empty($_POST['target_cat_id']) ? intval($_POST['target_cat_id']) : 0;

    /* ��Ʒ���಻����Ϊ�� */
    if ($cat_id == 0 || $target_cat_id == 0)
    {
        $link[] = array('text' => $_LANG['go_back'], 'href' => 'category.php?act=move');
        sys_msg($_LANG['cat_move_empty'], 0, $link);
    }

    /* ������Ʒ���� */
    $sql = "UPDATE " .$ecs->table('goods'). " SET cat_id = '$target_cat_id' ".
           "WHERE cat_id = '$cat_id'";
    if ($db->query($sql))
    {
        /* �������� */
        clear_cache_files();

        /* ��ʾ��Ϣ */
        $link[] = array('text' => $_LANG['go_back'], 'href' => 'category.php?act=list');
        sys_msg($_LANG['move_cat_success'], 0, $link);
    }
}

/*------------------------------------------------------ */
//-- �༭��������
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'edit_sort_order')
{
    check_authz_json('goods_cat_add');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if (cat_update($id, array('sort_order' => $val)))
    {
        clear_cache_files(); // ��������
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- �༭������λ
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'edit_measure_unit')
{
    check_authz_json('goods_cat_add');

    $id = intval($_POST['id']);
    $val = json_str_iconv($_POST['val']);

    if (cat_update($id, array('measure_unit' => $val)))
    {
        clear_cache_files(); // ��������
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- �༭��������
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'edit_grade')
{
    check_authz_json('goods_cat_add');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if($val > 10 || $val < 0)
    {
        /* �۸�������������Χ */
        make_json_error($_LANG['grade_error']);
    }

    if (cat_update($id, array('grade' => $val)))
    {
        clear_cache_files(); // ��������
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- �л��Ƿ���ʾ�ڵ�����
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'toggle_show_in_nav')
{
    check_authz_json('goods_cat_add');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if (cat_update($id, array('show_in_nav' => $val)) != false)
    {
        if($val == 1)
        {
            //��ʾ
            $vieworder = $db->getOne("SELECT max(vieworder) FROM ". $ecs->table('nav') . " WHERE type = 'middle'");
            $vieworder += 2;
            $catname = $db->getOne("SELECT cat_name FROM ". $ecs->table('category') . " WHERE cat_id = '$id'");
            //��ʾ���Զ��嵼������
            $_CFG['rewrite'] = 0;
            $uri = build_uri('category', array('cid'=> $id), $catname);

            $nid = $db->getOne("SELECT id FROM ". $ecs->table('nav') . " WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle'");
            if(empty($nid))
            {
                //������
                $sql = "INSERT INTO " . $ecs->table('nav') . " (name,ctype,cid,ifshow,vieworder,opennew,url,type) VALUES('" . $catname . "', 'c', '$id','1','$vieworder','0', '" . $uri . "','middle')";
            }
            else
            {
                $sql = "UPDATE " . $ecs->table('nav') . " SET ifshow = 1 WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle'";
            }
            $db->query($sql);
        }
        else
        {
            //ȥ��
            $db->query("UPDATE " . $ecs->table('nav') . "SET ifshow = 0 WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle'");
        }
        clear_cache_files();
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- �л��Ƿ���ʾ
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'toggle_is_show')
{
    check_authz_json('goods_cat_add');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if (cat_update($id, array('is_show' => $val)) != false)
    {
        clear_cache_files();
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- ɾ����Ʒ����
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'remove')
{
    check_authz_json('goods_cat_drop');

    /* ��ʼ������ID��ȡ�÷������� */
    $cat_id   = intval($_GET['id']);
    $cat_name = $db->getOne('SELECT cat_name FROM ' .$ecs->table('category'). " WHERE cat_id='$cat_id'");

    /* ��ǰ�������Ƿ����ӷ��� */
    $cat_count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('category'). " WHERE parent_id='$cat_id'");

    /* ��ǰ�������Ƿ�������Ʒ */
    $goods_count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('goods'). " WHERE cat_id='$cat_id'");

    /* �����������¼��ӷ�������Ʒ����ɾ��֮ */
    if ($cat_count == 0 && $goods_count == 0)
    {
        /* ɾ������ */
        $sql = 'DELETE FROM ' .$ecs->table('category'). " WHERE cat_id = '$cat_id'";
        if ($db->query($sql))
        {
            $db->query("DELETE FROM " . $ecs->table('nav') . "WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'");
            clear_cache_files();
            admin_log($cat_name, 'remove', 'category');
        }
    }
    else
    {
        make_json_error($cat_name .' '. $_LANG['cat_isleaf']);
    }

    $url = 'category.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
    exit;
}

/*------------------------------------------------------ */
//-- PRIVATE FUNCTIONS
/*------------------------------------------------------ */
//
///**
// * ���������Ƿ��Ѿ�����
// *
// * @param   string      $cat_name       ��������
// * @param   integer     $parent_cat     �ϼ�����
// * @param   integer     $exclude        �ų��ķ���ID
// *
// * @return  boolean
// */
//function cat_exists($cat_name, $parent_cat, $exclude = 0)
//{
//    $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('category').
//           " WHERE parent_id = '$parent_cat' AND cat_name = '$cat_name' AND cat_id<>'$exclude'";
//    return ($GLOBALS['db']->getOne($sql) > 0) ? true : false;
//}

/**
 * ������Ʒ������������Ϣ
 *
 * @param   integer     $cat_id     ָ���ķ���ID
 *
 * @return  mix
 */
function get_cat_info($cat_id)
{
    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('category'). " WHERE cat_id='$cat_id' LIMIT 1";
    return $GLOBALS['db']->getRow($sql);
}

/**
 * ������Ʒ����
 *
 * @param   integer $cat_id
 * @param   array   $args
 *
 * @return  mix
 */
function cat_update($cat_id, $args)
{
    if (empty($args) || empty($cat_id))
    {
        return false;
    }

    return $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('category'), $args, 'update', "cat_id='$cat_id'");
}


/**
 * ��ȡ�����б�
 *
 * @access  public
 * @param
 *
 * @return void
 */
function get_attr_list()
{
    $sql = "SELECT a.attr_id, a.cat_id, a.attr_name ".
           " FROM " . $GLOBALS['ecs']->table('attribute'). " AS a,  ".
           $GLOBALS['ecs']->table('goods_type') . " AS c ".
           " WHERE  a.cat_id = c.cat_id AND c.enabled = 1 ".
           " ORDER BY a.cat_id , a.sort_order";

    $arr = $GLOBALS['db']->getAll($sql);

    $list = array();

    foreach ($arr as $val)
    {
        $list[$val['cat_id']][] = array($val['attr_id']=>$val['attr_name']);
    }

    return $list;
}

/**
 * ������ҳ�Ƽ���չ����
 *
 * @access  public
 * @param   array   $recommend_type �Ƽ�����
 * @param   integer $cat_id     ����ID
 *
 * @return void
 */
function insert_cat_recommend($recommend_type, $cat_id)
{
    //���������Ƿ�Ϊ��ҳ�Ƽ�
    if (!empty($recommend_type))
    {
        //ȡ��֮ǰ�ķ���
        $recommend_res = $GLOBALS['db']->getAll("SELECT recommend_type FROM " . $GLOBALS['ecs']->table("cat_recommend") . " WHERE cat_id=" . $cat_id);
        if (empty($recommend_res))
        {
            foreach($recommend_type as $data)
            {
                $data = intval($data);
                $GLOBALS['db']->query("INSERT INTO " . $GLOBALS['ecs']->table("cat_recommend") . "(cat_id, recommend_type) VALUES ('$cat_id', '$data')");
            }
        }
        else
        {
            $old_data = array();
            foreach($recommend_res as $data)
            {
                $old_data[] = $data['recommend_type'];
            }
            $delete_array = array_diff($old_data, $recommend_type);
            if (!empty($delete_array))
            {
                $GLOBALS['db']->query("DELETE FROM " . $GLOBALS['ecs']->table("cat_recommend") . " WHERE cat_id=$cat_id AND recommend_type " . db_create_in($delete_array));
            }
            $insert_array = array_diff($recommend_type, $old_data);
            if (!empty($insert_array))
            {
                foreach($insert_array as $data)
                {
                    $data = intval($data);
                    $GLOBALS['db']->query("INSERT INTO " . $GLOBALS['ecs']->table("cat_recommend") . "(cat_id, recommend_type) VALUES ('$cat_id', '$data')");
                }
            }
        }
    }
    else
    {
        $GLOBALS['db']->query("DELETE FROM ". $GLOBALS['ecs']->table("cat_recommend") . " WHERE cat_id=" . $cat_id);
    }
}

?>