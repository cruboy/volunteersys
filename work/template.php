<?php
/**
 * 模板管理
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

//自定义顶部图片页面custom-top
if ($action == '')
{
	$topimg = Option::get('topimg');

	$top_image_path = TPLS_PATH . 'images';
echo $top_image_path;
	$handle = @opendir($top_image_path) OR die('emlog default template path error!');
	$default_topimgs = array();
	while ($file = @readdir($handle)) 
	{
		if (getFileSuffix($file) == 'jpg' && !strstr($file, '_mini.jpg')) {
			$default_topimgs[] = array('path'=>'content/templates/images/'.$file);
		}
	}
	$custom_topimgs = Option::get('custom_topimgs');
	$topimgs = array_merge($default_topimgs, $custom_topimgs);
	closedir($handle);

	include View::getView('header');
	require_once View::getView('template_top');
	include View::getView('footer');
	View::output();
}

//使用顶部图片
if ($action == 'update_top')
{
	$top = isset($_GET['top']) ? addslashes($_GET['top']) : '';

	Option::updateOption('topimg', $top);
	$CACHE->updateCache('options');
	emDirect("./template.php?action=custom-top&activated=1");
}

//删除自定义顶部图片
if ($action == 'del_top')
{
	$top = isset($_GET['top']) ? addslashes($_GET['top']) : '';

	$custom_topimgs = Option::get('custom_topimgs');
	$key = array_search($top, $custom_topimgs);
	if (isset($custom_topimgs[$key])) {
		unset($custom_topimgs[$key]);
	}

	$top_mini = str_replace('.jpg', '_mini.jpg', $top);
	@unlink('../' . $top);
	@unlink('../' . $top_mini);

	Option::updateOption('custom_topimgs', serialize($custom_topimgs));

	$CACHE->updateCache('options');
	emDirect("./template.php?action=custom-top&active_del=1");
}

//上传顶部图片
if ($action == 'upload_top') {
	$photo_type = array('jpg', 'jpeg', 'png');
	$topimg = '';

	if ($_FILES['topimg']['error'] != 4) {
		$file_info = uploadFile($_FILES['topimg']['name'], $_FILES['topimg']['error'], $_FILES['topimg']['tmp_name'], $_FILES['topimg']['size'], $photo_type, false, false);
		if (!empty($file_info['file_path'])) {
			$topimg = $file_info['file_path'];
		}
	} else{
		emDirect("./template.php?action=custom-top");
	}

	include View::getView('header');
	require_once View::getView('template_crop');
	include View::getView('footer');
	View::output();
}

//裁剪图片
if ($action == 'crop') {
	$x1 = isset($_POST['x1']) ? intval($_POST['x1']) : 0;
	$y1 = isset($_POST['y1']) ? intval($_POST['y1']) : 140;
	$width = isset($_POST['width']) ? intval($_POST['width']) : 960;
	$height = isset($_POST['height']) ? intval($_POST['height']) : 134;
	$top_img = isset($_POST['img']) ? $_POST['img'] : '';

	$time = time();

	//create topimg
	$topimg_path = Option::UPLOADFILE_PATH . gmdate('Ym') . '/top-' . $time . '.jpg';
	$ret = imageCropAndResize($top_img, $topimg_path, 0, 0, $x1, $y1, $width, $height, $width, $height);
	if (false === $ret) {
		emDirect("./template.php?action=custom-top&error_a=1");
	}

	//create mini topimg
	$topimg_mini_path = Option::UPLOADFILE_PATH . gmdate('Ym') . '/top-' . $time . '_mini.jpg';
	$ret = imageCropAndResize($topimg_path, $topimg_mini_path, 0, 0, 0, 0, 230, 48, $width, $height);
	if (false === $ret) {
		emDirect("./template.php?action=custom-top&error_a=1");
	}

	@unlink($top_img);

	$custom_topimgs = Option::get('custom_topimgs');
	array_push($custom_topimgs, substr($topimg_path, 3));

	Option::updateOption('topimg', substr($topimg_path, 3));
	Option::updateOption('custom_topimgs', serialize($custom_topimgs));
	$CACHE->updateCache('options');
	emDirect("./template.php?action=custom-top&activated=1");
}


