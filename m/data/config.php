<?php

//ȫ�����ݿ�����
require(ROOT_PATH . '../data/config.php');
$db_config = explode(':', $db_host);
//ʱ������
$config['TIMEZONE'] = $timezone; //ʱ������
//��־�ʹ����������
$config['DEBUG'] = true; //�Ƿ�������ģʽ��true������false�ر�
$config['LOG_ON'] = false; //�Ƿ���������Ϣ���浽�ļ���true������false������
$config['LOG_PATH'] = './data/log/'; //������Ϣ��ŵ�Ŀ¼��������Ϣ����Ϊ��λ��ţ�һ�㲻��Ҫ�޸�
$config['ERROR_URL'] = ''; //������Ϣ�ض���ҳ�棬Ϊ�ղ���Ĭ�ϵĳ���ҳ�棬һ�㲻��Ҫ�޸�

//��ַ����
$config['URL_REWRITE_ON'] = false; //�Ƿ�����д��true������д,false�ر���д
$config['URL_MODULE_DEPR'] = '/'; //ģ��ָ�����һ�㲻��Ҫ�޸�
$config['URL_ACTION_DEPR'] = '/'; //�����ָ�����һ�㲻��Ҫ�޸�
$config['URL_PARAM_DEPR'] = '/'; //�����ָ�����һ�㲻��Ҫ�޸�
$config['URL_HTML_SUFFIX'] = '.html'; //α��̬��׺���ã������� .html ��һ�㲻��Ҫ�޸�
$config['URL_HTTP_HOST'] = ''; //������ַ����

//ģ������
$config['MODULE_PATH'] = './module/'; //ģ����Ŀ¼��һ�㲻��Ҫ�޸�
$config['MODULE_SUFFIX'] = 'Mod.class.php'; //ģ���׺��һ�㲻��Ҫ�޸�
$config['MODULE_INIT'] = 'init.php'; //��ʼ����һ�㲻��Ҫ�޸�
$config['MODULE_DEFAULT'] = 'index'; //Ĭ��ģ�飬һ�㲻��Ҫ�޸�
$config['MODULE_EMPTY'] = 'empty'; //��ģ�飬һ�㲻��Ҫ�޸�	

//��������
$config['ACTION_DEFAULT'] = 'index'; //Ĭ�ϲ�����һ�㲻��Ҫ�޸�
$config['ACTION_EMPTY'] = '_empty'; //�ղ�����һ�㲻��Ҫ�޸�

//ģ������
$config['MODEL_PATH'] = './model/'; //ģ�ʹ��Ŀ¼��һ�㲻��Ҫ�޸�
$config['MODEL_SUFFIX'] = 'Model.class.php'; //ģ�ͺ�׺��һ�㲻��Ҫ�޸�

//��̬ҳ�滺��
$config['HTML_CACHE_ON'] = false; //�Ƿ�����̬ҳ�滺�棬true����.false�ر�
$config['HTML_CACHE_PATH'] = './data/html_cache/'; //��̬ҳ�滺��Ŀ¼��һ�㲻��Ҫ�޸�
$config['HTML_CACHE_RULE']['index']['index'] = 3600; //����ʱ��,��λ����

//���ݿ�����
$config['DB_TYPE'] = 'mysql'; //���ݿ����ͣ�һ�㲻��Ҫ�޸�
$config['DB_HOST'] = $db_config[0];//���ݿ�������һ�㲻��Ҫ�޸�
@$config['DB_PORT'] = $db_config[1];//���ݿ�˿ڣ�mysqlĬ����3306��һ�㲻��Ҫ�޸�
$config['DB_USER'] = $db_user;//���ݿ��û���
$config['DB_PWD'] = $db_pass;//���ݿ�����
$config['DB_NAME'] = $db_name;//���ݿ���
$config['DB_CHARSET'] = 'utf8';//���ݿ���룬һ�㲻��Ҫ�޸�
$config['DB_PREFIX'] = $prefix;//���ݿ�ǰ׺
$config['DB_CACHE_ON'] = false; //�Ƿ������ݿ⻺�棬true������false������
$config['DB_CACHE_TYPE'] = 'Memcache'; //�������ͣ�FileCache��Memcache��SaeMemcache
$config['DB_CACHE_TIME'] = 600; //����ʱ��,0�����棬-1���û���,��λ����
$config['DB_RUN_QUERY'] = 0; //����sql���
$config['DB_BACKUP_PATH'] = './data/backups/'; //���ݿⱸ��Ŀ¼
$config['DB_PCONNECT'] = false; //true��ʾʹ���������ӣ�false��ʾ��ʹ���������ӣ�һ�㲻ʹ����������

//�ļ���������
$config['DB_CACHE_PATH'] = './data/db_cache/'; //���ݿ��ѯ���ݻ���Ŀ¼����ַ���������ļ���һ�㲻��Ҫ�޸�
$config['DB_CACHE_CHECK'] = false; //�Ƿ�Ի������У�飬һ�㲻��Ҫ�޸�
$config['DB_CACHE_FILE'] = 'cachedata'; //����������ļ���
$config['DB_CACHE_SIZE'] = '15M'; //Ԥ��Ļ����С����СΪ10M�����Ϊ1G
$config['DB_CACHE_FLOCK'] = true; //�Ƿ�����ļ���������Ϊfalse����ģ���ļ���,��һ�㲻��Ҫ�޸�

//memcache���ã������ö�̨memcache������
$config['MEM_SERVER'] = array(array('127.0.0.1', 11211), array('localhost', 11211));
$config['MEM_GROUP'] = 'db';

// ģ��Ŀ¼
$config['TPL_TEMPLATE_PATH'] = './template/'; //ģ��Ŀ¼����������Ŀ¼
$config['TPL_TEMPLATE_SUFFIX'] = '.html'; //ģ���׺��һ�㲻��Ҫ�޸�
$config['TPL_CACHE_ON'] = false; //�Ƿ���ģ�建�棬true����,false������
$config['TPL_CACHE_TYPE'] = ''; //���ݻ������ͣ�Ϊ�ջ�Memcache��SaeMemcache������Ϊ��Ϊ��ͨ�ļ�����

//��ͨ�ļ�����
$config['TPL_CACHE_PATH'] = './data/tpl_cache/'; //ģ�建��Ŀ¼��һ�㲻��Ҫ�޸�
$config['TPL_CACHE_SUFFIX'] = '.php'; //ģ�建���׺,һ�㲻��Ҫ�޸�

//memcache����
$config['MEM_SERVER'] = array(array('127.0.0.1', 11211), array('localhost', 11211));
$config['MEM_GROUP'] = 'tpl';

//�Զ�������չĿ¼
$config['AUTOLOAD_DIR'] = array(); //�Զ�������չĿ¼
$config['CLASS_REFRESH'] = true; //��̨���Զ�ˢ��ģʽ
$config['RUN_LOG_ON'] = false; //��̨������־

//�Ƿ񻺴�Ȩ����Ϣ
$config['AUTH_POWER_CACHE'] = false; //����false,ÿ�δ����ݿ��ȡ������ʱ��������Ϊfalse
?>