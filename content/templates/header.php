<?php
/*
Template Name:默认模板
Description:默认模板，简洁优雅 ……
Version:1.2  <div id="nav"><?php blog_navi();?></div>
Author:emlog<link rel="shortcut icon" href="/favicon.ico"/>
Author Url:http://www.emlog.net
Sidebar Amount:1
ForEmlog:5.1.2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<link rel="shortcut icon" href="/favicon.ico"/>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>main.css" rel="stylesheet" type="text/css" />

<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>

</head>
<body>
<div id="wrap">

  <div id="banner"><a href="<?php echo BLOG_URL; ?>"><img src="/content/uploadfile/header.jpg" height="383" width="960" /></a></div>
