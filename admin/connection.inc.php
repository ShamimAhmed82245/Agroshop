<?php
session_start();
$db=mysqli_connect('localhost','root','','agroshop');
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/AgroShop/img/');
define('SITE_PATH','http://127.0.0.1/AgroShop/img/');

define('SEED_IMAGE_SERVER_PATH',SERVER_PATH.'seed/');
define('SEED_IMAGE_SITE_PATH',SITE_PATH.'seed/');
define('FERTILIZER_IMAGE_SERVER_PATH',SERVER_PATH.'fertilizer/');
define('FERTILIZER_IMAGE_SITE_PATH',SITE_PATH.'fertilizer/');
define('EQUIPMENT_IMAGE_SERVER_PATH',SERVER_PATH.'equipment/');
define('EQUIPMENT_IMAGE_SITE_PATH',SITE_PATH.'equipment/');
define('DISEASE_IMAGE_SERVER_PATH',SERVER_PATH.'disease/');
define('DISEASE_IMAGE_SITE_PATH',SITE_PATH.'disease/');
?>