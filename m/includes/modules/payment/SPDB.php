<?php

/**
 * ECSHOP 支付宝网银直连插件 之浦发银行
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: w45 $
 * $Id: SPDB.php 17217 2011-01-19 06:29:08Z w45 $
 */

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

$payment_lang = ROOT_PATH . 'languages/' .$GLOBALS['_CFG']['lang']. '/payment/SPDB.php';

if (file_exists($payment_lang))
{
    global $_LANG;

    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'SPDB_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 作者 */
    $modules[$i]['author']  = '网师傅';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.SPDB.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.5';

    /* 配置信息 */
    $modules[$i]['config']  = array(
        array('name' => 'SPDB_account',           'type' => 'text',   'value' => ''),
        array('name' => 'SPDB_key',               'type' => 'text',   'value' => ''),
        array('name' => 'SPDB_partner',           'type' => 'text',   'value' => ''),

        array('name' => 'SPDB_pay_method',        'type' => 'select', 'value' => '')
    );

    return;
}

/**
 * 类
 */
class SPDB
{

    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function SPDB()
    {
    }

    function __construct()
    {
        $this->SPDB();
    }

    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
        if (!defined('EC_CHARSET'))
        {
            $charset = 'utf-8';
        }
        else
        {
            $charset = EC_CHARSET;
        }


        $service = 'create_direct_pay_by_user';
		$anti_phishing_key  = '';
		$exter_invoke_ip = '';
		$show_url			= '';
		$extra_common_param = '';
		$royalty_type		= "";
		$royalty_parameters	= "";		

        //$extend_param = 'isv^sh22';

        $parameter = array(
            'service'           => "create_direct_pay_by_user",
			"payment_type"		=> "1",
            'partner'           => trim($payment['SPDB_partner']),
            '_input_charset'    => $charset,
			/* 买卖双方信息 */
            'seller_email'      => trim($payment['SPDB_account']),
            'notify_url'        => return_url(basename(__FILE__, '.php')),
            'return_url'        => return_url(basename(__FILE__, '.php')),
            /* 业务参数 */
            'subject'           => $order['order_sn'],
            'out_trade_no'      => $order['order_sn'] . $order['log_id'],
			'body'				=> '支付宝浦发银行支付',
            'total_fee'             => $order['order_amount'],

			"paymethod"			=> 'bankPay',
			"defaultbank"		=> 'SPDB'

        );

        ksort($parameter);
        reset($parameter);

        $param = '';
        $sign  = '';

        foreach ($parameter AS $key => $val)
        {
            $param .= "$key=" .urlencode($val). "&";
            $sign  .= "$key=$val&";
        }

        $param = substr($param, 0, -1);
        $sign  = substr($sign, 0, -1). $payment['SPDB_key'];


        $button = '<div style="text-align:center"><input type="button" onclick="window.open(\'https://mapi.alipay.com/gateway.do?'.$param. '&sign='.md5($sign).'&sign_type=MD5\')" value="' .$GLOBALS['_LANG']['pay_button']. '" /></div>';
        return $button;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        if (!empty($_POST))
        {
            foreach($_POST as $key => $data)
            {
                $_GET[$key] = $data;
            }
        }
        $payment  = get_payment($_GET['code']);
        $seller_email = rawurldecode($_GET['seller_email']);
        $order_sn = str_replace($_GET['subject'], '', $_GET['out_trade_no']);
        $order_sn = trim($order_sn);

        /* 检查支付的金额是否相符 */
        if (!check_money($order_sn, $_GET['total_fee']))
        {
            return false;
        }

        /* 检查数字签名是否正确 */
        ksort($_GET);
        reset($_GET);

        $sign = '';
        foreach ($_GET AS $key=>$val)
        {
            if ($key != 'sign' && $key != 'sign_type' && $key != 'code')
            {
                $sign .= "$key=$val&";
            }
        }

        $sign = substr($sign, 0, -1) . $payment['SPDB_key'];
        //$sign = substr($sign, 0, -1) . SPDB_AUTH;
        if (md5($sign) != $_GET['sign'])
        {
            return false;
        }

        if ($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS')
        {
            /* 改变订单状态 */
            order_paid($order_sn, 2);

            return true;
        }
        elseif ($_GET['trade_status'] == 'TRADE_FINISHED')
        {
            /* 改变订单状态 */
            order_paid($order_sn);

            return true;
        }
        elseif ($_GET['trade_status'] == 'TRADE_SUCCESS')
        {
            /* 改变订单状态 */
            order_paid($order_sn, 2);

            return true;
        }
        else
        {
            return false;
        }
    }
}

?>